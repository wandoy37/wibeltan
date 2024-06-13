@extends('home.layouts.app')

@section('title', 'Daftar Wisata Belajar Pertanian')

@push('style')
    {{-- <link rel="stylesheet" href="{{ asset('jquery/datepicker/jquery-ui.css') }}"> --}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="{{ asset('jquery/datepicker/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('jquery/datepicker/jquery-ui.js') }}"></script>
@endpush

@section('content')
    <section class="breadcrumb-background">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="pt-2 breadcrumb-title">Daftar</h2>
                    <h4 class="breadcrumb-title">Wisata Belajar Pertanian</h4>
                </div>
            </div>
        </div>
    </section>

    <section class="my-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <a href="{{ route('home.index') }}" class="button-2">
                        Kembali
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
                            <form action="{{ route('daftar.store') }}" method="POST">
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
                                            <input type="text" name="tanggal_pelaksanaan" id="datepicker"
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
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Materi Bawaan</label>
                                                @foreach ($materi_bawaans as $bawaan)
                                                    <div class="form-check">
                                                        <input
                                                            class="form-check-input @error('materis') is-invalid @enderror"
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
                                                <label class="form-label">Paket Pilihan</label>
                                                @foreach ($materi_pilihans as $pilihan)
                                                    <div class="form-check">
                                                        <input
                                                            class="form-check-input @error('materis') is-invalid @enderror"
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
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="float-end">
                                                <button type="submit" class="button-1">
                                                    DAFTAR
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(function() {
            var disabledDates = @json($jadwals->pluck('tanggal_pelaksanaan'));

            function disableDates(date) {
                var string = $.datepicker.formatDate('yy-mm-dd', date);
                return [disabledDates.indexOf(string) === -1];
            }

            $("#datepicker").datepicker({
                beforeShowDay: disableDates
            });
        });
    </script>
@endpush
