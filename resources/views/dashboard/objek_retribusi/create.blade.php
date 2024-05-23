@extends('dashboard.layouts.app')

@section('title', 'Tambah Objek Retribusi')

@section('content')
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Tambah Objek Retribusi</h3>
            </div>
            <div class="ms-md-auto py-2 py-md-0">
                <a href="{{ route('objek-retribusi.index') }}" class="btn btn-label-info btn-round me-2">
                    Kembali
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                @include('dashboard.layouts.alert')
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('objek-retribusi.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="largeInput">Objek Retribusi</label>
                                <input type="text" name="nama"
                                    class="form-control form-control @error('nama') is-invalid @enderror"
                                    value="{{ old('nama') }}" />
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="largeInput">Volume</label>
                                        <input type="text" name="volume"
                                            class="form-control form-control @error('volume') is-invalid @enderror"
                                            value="{{ old('volume') }}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="largeInput">Satuan</label>
                                        <input type="text" name="satuan"
                                            class="form-control form-control @error('satuan') is-invalid @enderror"
                                            value="{{ old('satuan') }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="largeInput">Harga</label>
                                <input type="text" name="harga"
                                    class="form-control form-control @error('harga') is-invalid @enderror"
                                    value="{{ old('harga') }}" />
                            </div>
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
