<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\Pemohon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class PemohonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemohons = Pemohon::orderBy('id', 'DESC')->get();
        // return response()->json($pemohons);
        return view('index', compact('pemohons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $materis = Materi::all();
        return view('pemohon.create', compact('materis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'tanggal_pelaksanaan' => 'required',
            'asal' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'count_peserta' => 'required',
            'count_gazebo' => 'required',
            'materis' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('create')
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();
        try {
            $pemohon = Pemohon::create([
                'nama' => $request->nama,
                'tanggal_pelaksanaan' => $request->tanggal_pelaksanaan,
                'asal' => $request->asal,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'count_peserta' => $request->count_peserta,
                'count_gazebo' => $request->count_gazebo,
            ]);
            $pemohon->materis()->attach($request->materis);

            return redirect()->route('index')->with('success', 'Permohonan Berhasil Di Buat');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('create')->with('error', 'Permohonan Gagal Di Buat');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
