@extends('home.layouts.app')

@section('title', 'Survey Terkirim')

@section('content')

    <section style="padding-top: 10vh">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12">
                    @if (session('success'))
                        <h4>Hi, {{ session('success') }}</h4>
                    @endif
                    <h1>Saran & Masukan</h1>
                    <h4>Wisata Belajar Pertanian Terkirim</h4>
                    <img src="{{ asset('img/success-svgrepo-com.svg') }}" class="img-fluid" width="15%" alt="">
                    <p class="my-4">Terimakasih Atas Saran & Masukan Yang Telah Anda Berikan.</p>
                </div>
            </div>
            <div class="row text-center pt-4">
                <div class="col-lg-12">
                    <a href="{{ route('home.index') }}" class="button-2">
                        <i class="fas fa-home"></i>
                        Kembali ke Halaman Utama
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
