@php
    use Carbon\Carbon;
    $today = Carbon::today();
@endphp

@extends('home.layouts.app')

@section('title', 'Jadwal Wisata Belajar Pertanian')

@push('style')
    <style>
        .fc .fc-col-header-cell-cushion {
            display: inline-block;
            padding: 2px 4px;
            text-decoration: none;
            color: #013220;
        }

        .fc-daygrid-day-number {
            text-decoration: none;
            color: #013220;
        }
    </style>
    <script script src="{{ asset('fullcalendar/dist/index.global.min.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('datatables/css/jquery.dataTables.css') }}" />
    <style>
        /* Membuat teks pada elemen <th> menjadi rata tengah */
        table.dataTable thead th {
            text-align: center;
        }

        table.dataTable tbody td {
            vertical-align: middle;
        }
    </style>
@endpush





@section('content')
    <section class="breadcrumb-background">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="pt-2 breadcrumb-title">Jadwal</h2>
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
                            <div id='calendar'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>TANGGAL PELAKSANAAN</th>
                                        <th>ASAL</th>
                                        <th>JUMLAH PESERTA</th>
                                        <th>MATERI</th>
                                        <th>KETERANGAN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pemohons as $pemohon)
                                        <tr>
                                            <td class="text-center">{{ $pemohon->tanggal_pelaksanaan->format('Y-m-d') }}
                                            </td>
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
                                                @php
                                                    // Pastikan tanggal_pelaksanaan diubah menjadi objek Carbon
                                                    $tanggal_pelaksanaan = Carbon::parse($pemohon->tanggal_pelaksanaan);
                                                @endphp
                                                @if ($pemohon->verifikasi == 'disetujui')
                                                    @if ($tanggal_pelaksanaan->isBefore($today))
                                                        <h5>
                                                            <span class="badge bg-success" style="border-radius: 15px;">
                                                                TERLAKSANA
                                                            </span>
                                                        </h5>
                                                    @else
                                                        <h5>
                                                            <span class="badge bg-info" style="border-radius: 15px;">
                                                                TERJADWAL
                                                            </span>
                                                        </h5>
                                                    @endif
                                                @else
                                                    <h5>
                                                        <span class="badge bg-warning" style="border-radius: 15px;">
                                                            {{ $pemohon->verifikasi }}
                                                        </span>
                                                    </h5>
                                                @endif
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
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var jadwals = @json($jadwals);

            var events = jadwals.map(function(jadwal) {
                return {
                    title: jadwal.asal,
                    start: jadwal.tanggal_pelaksanaan,
                    backgroundColor: '#013220',
                    borderColor: '#013220',

                };
            });

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'id',
                events: events
            });

            calendar.render();
        });
    </script>

    <script src="{{ asset('datatables/js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('datatables/js/jquery.dataTables.js') }}"></script>
    <script>
        // new DataTable('#example');
        $('#example').DataTable({
            "ordering": false
        });
    </script>
@endpush
