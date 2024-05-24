@extends('dashboard.layouts.app')

@section('title', 'Tambah Pemohon')

@section('content')
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Tambah Pemohon</h3>
            </div>
            <div class="ms-md-auto py-2 py-md-0">
                <a href="{{ route('pemohon.index') }}" class="btn btn-label-info btn-round me-2">
                    Kembali
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                @include('dashboard.layouts.alert')
                <div class="card">
                    <div class="card-header">
                        <h4>AJUKAN PERMOHONAN</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pemohon.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Pemohon</label>
                                        <input type="text" name="nama"
                                            class="form-control form-control @error('nama') is-invalid @enderror"
                                            value="{{ old('nama') }}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal Pelaksanaan</label>
                                        <input type="date" name="tanggal_pelaksanaan"
                                            class="form-control form-control @error('tanggal_pelaksanaan') is-invalid @enderror"
                                            value="{{ old('tanggal_pelaksanaan') }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Asal Sekolah/Intansi/Organisasi/Kelompok</label>
                                <input type="text" name="asal"
                                    class="form-control form-control @error('asal') is-invalid @enderror"
                                    value="{{ old('asal') }}" />
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email"
                                            class="form-control form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email') }}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nomor Handphone</label>
                                        <input type="text" name="no_hp"
                                            class="form-control form-control @error('no_hp') is-invalid @enderror"
                                            value="{{ old('no_hp') }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jumlah Peserta</label>
                                        <input type="number" name="count_peserta"
                                            class="form-control form-control @error('count_peserta') is-invalid @enderror"
                                            value="{{ old('count_peserta') }}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jumlah Gazebo</label>
                                        <input type="number" name="count_gazebo"
                                            class="form-control form-control @error('count_gazebo') is-invalid @enderror"
                                            value="{{ old('count_gazebo') }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Materi Bawaan</label>
                                        @foreach ($materi_bawaans as $bawaan)
                                            <div class="form-check">
                                                <input class="form-check-input @error('materis') is-invalid @enderror"
                                                    name="materis[]" type="checkbox" value="{{ $bawaan->id }}"
                                                    {{ in_array($bawaan->id, old('materis', [])) ? 'checked' : '' }}>
                                                <label class="form-check-label">
                                                    {{ $bawaan->nama }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Paket Pilihan</label>
                                        @foreach ($materi_pilihans as $pilihan)
                                            <div class="form-check">
                                                <input class="form-check-input @error('materis') is-invalid @enderror"
                                                    name="materis[]" type="checkbox" value="{{ $pilihan->id }}"
                                                    {{ in_array($pilihan->id, old('materis', [])) ? 'checked' : '' }}>
                                                <label class="form-check-label">
                                                    {{ $pilihan->nama }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <label>StatusVerifikasi</label>
                                <select class="form-select form-control @error('verifikasi') is-invalid @enderror"
                                    name="verifikasi">
                                    <option>- Status Verivikasi -</option>
                                    <option value="disetujui" {{ old('verifikasi') == 'disetujui' ? 'selected' : '' }}>
                                        disetujui
                                    </option>
                                    <option value="menunggu persetujuan"
                                        {{ old('verifikasi') == 'menunggu persetujuan' ? 'selected' : '' }}>
                                        menunggu persetujuan
                                    </option>
                                    <option value="ditolak" {{ old('verifikasi') == 'ditolak' ? 'selected' : '' }}>ditolak
                                    </option>
                                </select>
                            </div> --}}
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-round">
                                    <i class="far fa-save"></i>
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
