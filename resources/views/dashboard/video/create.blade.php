@extends('dashboard.layouts.app')

@section('title', 'Tambah Video')

@section('content')
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Tambah Video</h3>
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
                        <form action="{{ route('videos.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title"
                                    class="form-control form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title') }}" />
                            </div>
                            <div class="form-group">
                                <label>Link</label>
                                <input type="text" name="link"
                                    class="form-control form-control @error('link') is-invalid @enderror"
                                    value="{{ old('link') }}" />
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
