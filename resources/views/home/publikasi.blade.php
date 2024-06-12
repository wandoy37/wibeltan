@extends('home.layouts.app')

@section('title', 'Publikasi & Pertanaman')

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
                    <h2 class="pt-2 breadcrumb-title">Publikasi & Pertanaman</h2>
                    <h4 class="breadcrumb-title">Publikasi Wisata Belajar Pertanian & Jadwal Pertanaman</h4>
                </div>
            </div>
        </div>
    </section>

    <section class="my-4">
        <div class="container">
            <div class="row mb-2">
                <div class="col-md-6">
                    <div class="card" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the card's content.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
@endpush
