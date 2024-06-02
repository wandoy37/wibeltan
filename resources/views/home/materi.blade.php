@extends('home.layouts.app')

@section('title', 'Materi Wisata Belajar Pertanian')

@section('content')
    <section class="breadcrumb-background">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="pt-2 breadcrumb-title">Materi</h2>
                    <h4 class="breadcrumb-title">Wisata Belajar Pertanian</h4>
                </div>
            </div>
        </div>
    </section>

    <section class="my-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-uppercase">
                    <h2 class="text-center">Daftar Materi</h2>
                    <h4 class="text-center">Pembelajaran Wisata Pertanian</h4>
                </div>
            </div>
        </div>
    </section>

    <section class="my-4">
        <div class="container">
            <div class="row">
                @if (count($materis) > 0)
                    @foreach ($materis as $materi)
                        <div class="col-md-4 my-2">
                            <div style="box-shadow: 0 0  20px #ddd;">
                                <div class="position-relative"
                                    style="height: 320px; background-image: url('https://casaindonesia.com/lkgallery/images/mqi8kd_green-yellow-red-tomatoes-hanged-from-their-plants-inside-greenhouse-close-view_(1).jpg'); background-position: center; background-size: cover;">
                                    <div class="position-absolute px-3 py-4"
                                        style="background: rgba(0, 0, 0, .5); right: 0; bottom: 0; left: 0;">
                                        <h3 class="h6"><a href="/"
                                                class="text-white text-decoration-none text-capitalize"
                                                style="line-height: 1.6; font-weight:700;">{{ $materi->nama }}</a>
                                        </h3>
                                        <div class="mt-2">
                                            <small class="mt-1 text-white fst-italic">
                                                <i class="fa-solid fa-sack-dollar"></i>
                                                {{ $materi->harga_rupiah }} / {{ $materi->volume }} {{ $materi->satuan }}
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-lg-12">
                        <div style="padding-top: 10rem; padding-bottom: 10rem;">
                            <h1 class="text-center">Maaf, kami belum memiliki daftar materi</h1>
                        </div>
                    </div>
                @endif
            </div>
            <hr class="my-4">
        </div>
    </section>
@endsection
