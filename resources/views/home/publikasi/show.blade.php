@php
    $photos = \App\Models\Photo::where('pemohon_id', $pemohon->id)->get();
    $thumbnail = $photos->first();
@endphp

@extends('home.layouts.app')

@section('title', 'Publikasi ' . $pemohon->asal)

@section('content')
    <section class="breadcrumb-background">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="pt-2 breadcrumb-title">Publikasi</h2>
                    <h4 class="breadcrumb-title">Publikasi Wisata Belajar Pertanian</h4>
                </div>
            </div>
        </div>
    </section>

    <section class="my-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 my-2">
                    <div style="box-shadow: 0 0  20px #ddd;">
                        <div class="position-relative"
                            style="height: 768px; background-image: url('{{ optional($thumbnail)->photo_path ?: 'http://wibeltan.test/storage/photos/1/1344080-landscape-green-color-environment-growth-plant 1.png' }}'); background-position: center; background-size: cover;">
                        </div>
                    </div>
                    <hr class="my-4">
                </div>
                @foreach ($photos as $photo)
                    <div class="col-lg-4">
                        <a href="{{ $photo->photo_path }}">
                            <div class="position-relative"
                                style="height: 320px; background-image: url('{{ $photo->photo_path }}'); background-position: center; background-size: cover;">
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <hr class="my-4">
        </div>
    </section>

@endsection

@push('scripts')
@endpush
