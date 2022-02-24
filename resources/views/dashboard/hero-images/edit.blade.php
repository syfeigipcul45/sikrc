@extends('dashboard.layouts.app')

@section('title')
Edit Hero Images
@endsection

@section('extra-css')
<script src="https://cdn.tiny.cloud/1/mgnx3lcm1bg1v85bmqfw3ogmz9vjtdxolbcs3pmx800uia9e/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<style>
    .error-input {
        color: #d44950;
    }
</style>
@endsection

@section('content')
<form action="{{ route('dashboard.hero_images.update', $hero_image->id) }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-8 col-lg-7">

            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Gambar</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">

                            <strong>Upload Thumbnail</strong>
                            <div class="card my-2">
                                <label for="imageUpload" class="mb-0 cursor-pointer">
                                    @if($hero_image->getFirstMediaUrl('hero-image', 'thumb'))
                                    <img id="image-preview" class="card-img-top" src="{{ $hero_image->getFirstMediaUrl('hero-image', 'thumb')}}" alt="Card image cap">
                                    <input type="hidden" name="media" value="{{ $hero_image->getFirstMediaUrl('hero-image', 'thumb')}}" />
                                    @else
                                    <img id="image-preview" class="card-img-top" src="https://www.pngkey.com/png/detail/233-2332677_image-500580-placeholder-transparent.png" alt="Card image cap">
                                    @endif
                                </label>
                                <input type='file' id="imageUpload" name="url_hero" accept=".png, .jpg, .jpeg" hidden />
                            </div>
                            @error('url_hero')
                            <small class="form-text error-input">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" class="form-control" name="title" value="{{ old('title', $hero_image->title) }}" />
                                @error('title')
                                <small class="form-text error-input">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea class="form-control" name="description">{{ old('description', $hero_image->description) }}</textarea>
                                @error('description')
                                <small class="form-text error-input">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-icon-split float-right">
                        <span class="text">Simpan</span>
                    </button>
                </div>
            </div>

        </div>
    </div>
</form>
@endsection

@section('extra-js')
<script>
    tinymce.init({
        selector: 'textarea#content-news',
        plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        toolbar_mode: 'floating',
        height: "480"
    });

    $('#status').change(function() {
        if ($('#status').is(':checked')) {
            $('#status-value').val(1);
        } else {
            $('#status-value').val(0);
        }
    });

    $("#imageUpload").change(function() {
        readURL(this);
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image-preview').attr('src', e.target.result);
                $('#image-preview').hide();
                $('#image-preview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection