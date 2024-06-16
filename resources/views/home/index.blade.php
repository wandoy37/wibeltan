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


    {{-- Carousel --}}
    <style>
        .carousel-inner img {
            height: 400px;
            /* Sesuaikan dengan kebutuhan Anda */
            object-fit: cover;
            /* Menjaga proporsi gambar dan mengisi container */
            width: 100%;
        }
    </style>

    <style>
        .carousel-caption h1 {
            font-size: 3rem;
            /* Sesuaikan ukuran teks */
            font-weight: bold;
            color: #fff;
            /* Warna teks */
            background: rgba(0, 0, 0, 0.5);
        }

        .carousel-caption p {
            font-size: 1.5rem;
            /* Sesuaikan ukuran teks */
            color: #fff;
            /* Warna teks */
        }
    </style>
@endpush




@section('content')

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('img/img_1.png') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/img_2.png') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/img_3.png') }}" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    {{-- <section class="breadcrumb-background">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="pt-2 breadcrumb-title">WIBELTAN</h2>
                    <h4 class="breadcrumb-title">Sistem Informasi Wisata Belajar Pertanian</h4>
                </div>
            </div>
        </div>
    </section> --}}

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
                    <h2 class="my-4">Cuplika Wisata Belajar Pertanian</h2>
                    <div class="row">
                        @foreach ($videos as $video)
                            <div class="col-md-4">
                                <iframe width="420" height="315" src="{{ $video->link }}">
                                </iframe>
                            </div>
                        @endforeach
                    </div>
                    <hr class="my-4">
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
