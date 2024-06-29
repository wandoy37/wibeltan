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

    <style>
        .card-custom {
            background-color: rgba(0, 0, 0, 0.5);
            /* Warna hitam dengan 50% opasitas */
            color: white;
            /* Warna teks putih agar kontras dengan background gelap */
        }

        .card {
            border: none;
            border-radius: 10px;
            background-color: #eee;
        }

        .c-details span {
            font-weight: 300;
            font-size: 13px
        }

        .icon {
            width: 50px;
            height: 50px;
            background-color: #eee;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 39px
        }

        .badge span {
            background-color: #fffbec;
            width: 60px;
            height: 25px;
            padding-bottom: 3px;
            border-radius: 5px;
            display: flex;
            color: #fed85d;
            justify-content: center;
            align-items: center
        }

        .progress {
            height: 10px;
            border-radius: 10px
        }

        .progress div {
            background-color: red
        }

        .text1 {
            font-size: 14px;
            font-weight: 600
        }

        .text2 {
            color: #a5aec0
        }

        .card-custom {
            background: url('{{ asset('img/card-background.png') }}') no-repeat center center;
            background-size: cover;
            color: white;
            /* Warna teks putih agar kontras dengan background */
            position: relative;
        }

        .card-custom::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.4);
            /* Warna hitam dengan 50% opasitas */
            z-index: 1;
        }

        .card-custom .content {
            position: relative;
            z-index: 2;
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

    {{-- Section Summery Information --}}
    <section>
        <div class="container">
            <div class="row align-items-center my-4">
                <div class="col-lg-6">
                    <img src="{{ asset('img/img_information.png') }}" class="img-fluid img-thumbnail rounded"
                        alt="">
                </div>
                <div class="col-lg-6">
                    <h1>
                        <strong style="color: #013220">WIBELTAN</strong>
                    </h1>
                    <h1>Sistem Informasi Wisata Belajar Pertanian</h1>
                    <p>
                        Sistem Informasi Wisata Belajar Pertanian <b>"WIBELTAN"</b> merupakan inovasi aksi perubahan yang di
                        rancang untuk memudahkan pendaftaran pariwisata dan pembelajaran dalam bidang pertanian.
                    </p>
                </div>
                <div class="col-lg-12">
                    <hr class="my-4">
                </div>
            </div>
        </div>
    </section>



    <section>
        <div class="container mt-5 mb-3">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-custom p-3 mb-2">
                        <div class="d-flex justify-content-between content">
                            <div class="my-5">
                                <h3 class="heading">Total</h3>
                                <span>Kunjungan Sekolah/ Kelompok / Organisasi</span>
                            </div>
                            <div class="my-5">
                                <h1>{{ $countsAsal->count() }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-custom p-3 mb-2">
                        <div class="d-flex justify-content-between content">
                            <div class="my-5">
                                <h3 class="heading">Total</h3>
                                <span>Peserta</span>
                            </div>
                            <div class="my-5">
                                <h1>
                                    <h1>{{ $totalPeserta }}</h1>
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Section Summery Information End --}}

    <section class="my-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-grid gap-2">
                        <a href="{{ route('daftar') }}" class="button-1">
                            DAFTAR DISINI
                        </a>
                    </div>
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

    <section class="my-4" id="survey">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="my-4">Bagaimana Pendapat Saudara Tentang Prosedur Pendaftaran Wisata Belajar
                                Pertanian di
                                UPTD Balai Penyuluhan dan Pengembangan SDM Pertanian?</h5>
                            <form action="{{ route('survey.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Nama</label>
                                    <input type="text" name="nama" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Asal Sekolah/Intansi/Organisasi/Kelompok*</label>
                                    <input type="text" name="asal" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jawaban"
                                            value="tidak mudah" id="tidak_mudah" required>
                                        <label class="form-check-label" for="tidak_mudah">
                                            Tidak Mudah
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jawaban"
                                            value="kurang mudah" id="kurang_mudah" required>
                                        <label class="form-check-label" for="kurang_mudah">
                                            Kurang Mudah
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jawaban" value="mudah"
                                            id="mudah" required>
                                        <label class="form-check-label" for="mudah">
                                            Mudah
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jawaban"
                                            value="sangat mudah" id="sangat_mudah" required>
                                        <label class="form-check-label" for="sangat_mudah">
                                            Sangat Mudah
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Saran & Masukan</label>
                                    <textarea class="form-control" name="saran_masukan" required rows="2"></textarea>
                                </div>
                                <div class="d-grid">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa-solid fa-share-from-square"></i>
                                        Kirim
                                    </button>
                                </div>
                            </form>
                        </div>
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
