@extends('home.layouts.app')

@section('title', 'Publikasi')

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
                @foreach ($pemohons as $pemohon)
                    @php
                        $photos = \App\Models\Photo::where('pemohon_id', $pemohon->id)->get();
                        $thumbnail = $photos->first();
                    @endphp
                    <div class="col-md-4 my-2">
                        <div style="box-shadow: 0 0 20px #ddd;">
                            <div class="position-relative"
                                style="height: 320px; background-image: url('{{ optional($thumbnail)->photo_path ?: 'http://wibeltan.test/storage/photos/1/1344080-landscape-green-color-environment-growth-plant 1.png' }}'); background-position: center; background-size: cover;">
                                <div class="position-absolute px-3 py-4 materi-description"
                                    style="right: 0; bottom: 0; left: 0;">
                                    <h3 class="h6">
                                        <a href="{{ route('publikasis.show', $pemohon->id) }}"
                                            class="text-white text-decoration-none text-capitalize"
                                            style="line-height: 1.6; font-weight:700;">{{ $pemohon->asal }}</a>
                                    </h3>
                                    <div class="mt-2">
                                        <small class="mt-1 text-white fst-italic">
                                            <i class="fa-solid fa-sack-dollar"></i>
                                            {{ $pemohon->tanggal_pelaksanaan }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <hr class="my-4">
        </div>
    </section>

@endsection

@push('scripts')
@endpush
