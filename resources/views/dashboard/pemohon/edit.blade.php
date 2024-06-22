@extends('dashboard.layouts.app')

@section('title', 'Edit Pemohon')

@push('style')
    {{-- <link rel="stylesheet" href="{{ asset('jquery/datepicker/jquery-ui.css') }}"> --}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="{{ asset('jquery/datepicker/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('jquery/datepicker/jquery-ui.js') }}"></script>

    <style>
        .disabled-date {
            background-color: red;
            color: white;
            text-decoration: line-through;
            text-decoration-color: black;
        }
    </style>
@endpush

@section('content')
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Edit Pemohon</h3>
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
                        <h4>UPDATE PERMOHONAN</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pemohon.update', $pemohon->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Pemohon</label>
                                        <input type="text" name="nama"
                                            class="form-control form-control @error('nama') is-invalid @enderror"
                                            value="{{ old('nama', $pemohon->nama) }}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal Pelaksanaan</label>
                                        <input type="text" name="tanggal_pelaksanaan" id="datepicker"
                                            class="form-control @error('tanggal_pelaksanaan') is-invalid @enderror"
                                            value="{{ old('tanggal_pelaksanaan', optional($pemohon->tanggal_pelaksanaan)->format('Y-m-d')) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Asal Sekolah/Intansi/Organisasi/Kelompok</label>
                                <input type="text" name="asal"
                                    class="form-control form-control @error('asal') is-invalid @enderror"
                                    value="{{ old('asal', $pemohon->asal) }}" />
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email"
                                            class="form-control form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email', $pemohon->email) }}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nomor Handphone</label>
                                        <input type="text" name="no_hp"
                                            class="form-control form-control @error('no_hp') is-invalid @enderror"
                                            value="{{ old('no_hp', $pemohon->no_hp) }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jumlah Peserta</label>
                                        <input type="number" name="count_peserta"
                                            class="form-control form-control @error('count_peserta') is-invalid @enderror"
                                            value="{{ old('count_peserta', $pemohon->count_peserta) }}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jumlah Gazebo</label>
                                        <select class="form-select form-control @error('count_gazebo') is-invalid @enderror"
                                            name="count_gazebo">
                                            <option value="">--pilih jumlah gazebo--</option>
                                            <option value="1"
                                                {{ old('count_gazebo', $pemohon->count_gazebo) == 1 ? 'selected' : '' }}>1
                                                Unit Gazebo</option>
                                            <option value="2"
                                                {{ old('count_gazebo', $pemohon->count_gazebo) == 2 ? 'selected' : '' }}>2
                                                Unit Gazebo</option>
                                        </select>
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
                                                    {{ in_array($bawaan->id, old('materis', $pemohon->materis->pluck('id')->toArray())) ? 'checked' : '' }}>
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
                                                    {{ in_array($pilihan->id, old('materis', $pemohon->materis->pluck('id')->toArray())) ? 'checked' : '' }}>
                                                <label class="form-check-label">
                                                    {{ $pilihan->nama }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-12 my-4">
                                    <div class="mb-3">
                                        <label class="form-label">Upload Surat Permohonan</label>
                                        @error('dokumen')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <input class="form-control" name="dokumen" type="file" accept="application/pdf">
                                        <i class="text-decoration-underline">Max Size : 2mb</i>

                                        <!-- Menambahkan bagian ini untuk menampilkan link ke dokumen -->
                                        @if (isset($pemohon->dokumen))
                                            <div class="mt-2">
                                                <a href="{{ asset($pemohon->dokumen) }}" target="_blank">Lihat
                                                    Dokumen</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Status Verifikasi</label>
                                <select class="form-select form-control @error('verifikasi') is-invalid @enderror"
                                    name="verifikasi">
                                    <option>- Status Verivikasi -</option>
                                    <option value="disetujui"
                                        {{ old('verifikasi', $pemohon->verifikasi) == 'disetujui' ? 'selected' : '' }}>
                                        disetujui
                                    </option>
                                    <option value="menunggu persetujuan"
                                        {{ old('verifikasi', $pemohon->verifikasi) == 'menunggu persetujuan' ? 'selected' : '' }}>
                                        menunggu persetujuan
                                    </option>
                                    <option value="ditolak"
                                        {{ old('verifikasi', $pemohon->verifikasi) == 'ditolak' ? 'selected' : '' }}>
                                        ditolak
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-round">
                                    <i class="fas fa-sync"></i>
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            var disabledDates = @json(
                $jadwals->pluck('tanggal_pelaksanaan')->map(function ($date) {
                    return \Carbon\Carbon::parse($date)->format('Y-m-d');
                }));

            function disableDates(date) {
                var string = $.datepicker.formatDate('yy-mm-dd', date);
                var isDisabled = disabledDates.indexOf(string) === -1;
                return [isDisabled, isDisabled ? '' : 'disabled-date'];
            }

            $("#datepicker").datepicker({
                dateFormat: 'yy-mm-dd',
                beforeShowDay: disableDates
            });
        });
    </script>
@endpush
