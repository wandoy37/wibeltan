<?php

namespace App\Http\Controllers;

use App\Models\Pemohon;
use Illuminate\Http\Request;

class KalenderController extends Controller
{
    public function index()
    {
        $jadwals = Pemohon::where('verifikasi', 'disetujui')->get();
        return view('kalender.index', compact('jadwals'));
    }
}
