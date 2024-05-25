<?php

namespace App\Http\Controllers;

use App\Models\Pemohon;
use Illuminate\Http\Request;

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
}
