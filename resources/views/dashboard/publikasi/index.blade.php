@extends('dashboard.layouts.app')

@section('title', 'Publikasi')

@section('content')
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Publikasi</h3>
            </div>
            {{-- <div class="ms-md-auto py-2 py-md-0">
                <a href="{{ route('pblikasi.create') }}" class="btn btn-primary btn-round">
                    <i class="fas fa-plus"></i>
                    Materi
                </a>
            </div> --}}
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
                                    <th>No</th>
                                    <th>Asal Sekolah/Intansi/Organisasi/Kelompok</th>
                                    <th>Tanggal Pelaksanaan</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($pemohons as $pemohon)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $pemohon->asal }}</td>
                                            <td>
                                                {{ $pemohon->tanggal_pelaksanaan }}
                                                <br>
                                                <span class="badge badge-success">Terlaksana</span>
                                            </td>
                                            <td>
                                                <a href="{{ route('photos.edit', $pemohon->id) }}"
                                                    class="btn btn-outline-primary">
                                                    <i class="fas fa-plus"></i>
                                                    Photos
                                                </a>
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
