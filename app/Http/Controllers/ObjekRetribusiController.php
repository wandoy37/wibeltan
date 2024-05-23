<?php

namespace App\Http\Controllers;

use App\Models\ObjekRetribusi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ObjekRetribusiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $objek_retribusis = ObjekRetribusi::orderBy('id', 'DESC')->get();
        return view('dashboard.objek_retribusi.index', compact('objek_retribusis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.objek_retribusi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'volume' => 'required',
            'satuan' => 'required',
            'harga' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('objek-retribusi.create')
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();
        try {
            ObjekRetribusi::create([
                'nama' => $request->nama,
                'volume' => $request->volume,
                'satuan' => $request->satuan,
                'harga' => $request->harga,
            ]);

            return redirect()->route('objek-retribusi.index')->with('success', 'Objek Retribusi Berhasil Di Buat');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('objek-retribusi.create')->with('error', 'Objek Retribusi Gagal Di Buat');
        } finally {
            DB::commit();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $objek_retribusi = ObjekRetribusi::find($id);
        return view('dashboard.objek_retribusi.edit', compact('objek_retribusi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $objek_retribusi = ObjekRetribusi::find($id);

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'volume' => 'required',
            'satuan' => 'required',
            'harga' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('objek-retribusi.edit', $objek_retribusi->id)
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();
        try {
            $objek_retribusi->update([
                'nama' => $request->nama,
                'volume' => $request->volume,
                'satuan' => $request->satuan,
                'harga' => $request->harga,
            ]);
            return redirect()->route('objek-retribusi.index')->with('success', 'Objek Retribusi Berhasil Di Update');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('objek-retribusi.edit', $objek_retribusi->id)->with('error', 'Objek Retribusi Gagal Di Update');
        } finally {
            DB::commit();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $objek_retribusi = ObjekRetribusi::find($id);

        DB::beginTransaction();
        try {
            $objek_retribusi->delete();
            return redirect()->route('objek-retribusi.index')->with('success', 'Objek Retribusi Berhasil Di Hapus');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('objek-retribusi.index')->with('error', 'Objek Retribusi Gagal Di Update');
        } finally {
            DB::commit();
            return redirect()->back();
        }
    }
}
