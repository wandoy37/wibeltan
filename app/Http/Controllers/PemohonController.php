<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\Pemohon;
use App\Services\FonTelService;
use App\Services\FonteService;
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

            // Whatsapp Send
            $this->sendWhatsAppNotification($pemohon);

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

            if ($request->verifikasi == 'disetujui') {
                // Whatsapp Send
                $this->sendWhatsAppVerified($pemohon);
            }

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

    private function sendWhatsAppNotification($pemohon)
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => [
                'target' => '082148722747',
                'message' => 'Hi, Operator *WIBELTAN* Ada Permohonan Wisata Belajar Pertanian Atas Nama ' . $pemohon->nama . ' Dari ' . $pemohon->asal . ', Segera Cek dan Lakukan Konfirmasi Pelaksanaan Melalui Link Berikut : ' . route('pemohon.edit', $pemohon->id),
            ],
            CURLOPT_HTTPHEADER => [
                'Authorization: BRnQBvYJ@Z277QTqGokt'
            ],
        ]);

        $response = curl_exec($curl);
        if (curl_errno($curl)) {
            $error_msg = curl_error($curl);
            curl_close($curl);
            throw new \Exception($error_msg);
        }

        curl_close($curl);
        return $response;
    }

    private function sendWhatsAppVerified($pemohon)
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => [
                'target' => $pemohon->no_hp,
                'message' => 'Hi, ' . $pemohon->nama . ' Permohonan Wisata Belajar Pertanian Anda Sudah di Verifikasi dan akan di laksanakan pada tanggal ' . $pemohon->tanggal_pelaksanaan,
            ],
            CURLOPT_HTTPHEADER => [
                'Authorization: BRnQBvYJ@Z277QTqGokt'
            ],
        ]);

        $response = curl_exec($curl);
        if (curl_errno($curl)) {
            $error_msg = curl_error($curl);
            curl_close($curl);
            throw new \Exception($error_msg);
        }

        curl_close($curl);
        return $response;
    }
}
