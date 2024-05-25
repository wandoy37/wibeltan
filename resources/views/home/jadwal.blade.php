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
@endpush
