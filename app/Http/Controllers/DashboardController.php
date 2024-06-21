<?php

namespace App\Http\Controllers;

use App\Models\Pemohon;
use App\Models\Survey;
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

    public function survey()
    {
        $surveys = Survey::orderBy('id', 'DESC')->get();
        return view('dashboard.survey', compact('surveys'));
    }
}
