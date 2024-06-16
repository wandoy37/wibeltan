@extends('dashboard.layouts.app')

@section('title', 'Upload Foto')

@push('style')
    <script src="{{ asset('tinymce/js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
@endpush

@section('content')
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Upload Foto</h3>
            </div>
            <div class="ms-md-auto py-2 py-md-0">
                <a href="{{ route('publikasi.index') }}" class="btn btn-label-info btn-round me-2">
                    Kembali
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                @include('dashboard.layouts.alert')
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('tambah.photo', $pemohon->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Asal Sekolah/Intansi/Organisasi/Kelompok</label>
                                <input type="text" class="form-control form-control" disabled
                                    value="{{ $pemohon->asal }}" />
                                <input type="text" name="pemohon_id" disabled hidden value="{{ $pemohon->id }}">
                            </div>
                            <div class="form-group">
                                <label>Photo</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a id="lfm" data-input="photo_path" data-preview="holder"
                                            class="btn btn-primary">
                                            <i class="fa fa-picture-o"></i> Choose
                                        </a>
                                    </span>
                                    <input id="photo_path" class="form-control @error('photo_path') is-invalid @enderror"
                                        type="text" name="photo_path" value="{{ old('photo_path') }}">
                                </div>
                                <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                            </div>
                            <div class="form-group float-end">
                                <button type="submit" class="btn btn-primary btn-round">
                                    <i class="far fa-save"></i>
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Photos</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($photos as $photo)
                                <div class="col-md-4">
                                    <div class="text-center">
                                        <div class="position-relative"
                                            style="height: 320px; background-image: url('{{ $photo->photo_path }}'); background-position: center; background-size: cover;">
                                        </div>
                                        <form action="{{ route('photos.destroy', $photo->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-danger" type="button">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script>
        $('#lfm').filemanager('image');
    </script>

    <script>
        tinymce.init({
            selector: 'textarea#default',
            extended_valid_elements: 'img[class=img-fluid|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name]',
            promotion: false,
            plugins: [
                'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
                'searchreplace', 'wordcount', 'visualblocks', 'visualchars', 'code', 'fullscreen',
                'insertdatetime',
                'media', 'table', 'emoticons', 'help'
            ],
            toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media | forecolor backcolor emoticons',
        });

        // Event Stand alone filemanager
        $('#lfm').filemanager('image');

        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
@endpush
