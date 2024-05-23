@extends('layouts.app')

@section('title', '- Lihat Jadwal')

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
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="py-4">LIHAT JADWAL</h1>

                <a href="{{ route('index') }}" class="btn btn-warning">
                    Kembali
                </a>

                {{-- Alert --}}
                @include('layouts.alert')
                {{-- End Alert --}}

                <div id='calendar'></div>

            </div>
        </div>
    </div>
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
                events: events
            });

            calendar.render();
        });
    </script>
@endpush
