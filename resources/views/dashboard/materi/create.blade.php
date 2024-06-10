@extends('dashboard.layouts.app')

@section('title', 'Tambah Materi')

@section('content')
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Tambah Materi</h3>
            </div>
            <div class="ms-md-auto py-2 py-md-0">
                <a href="{{ route('materi.index') }}" class="btn btn-label-info btn-round me-2">
                    Kembali
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                @include('dashboard.layouts.alert')
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('materi.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Materi</label>
                                <input type="text" name="nama"
                                    class="form-control form-control @error('nama') is-invalid @enderror"
                                    value="{{ old('nama') }}" />
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Volume</label>
                                        <input type="text" name="volume"
                                            class="form-control form-control @error('volume') is-invalid @enderror"
                                            value="{{ old('volume') }}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Satuan</label>
                                        <input type="text" name="satuan"
                                            class="form-control form-control @error('satuan') is-invalid @enderror"
                                            value="{{ old('satuan') }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="text" name="harga"
                                    class="form-control form-control @error('harga') is-invalid @enderror"
                                    value="{{ old('harga') }}" />
                            </div>
                            <div class="form-group">
                                <label>Kategori Materi</label>
                                <select class="form-select form-control @error('kategori') is-invalid @enderror"
                                    name="kategori">
                                    <option value="">- Kategori Materi -</option>
                                    <option value="bawaan" {{ old('kategori') == 'bawaan' ? 'selected' : '' }}>Bawaan
                                    </option>
                                    <option value="pilihan" {{ old('kategori') == 'pilihan' ? 'selected' : '' }}>Pilihan
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Thumbnail</label>
                                <input type="file" name="thumbnail"
                                    class="form-control form-control @error('thumbnail') is-invalid @enderror"
                                    value="{{ old('thumbnail') }}" />
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
