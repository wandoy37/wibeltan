@extends('dashboard.layouts.app')

@section('title', 'Pemohon')

@section('content')
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Pemohon</h3>
            </div>
            <div class="ms-md-auto py-2 py-md-0">
                <a href="{{ route('pemohon.create') }}" class="btn btn-primary btn-round">
                    <i class="fas fa-plus"></i>
                    Pemohon
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
                                    <th>TANGGAL PELAKSANAAN</th>
                                    <th>ASAL</th>
                                    <th>JUMLAH PESERTA</th>
                                    <th>MATERI</th>
                                    <th>KETERANGAN</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    @foreach ($pemohons as $pemohon)
                                        <tr>
                                            <td>{{ $pemohon->tanggal_pelaksanaan }}</td>
                                            <td>
                                                {{ $pemohon->asal }}
                                                @if ($pemohon->dokumen !== null)
                                                    <br>
                                                    <a href="{{ asset('storage/' . $pemohon->dokumen) }}" target="_blank"
                                                        class="text-decoration-none">
                                                        <i class="far fa-eye"></i>
                                                        Surat Permohonan
                                                    </a>
                                                @endif
                                            </td>
                                            <td>{{ $pemohon->count_peserta }}</td>
                                            <td>
                                                <ul>
                                                    @if ($pemohon->materis)
                                                        @foreach ($pemohon->materis as $materi)
                                                            <li>{{ $materi->nama }}</li>
                                                        @endforeach
                                                    @else
                                                        <li>Tidak ada materi</li>
                                                    @endif
                                                </ul>
                                            </td>
                                            <td>{{ $pemohon->verifikasi }}</td>
                                            <td>
                                                <form action="{{ route('pemohon.destroy', $pemohon->id) }}" method="POST"
                                                    class="form-inline justify-content-center">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ route('pemohon.edit', $pemohon->id) }}"
                                                            class="btn btn-outline-primary">Edit</a>
                                                        <button type="submit" class="btn btn-outline-danger"
                                                            onclick="return confirm('Anda yakin ingin permohonan ini ?')">Hapus</button>
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
        $('#basic-datatables').DataTable({
            "ordering": false
        });
    </script>
@endpush
