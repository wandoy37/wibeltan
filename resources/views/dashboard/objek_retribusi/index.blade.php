@extends('dashboard.layouts.app')

@section('title', 'Objek Retribusi')

@section('content')
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Objek Retribusi</h3>
            </div>
            <div class="ms-md-auto py-2 py-md-0">
                <a href="{{ route('objek-retribusi.create') }}" class="btn btn-primary btn-round">
                    <i class="fas fa-plus"></i>
                    Objek Retribusi
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
                                    <th>Objek Retribusi</th>
                                    <th>Volume</th>
                                    <th>Satuan</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    @foreach ($objek_retribusis as $objek_retribusi)
                                        <tr>
                                            <td>{{ $objek_retribusi->nama }}</td>
                                            <td>{{ $objek_retribusi->volume }}</td>
                                            <td>{{ $objek_retribusi->satuan }}</td>
                                            <td>{{ $objek_retribusi->harga }}</td>
                                            <td>
                                                <form action="{{ route('objek-retribusi.destroy', $objek_retribusi->id) }}"
                                                    method="POST" class="form-inline justify-content-center">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ route('objek-retribusi.edit', $objek_retribusi->id) }}"
                                                            class="btn btn-outline-primary">Edit</a>
                                                        <button type="submit" class="btn btn-outline-danger"
                                                            onclick="return confirm('Anda yakin ingin menghapus objek retribusi ini ?')">Hapus</button>
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
