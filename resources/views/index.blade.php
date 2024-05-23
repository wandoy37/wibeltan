@extends('layouts.app')

@section('title', '- Wisata Belajar Pertanian')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="py-4">WIBELTAN</h1>
                <p class="display-6">Sistem Informasi - Wisata Belajar Pertanian</p>

                {{-- Alert --}}
                @include('layouts.alert')
                {{-- End Alert --}}

                <div class="my-4">
                    <a href="{{ route('pemohon.create') }}" class="btn btn-success">
                        DAFTAR
                    </a>
                    <a href="{{ route('kalender.index') }}" class="btn btn-info">
                        Lihat Jadwal
                    </a>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">HARI/TANGGAL PELAKSANAAN</th>
                            <th scope="col">ASAL</th>
                            <th scope="col">JUMLAH PESERTA</th>
                            <th scope="col">MATERI</th>
                            <th scope="col">KETERANGAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pemohons as $pemohon)
                            <tr>
                                <th scope="row">{{ $pemohon->tanggal_pelaksanaan }}</th>
                                <td>{{ $pemohon->asal }}</td>
                                <td>{{ $pemohon->count_peserta }}</td>
                                <td>
                                    <ul>
                                        @if ($pemohon->materis)
                                            @foreach ($pemohon->materis as $materi)
                                                <li>{{ $materi->nama }}</li>
                                            @endforeach
                                        @else
                                            <li>Tidak ada materi</li>
                                        @endif
                                    </ul>
                                </td>
                                <td>
                                    {{ $pemohon->verifikasi }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
