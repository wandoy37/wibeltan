<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materis = Materi::orderBy('id', 'DESC')->get();
        return view('dashboard.materi.index', compact('materis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.materi.create');
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
            'kategori' => 'required',
            'thumbnail' => 'required',
            'konten' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('materi.create')
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();
        try {
            Materi::create([
                'nama' => $request->nama,
                'slug' => Str::slug($request->nama),
                'volume' => $request->volume,
                'satuan' => $request->satuan,
                'harga' => $request->harga,
                'kategori' => $request->kategori,
                'thumbnail' => $request->thumbnail,
                'konten' => $request->konten,
            ]);

            return redirect()->route('materi.index')->with('success', 'Materi Berhasil Di Buat');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('materi.create')->with('error', 'Materi Gagal Di Buat');
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
        $materi = Materi::find($id);
        return view('dashboard.materi.edit', compact('materi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $materi = Materi::find($id);

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'volume' => 'required',
            'satuan' => 'required',
            'harga' => 'required',
            'kategori' => 'required',
            'thumbnail' => 'required',
            'konten' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('materi.edit', $materi->id)
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();
        try {
            $materi->update([
                'nama' => $request->nama,
                'slug' => Str::slug($request->nama),
                'volume' => $request->volume,
                'satuan' => $request->satuan,
                'harga' => $request->harga,
                'kategori' => $request->kategori,
                'thumbnail' => $request->thumbnail,
                'konten' => $request->konten,
            ]);

            return redirect()->route('materi.index')->with('success', 'Materi Berhasil Di Update');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('materi.edit', $materi->id)->with('error', 'Materi Gagal Di Buat');
        } finally {
            DB::commit();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $materi = Materi::find($id);

        DB::beginTransaction();
        try {
            $materi->delete();
            return redirect()->route('materi.index')->with('success', 'Materi Berhasil Di Hapus');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('materi.index')->with('error', 'Materi Gagal Di Update');
        } finally {
            DB::commit();
            return redirect()->back();
        }
    }
}
