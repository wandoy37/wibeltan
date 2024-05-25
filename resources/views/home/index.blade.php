@php
    use Carbon\Carbon;
    $today = Carbon::today();
@endphp

@extends('home.layouts.app')

@section('title', 'Sistem Informasi Wisata Belajar Pertanian')

@push('style')
    <link rel="stylesheet" href="{{ asset('datatables/css/jquery.dataTables.css') }}" />
    <style>
        /* Membuat teks pada elemen <th> menjadi rata tengah */
        table.dataTable thead th {
            text-align: center;
        }

        table.dataTable tbody td {
            vertical-align: middle;
        }
    </style>
@endpush




@section('content')
    <section class="breadcrumb-background">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="pt-2 breadcrumb-title">WIBELTAN</h2>
                    <h4 class="breadcrumb-title">Sistem Informasi Wisata Belajar Pertanian</h4>
                </div>
            </div>
        </div>
    </section>

    <section class="my-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-between">
                    <a href="{{ route('jadwal') }}" class="button-2">
                        <i class="fa-regular fa-calendar-days"></i>
                        Lihat Jadwal
                    </a>
                    <a href="{{ route('daftar') }}" class="button-1">
                        Daftar
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>TANGGAL PELAKSANAAN</th>
                                        <th>ASAL</th>
                                        <th>JUMLAH PESERTA</th>
                                        <th>MATERI</th>
                                        <th>KETERANGAN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pemohons as $pemohon)
                                        <tr>
                                            <td class="text-center">{{ $pemohon->tanggal_pelaksanaan }}</td>
                                            <td>{{ $pemohon->asal }}</td>
                                            <td class="text-center">{{ $pemohon->count_peserta }}</td>
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
                                            <td class="text-center">
                                                @php
                                                    // Pastikan tanggal_pelaksanaan diubah menjadi objek Carbon
                                                    $tanggal_pelaksanaan = Carbon::parse($pemohon->tanggal_pelaksanaan);
                                                @endphp
                                                @if ($pemohon->verifikasi == 'disetujui')
                                                    @if ($tanggal_pelaksanaan->isBefore($today))
                                                        <h5>
                                                            <span class="badge bg-success" style="border-radius: 15px;">
                                                                TERLAKSANA
                                                            </span>
                                                        </h5>
                                                    @else
                                                        <h5>
                                                            <span class="badge bg-info" style="border-radius: 15px;">
                                                                TERJADWAL
                                                            </span>
                                                        </h5>
                                                    @endif
                                                @else
                                                    <h5>
                                                        <span class="badge bg-warning" style="border-radius: 15px;">
                                                            {{ $pemohon->verifikasi }}
                                                        </span>
                                                    </h5>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="my-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Cuplika Wisata Belajar Pertanian</h2>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('datatables/js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('datatables/js/jquery.dataTables.js') }}"></script>
    <script>
        new DataTable('#example');
    </script>
@endpush
