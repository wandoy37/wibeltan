<?php

namespace App\Http\Controllers;

use App\Models\Pemohon;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 
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
        $photos = Photo::where('pemohon_id', $pemohon->id)->get();
        return view('dashboard.photo.edit', compact('pemohon', 'photos'));
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
        DB::beginTransaction();
        try {
            $photo = Photo::find($id);
            $photo->delete();
            return redirect()->back()->with('success', 'Photo Berhasil Di Hapus');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Photo Gagal Di Hapus');
        } finally {
            DB::commit();
        }
    }

    public function tambah_photo(Request $request, $id)
    {
        $pemohonId = Pemohon::find($id);
        $validator = Validator::make($request->all(), [
            'photo_path' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();
        try {
            Photo::create([
                'pemohon_id' => $pemohonId->id,
                'photo_path' => $request->photo_path,
            ]);
            return redirect()->back()->with('success', 'Photo Berhasil Di Tambahkan');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Photo Gagal Di Tambahkan');
        } finally {
            DB::commit();
        }
    }
}
