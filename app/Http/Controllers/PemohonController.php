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
        return view('dashboard.pemohon.index', compact('pemohons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $materi_pilihans = Materi::where('kategori', 'pilihan')->orderBy('id', 'DESC')->get();
        $materi_bawaans = Materi::where('kategori', 'bawaan')->orderBy('id', 'DESC')->get();

        return view('dashboard.pemohon.create', compact('materi_pilihans', 'materi_bawaans'));
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
            return redirect()->route('pemohon.create')
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
                'verifikasi' => 'menunggu persetujuan'
            ]);
            $pemohon->materis()->attach($request->materis);

            return redirect()->route('pemohon.index')->with('success', 'Permohonan Berhasil Di Buat');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('pemohon.create')->with('error', 'Permohonan Gagal Di Buat');
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
        $pemohon = Pemohon::find($id);
        $materi_pilihans = Materi::where('kategori', 'pilihan')->orderBy('id', 'DESC')->get();
        $materi_bawaans = Materi::where('kategori', 'bawaan')->orderBy('id', 'DESC')->get();

        return view('dashboard.pemohon.edit', compact('pemohon', 'materi_pilihans', 'materi_bawaans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pemohon = Pemohon::find($id);

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'tanggal_pelaksanaan' => 'required',
            'asal' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'count_peserta' => 'required',
            'count_gazebo' => 'required',
            'materis' => 'required',
            'verifikasi' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('pemohon.edit', $pemohon->id)
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();
        try {
            $pemohon->update([
                'nama' => $request->nama,
                'tanggal_pelaksanaan' => $request->tanggal_pelaksanaan,
                'asal' => $request->asal,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'count_peserta' => $request->count_peserta,
                'count_gazebo' => $request->count_gazebo,
                'verifikasi' => $request->verifikasi,
            ]);
            $pemohon->materis()->sync($request->materis);

            return redirect()->route('pemohon.index')->with('success', 'Permohonan Berhasil Di Update');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('pemohon.edit', $pemohon->id)->with('error', 'Permohonan Gagal Di Update');
        } finally {
            DB::commit();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pemohon = Pemohon::find($id);

        DB::beginTransaction();
        try {
            $pemohon->materis()->detach();
            $pemohon->delete();
            return redirect()->route('pemohon.index')->with('success', 'Permohonan Telah di Hapus');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('pemohon.index')->with('error', 'Permohonan Gagal di Hapus');
        } finally {
            DB::commit();
            return redirect()->back();
        }
    }
}
