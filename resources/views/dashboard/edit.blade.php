@extends('layouts.app')

@section('title', '- Dashboard Edit')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="py-4">WIBELTAN - Edit Permohonan</h1>
                <p class="display-6">Sistem Informasi - Wisata Belajar Pertanian</p>
                <a href="{{ route('dashboard.index') }}" class="btn btn-warning">
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
                        <h2>Update Permohonan</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pemohon.update', $pemohon->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Pemohon</label>
                                        <input type="text" name="nama"
                                            class="form-control @error('nama') is-invalid @enderror"
                                            value="{{ old('nama', $pemohon->nama) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Pelaksanaan</label>
                                        <input type="date" name="tanggal_pelaksanaan"
                                            class="form-control @error('tanggal_pelaksanaan') is-invalid @enderror"
                                            value="{{ old('tanggal_pelaksanaan', $pemohon->tanggal_pelaksanaan) }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Asal Sekolah/Intansi/Organisasi/Kelompok*</label>
                                        <input type="text" name="asal"
                                            class="form-control @error('asal') is-invalid @enderror"
                                            value="{{ old('asal', $pemohon->asal) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="text" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email', $pemohon->email) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nomor Handphone</label>
                                        <input type="text" name="no_hp"
                                            class="form-control @error('no_hp') is-invalid @enderror"
                                            value="{{ old('no_hp', $pemohon->no_hp) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Jumlah Peserta</label>
                                        <input type="number" name="count_peserta"
                                            class="form-control @error('count_peserta') is-invalid @enderror"
                                            value="{{ old('count_peserta', $pemohon->count_peserta) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Jumlah Gazebo</label>
                                        <input type="number" name="count_gazebo"
                                            class="form-control @error('count_gazebo') is-invalid @enderror"
                                            value="{{ old('count_gazebo', $pemohon->count_gazebo) }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Pilih Paket Materi Wisata Pertanian</label>
                                        @foreach ($materis as $materi)
                                            <div class="form-check">
                                                <input class="form-check-input" name="materis[]" type="checkbox"
                                                    value="{{ $materi->id }}"
                                                    @if ($pemohon->materis->contains($materi->id)) checked @endif>
                                                <label class="form-check-label">
                                                    {{ $materi->nama }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Status Verifikasi</label>
                                        <select class="form-select" name="verifikasi">
                                            <option value="" disabled
                                                {{ is_null($pemohon->verifikasi) ? 'selected' : '' }}>- Status Verifikasi -
                                            </option>
                                            <option value="disetujui"
                                                {{ $pemohon->verifikasi == 'disetujui' ? 'selected' : '' }}>disetujui
                                            </option>
                                            <option value="menunggu persetujuan"
                                                {{ $pemohon->verifikasi == 'menunggu persetujuan' ? 'selected' : '' }}>
                                                menunggu persetujuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="float-end">
                                        <button type="submit" class="btn btn-success">
                                            UPDATE
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
