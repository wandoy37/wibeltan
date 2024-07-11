@extends('home.layouts.app')

@section('title', 'Survey')

@section('content')

    <section class="my-4" id="survey">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="my-4">Bagaimana Pendapat Saudara Tentang Prosedur Pendaftaran Wisata Belajar
                                Pertanian di
                                UPTD Balai Penyuluhan dan Pengembangan SDM Pertanian?</h5>
                            <form action="{{ route('survey.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Nama</label>
                                    <input type="text" name="nama" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Asal Sekolah/Intansi/Organisasi/Kelompok*</label>
                                    <input type="text" name="asal" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jawaban" value="tidak mudah"
                                            id="tidak_mudah" required>
                                        <label class="form-check-label" for="tidak_mudah">
                                            Tidak Mudah
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jawaban" value="kurang mudah"
                                            id="kurang_mudah" required>
                                        <label class="form-check-label" for="kurang_mudah">
                                            Kurang Mudah
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jawaban" value="mudah"
                                            id="mudah" required>
                                        <label class="form-check-label" for="mudah">
                                            Mudah
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jawaban" value="sangat mudah"
                                            id="sangat_mudah" required>
                                        <label class="form-check-label" for="sangat_mudah">
                                            Sangat Mudah
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Saran & Masukan</label>
                                    <textarea class="form-control" name="saran_masukan" required rows="2"></textarea>
                                </div>
                                <div class="d-grid">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa-solid fa-share-from-square"></i>
                                        Kirim
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr class="my-4">
                </div>
            </div>
        </div>
    </section>
@endsection
