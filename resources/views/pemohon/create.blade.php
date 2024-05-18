@extends('layouts.app')

@section('title', '- Daftar Permohonan Wisata')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="py-4">WIBELTAN</h1>
                <p class="display-6">Sistem Informasi - Wisata Belajar Pertanian</p>
                <a href="{{ route('index') }}" class="btn btn-warning">
                    Kembali
                </a>
                <hr class="my-4">
            </div>

            <div class="col-lg-12">

                {{-- Alert --}}
                @include('layouts.alert')
                {{-- End Alert --}}

                <div class="card">
                    <div class="card-header">
                        <h2>Ajukan Permohonan</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Pemohon</label>
                                        <input type="text" name="nama"
                                            class="form-control @error('nama') is-invalid @enderror"
                                            value="{{ old('nama') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Pelaksanaan</label>
                                        <input type="date" name="tanggal_pelaksanaan"
                                            class="form-control @error('tanggal_pelaksanaan') is-invalid @enderror"
                                            value="{{ old('tanggal_pelaksanaan') }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Asal Sekolah/Intansi/Organisasi/Kelompok*</label>
                                        <input type="text" name="asal"
                                            class="form-control @error('asal') is-invalid @enderror"
                                            value="{{ old('asal') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="text" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nomor Handphone</label>
                                        <input type="text" name="no_hp"
                                            class="form-control @error('no_hp') is-invalid @enderror"
                                            value="{{ old('no_hp') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Jumlah Peserta</label>
                                        <input type="number" name="count_peserta"
                                            class="form-control @error('count_peserta') is-invalid @enderror"
                                            value="{{ old('count_peserta') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Jumlah Gazebo</label>
                                        <input type="number" name="count_gazebo"
                                            class="form-control @error('count_gazebo') is-invalid @enderror"
                                            value="{{ old('count_gazebo') }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Pilih Paket Materi Wisata Pertanian</label>
                                        @foreach ($materis as $materi)
                                            <div class="form-check">
                                                <input class="form-check-input" name="materis[]" type="checkbox"
                                                    value="{{ $materi->id }}">
                                                <label class="form-check-label">
                                                    {{ $materi->nama }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="float-end">
                                        <button type="submit" class="btn btn-success">
                                            DAFTAR
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
