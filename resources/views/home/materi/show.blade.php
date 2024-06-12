@extends('home.layouts.app')

@section('title', 'Materi ' . $materi->nama)

@section('content')
    <section class="breadcrumb-background">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="pt-2 breadcrumb-title">Materi</h2>
                    <h4 class="breadcrumb-title">{{ $materi->nama }}</h4>
                </div>
            </div>
        </div>
    </section>

    <section class="my-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>{{ $materi->nama }}</h2>
                    <div class="mt-2">
                        <h4 class="mt-1 fst-italic">
                            <i class="fa-solid fa-sack-dollar"></i>
                            {{ $materi->harga_rupiah }} / {{ $materi->volume }} {{ $materi->satuan }}
                        </h4>
                    </div>
                    @if ($materi->thumbnail == null)
                        <img src="https://casaindonesia.com/lkgallery/images/mqi8kd_green-yellow-red-tomatoes-hanged-from-their-plants-inside-greenhouse-close-view_(1).jpg"
                            class="img-fluid rounded my-4" alt="" width="100%">
                    @else
                        <img src="{{ $materi->thumbnail }}" class="img-fluid rounded my-4" alt="" width="100%">
                    @endif
                    <p>
                        {!! $materi->konten !!}
                    </p>
                    <hr class="my-4">
                </div>
            </div>
        </div>
    </section>
@endsection
