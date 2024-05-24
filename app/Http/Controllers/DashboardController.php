<?php

namespace App\Http\Controllers;

use App\Models\Pemohon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jadwals = Pemohon::where('verifikasi', 'disetujui')->get();

        // widgets count
        $pesertas = Pemohon::sum('count_peserta');
        $waitings = Pemohon::where('verifikasi', 'menunggu persetujuan')->get();
        $verifieds = Pemohon::where('verifikasi', 'disetujui')->get();
        return view('dashboard.index', compact('jadwals', 'waitings', 'verifieds', 'pesertas'));
    }
}
