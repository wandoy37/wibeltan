@extends('layouts.app')

@section('title', '- Dashboard Index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="py-4">WIBELTAN - DASHBOARD</h1>
                <p class="display-6">Sistem Informasi - Wisata Belajar Pertanian</p>

                {{-- Alert --}}
                @include('layouts.alert')
                {{-- End Alert --}}

                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">HARI/TANGGAL PELAKSANAAN</th>
                            <th scope="col">ASAL</th>
                            <th scope="col">JUMLAH PESERTA</th>
                            <th scope="col">MATERI</th>
                            <th scope="col">KETERANGAN</th>
                            <th scope="col">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pemohons as $pemohon)
                            <tr>
                                <th scope="row" class="text-center">{{ $pemohon->tanggal_pelaksanaan }}</th>
                                <td>{{ $pemohon->asal }}</td>
                                <td class="text-center">{{ $pemohon->count_peserta }}</td>
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
                                <td class="text-center">
                                    {{ $pemohon->verifikasi }}
                                </td>
                                <td>
                                    <form action="{{ route('pemohon.destroy', $pemohon->id) }}" method="POST"
                                        class="form-inline justify-content-center">
                                        @csrf
                                        @method('DELETE')
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('dashboard.edit', $pemohon->id) }}"
                                                class="btn btn-outline-primary">Edit</a>
                                            <button type="submit" class="btn btn-outline-danger"
                                                onclick="return confirm('Anda yakin ingin menghapus permohonan ini ?')">Hapus</button>
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
@endsection
