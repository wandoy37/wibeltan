@extends('dashboard.layouts.app')

@section('title', 'Materi')

@section('content')
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Materi</h3>
            </div>
            <div class="ms-md-auto py-2 py-md-0">
                <a href="{{ route('materi.create') }}" class="btn btn-primary btn-round">
                    <i class="fas fa-plus"></i>
                    Materi
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                @include('dashboard.layouts.alert')
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover" cellspacing="0"
                                width="100%">
                                <thead>
                                    <th>Materi</th>
                                    <th>Volume</th>
                                    <th>Satuan</th>
                                    <th>Harga</th>
                                    <th>Kategori</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    @foreach ($materis as $materi)
                                        <tr>
                                            <td>{{ $materi->nama }}</td>
                                            <td>{{ $materi->volume }}</td>
                                            <td>{{ $materi->satuan }}</td>
                                            <td>{{ $materi->harga }}</td>
                                            <td>{{ $materi->kategori }}</td>
                                            <td>
                                                <form action="{{ route('materi.destroy', $materi->id) }}" method="POST"
                                                    class="form-inline justify-content-center">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ route('materi.edit', $materi->id) }}"
                                                            class="btn btn-outline-primary">Edit</a>
                                                        <button type="submit" class="btn btn-outline-danger"
                                                            onclick="return confirm('Anda yakin ingin menghapus materi ini ?')">Hapus</button>
                                                    </div>
                                                </form>
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
    </div>
@endsection

@push('scripts')
    <script>
        $('#basic-datatables').DataTable();
    </script>
@endpush
