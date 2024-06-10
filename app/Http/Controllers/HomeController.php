<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\Pemohon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $pemohons = Pemohon::orderBy('id', 'DESC')->get();
        return view('home.index', compact('pemohons'));
    }

    public function jadwal()
    {
        $jadwals = Pemohon::where('verifikasi', 'disetujui')->get();
        return view('home.jadwal', compact('jadwals'));
    }

    public function materi()
    {
        $materis = Materi::orderBy('id', 'DESC')->get();
        return view('home.materi', compact('materis'));
    }

    public function daftar(Request $request)
    {
        $materi_pilihans = Materi::where('kategori', 'pilihan')->orderBy('id', 'DESC')->get();
        $materi_bawaans = Materi::where('kategori', 'bawaan')->orderBy('id', 'DESC')->get();
        return view('home.daftar', compact('materi_pilihans', 'materi_bawaans'));
    }

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
            return redirect()->route('daftar')
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

            return redirect()->route('success')->with('success', 'Hi, ' . $request->nama);
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('pemohon.create')->with('error', 'Permohonan Anda Gagal Di Buat');
        } finally {
            DB::commit();
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
}