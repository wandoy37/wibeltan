@extends('dashboard.layouts.app')

@section('title', 'Tambah Materi')

@push('style')
    <script src="{{ asset('tinymce/js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
@endpush

@section('content')
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Tambah Materi</h3>
            </div>
            <div class="ms-md-auto py-2 py-md-0">
                <a href="{{ route('materi.index') }}" class="btn btn-label-info btn-round me-2">
                    Kembali
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                @include('dashboard.layouts.alert')
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('materi.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Materi</label>
                                <input type="text" name="nama"
                                    class="form-control form-control @error('nama') is-invalid @enderror"
                                    value="{{ old('nama') }}" />
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Volume</label>
                                        <input type="text" name="volume"
                                            class="form-control form-control @error('volume') is-invalid @enderror"
                                            value="{{ old('volume') }}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Satuan</label>
                                        <input type="text" name="satuan"
                                            class="form-control form-control @error('satuan') is-invalid @enderror"
                                            value="{{ old('satuan') }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="text" name="harga"
                                    class="form-control form-control @error('harga') is-invalid @enderror"
                                    value="{{ old('harga') }}" />
                            </div>
                            <div class="form-group">
                                <label>Kategori Materi</label>
                                <select class="form-select form-control @error('kategori') is-invalid @enderror"
                                    name="kategori">
                                    <option value="">- Kategori Materi -</option>
                                    <option value="bawaan" {{ old('kategori') == 'bawaan' ? 'selected' : '' }}>Bawaan
                                    </option>
                                    <option value="pilihan" {{ old('kategori') == 'pilihan' ? 'selected' : '' }}>Pilihan
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Thumbnail</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a id="lfm" data-input="thumbnail" data-preview="holder"
                                            class="btn btn-primary">
                                            <i class="fa fa-picture-o"></i> Choose
                                        </a>
                                    </span>
                                    <input id="thumbnail" class="form-control" type="text" name="thumbnail">
                                </div>
                                <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold text-gray-900">Konten</label>
                                @error('konten')
                                    <span class="text-danger font-italic">
                                        <i class="fas fa-exclamation"></i>
                                        {{ $message }}
                                    </span>
                                @enderror
                                <textarea id="default" name="konten">{{ old('konten') }}</textarea>
                            </div>
                            <div class="form-group">
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
