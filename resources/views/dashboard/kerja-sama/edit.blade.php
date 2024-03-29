@extends('dashboard.layouts.app')

@section('title')
Edit Kerja Sama
@endsection

@section('extra-css')
<script src="https://cdn.tiny.cloud/1/mgnx3lcm1bg1v85bmqfw3ogmz9vjtdxolbcs3pmx800uia9e/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<style>
    .error-input {
        color: #d44950;
    }

    .imagePreview {
        width: 100%;
        height: 180px;
        background-position: center center;
        background: url(http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg);
        background-color: #fff;
        background-size: cover;
        background-repeat: no-repeat;
        display: inline-block;
        box-shadow: 0px -3px 6px 2px rgba(0, 0, 0, 0.2);
    }

    .btn-primary {
        display: block;
        border-radius: 0px;
        box-shadow: 0px 4px 6px 2px rgba(0, 0, 0, 0.2);
        margin-top: -5px;
    }

    .imgUp {
        margin-bottom: 15px;
    }

    .del {
        position: absolute;
        top: 0px;
        right: 15px;
        width: 30px;
        height: 30px;
        text-align: center;
        line-height: 30px;
        background-color: rgba(255, 255, 255, 0.6);
        cursor: pointer;
    }

    .imgAdd {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background-color: #4bd7ef;
        color: #fff;
        box-shadow: 0px 0px 2px 1px rgba(0, 0, 0, 0.2);
        text-align: center;
        line-height: 30px;
        margin-top: 0px;
        cursor: pointer;
        font-size: 15px;
    }

    .fileAdd {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background-color: #4bd7ef;
        color: #fff;
        box-shadow: 0px 0px 2px 1px rgba(0, 0, 0, 0.2);
        text-align: center;
        line-height: 30px;
        margin-top: 0px;
        cursor: pointer;
        font-size: 15px;
    }

    .fileDel {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background-color: #d44950;
        color: #fff;
        box-shadow: 0px 0px 2px 1px rgba(0, 0, 0, 0.2);
        text-align: center;
        line-height: 30px;
        margin-top: 0px;
        cursor: pointer;
        font-size: 15px;
    }
</style>
@endsection

@section('content')

<form action="{{ route('dashboard.kerja_sama.update', $kerja_sama->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Foto</h6>
                </div>
                <div class="card-body">
                    <div id="imageWrapper" class="row">
                        @foreach($kerja_sama->getMedia('kerja-sama') as $image)
                        <div class="col-sm-4">
                            <img src="{{ $image->getUrl('thumb') }}" alt="" class="img-fluid" />
                        </div>
                        @endforeach
                        <button id="changeImage" class="btn btn-primary mt-3 h-25" type="button">
                            <span class="text">Ubah Gambar</span>
                        </button>
                    </div>
                    <div id="changeImageWrapper" class="row" hidden disabled>
                        <div class="col-sm-4 imgUp">
                            <div class="imagePreview"></div>
                            <label class="btn btn-primary">
                                Upload<input type="file" class="uploadFile img" name="images[]" value="Upload Photo" accept=".png, .jpg, .jpeg" style="width: 0px;height: 0px;overflow: hidden;" />
                            </label>
                        </div>
                        <i class="fa fa-plus imgAdd"></i>
                    </div>
                </div>
            </div>

            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Kerja Sama</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" value="{{ old('name', $kerja_sama->name) }}" />
                        @error('name')
                        <small class="form-text error-input">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Bar Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Deskripsi</h6>
                </div>
                <div class="card-body">
                    <textarea id="content-kerja_sama" name="description">{{ old('description', $kerja_sama->description) }}</textarea>
                    @error('description')
                    <small class="form-text error-input">{{ $message }}</small>
                    @enderror
                </div>
            </div>

        </div>

        <!-- Donut Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span>{{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}</span>
                        <button type="submit" class="btn btn-primary btn-icon-split">
                            <span class="text">Update</span>
                        </button>
                        <a href="" class="btn btn-warning" onclick="location.href = document.referrer; return false;">
                            Kembali
                        </a>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Dokumen Kerjasama</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <!-- <div class="row">
                        <div class="input-group control-group increment">
                            <div class="col-md-8">
                                <input type="file" class="form-control-file" name="files[]" accept=".jpep, .jpg, .png, .word, .wordx, .ppt., .pptx, .pdf">
                            </div>
                            <i class="fa fa-plus fileAdd"></i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="clone hide">
                            <div class="control-group input-group" style="margin-top: 10px;">
                                <div class="col-md-8">
                                    <input type="file" class="form-control-file" name="files[]" accept=".jpep, .jpg, .png, .word, .wordx, .ppt., .pptx, .pdf">
                                </div>
                                <i class="fa fa-times fileDel"></i>
                            </div>
                        </div>
                    </div> -->
                    <div id="fileDokumen">
                        @foreach($dokumens as $dokumen)
                        <div class="row mb-4">
                            <input type="hidden" name="id_dokumen[]" value="{{ $dokumen->id }}">
                            <div class="col-lg-12">
                                <input type="text" class="form-control" name="names[]" value="{{ $dokumen->name }}">
                            </div>
                            <div class="col-lg-6" style="margin-top: 10pt;">
                                <a href="https://docs.google.com/viewer?url={{$dokumen->link_file}}&embedded=true" class="btn btn-info btn-sm" target="_blank">File</a>
                            </div>
                            <div class="col-lg-6" style="margin-top: 10pt;">
                                <a href="#" class="btn btn-danger btn-circle btn-sm remove-kerja_sama" data-toggle="modal" data-target="#deleteModal" data-href="{{ route('dashboard.kerja_sama.destroyDokumen', $dokumen->id)}}">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                            <div class="col-lg-12" style="margin-top: 10px;">
                                <input type="file" class="form-control-file" name="files[]" accept=".jpep, .jpg, .png, .doc, .docx, .ppt., .pptx, .pdf">
                                <input type="hidden" name="old_link_file[]" value="{{ $dokumen->link_file }}" />
                            </div>
                        </div>
                        @endforeach
                        <button class="btn btn-primary btn-sm" id="btnEdit" type="button">Tambah File</button>
                    </div>
                    <div class="row" id="editFile" hidden disabled>
                        <div class="col-lg-10">
                            <strong>Nama File</strong>
                            <input type="text" class="form-control" name="addNames[]">
                            <br>
                            <input type="file" class="form-control-file" name="addFiles[]" accept=".jpep, .jpg, .png, .doc, .docx, .ppt., .pptx, .pdf">
                        </div>
                        <i class="fa fa-plus fileAdd"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Delete Modal-->
@include('dashboard.kerja-sama.includes.modal-delete')
@endsection


@section('extra-js')
<script>
    var useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
    tinymce.init({
        selector: 'textarea#content-kerja_sama',
        plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
        imagetools_cors_hosts: ['picsum.photos'],
        menubar: 'file edit view insert format tools table help',
        toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
        toolbar_sticky: true,
        autosave_ask_before_unload: true,
        autosave_interval: '30s',
        autosave_prefix: '{path}{query}-{id}-',
        autosave_restore_when_empty: false,
        autosave_retention: '2m',
        image_advtab: true,
        link_list: [{
                title: 'My page 1',
                value: 'https://www.tiny.cloud'
            },
            {
                title: 'My page 2',
                value: 'http://www.moxiecode.com'
            }
        ],
        image_list: [{
                title: 'My page 1',
                value: 'https://www.tiny.cloud'
            },
            {
                title: 'My page 2',
                value: 'http://www.moxiecode.com'
            }
        ],
        image_class_list: [{
                title: 'None',
                value: ''
            },
            {
                title: 'Some class',
                value: 'class-name'
            }
        ],
        importcss_append: true,
        file_picker_callback: function(callback, value, meta) {
            /* Provide file and text for the link dialog */
            if (meta.filetype === 'file') {
                callback('https://www.google.com/logos/google.jpg', {
                    text: 'My text'
                });
            }

            /* Provide image and alt text for the image dialog */
            if (meta.filetype === 'image') {
                callback('https://www.google.com/logos/google.jpg', {
                    alt: 'My alt text'
                });
            }

            /* Provide alternative source and posted for the media dialog */
            if (meta.filetype === 'media') {
                callback('movie.mp4', {
                    source2: 'alt.ogg',
                    poster: 'https://www.google.com/logos/google.jpg'
                });
            }
        },
        templates: [{
                title: 'New Table',
                description: 'creates a new table',
                content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>'
            },
            {
                title: 'Starting my story',
                description: 'A cure for writers block',
                content: 'Once upon a time...'
            },
            {
                title: 'New list with dates',
                description: 'New List with dates',
                content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>'
            }
        ],
        template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
        template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
        height: 300,
        image_caption: true,
        quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
        noneditable_noneditable_class: 'mceNonEditable',
        toolbar_mode: 'sliding',
        contextmenu: 'link image imagetools table',
        skin: useDarkMode ? 'oxide-dark' : 'oxide',
        content_css: useDarkMode ? 'dark' : 'default',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });

    $('#changeImage').click(function() {
        $('#changeImageWrapper').removeAttr('hidden');
        $('#changeImageWrapper').prop('disabled', true);
        $('#imageWrapper').hide();
    });

    $(".imgAdd").click(function() {
        $(this).closest(".row").find('.imgAdd').before(`
            <div class="col-sm-4 imgUp">
                <div class="imagePreview"></div>
                <label class="btn btn-primary">Upload
                    <input type="file" class="uploadFile img" name="images[]" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;" accept=".png, .jpg, .jpeg"/>
                </label>
                <i class="fa fa-times del"></i>
            </div>
        `);
    });

    $(document).on("click", "i.del", function() {
        $(this).parent().remove();
    });

    $(".fileAdd").click(function() {
        $(this).closest(".row").find('.fileAdd').before(`
        <div class="clone d-flex align-items-center mb-3">
            <div class="col-lg-10" style="margin-top: 10px;">
            <strong>Nama File</strong>
                            <input type="text" class="form-control" name="addNames[]">
                            <br>
                            <input type="file" class="form-control-file" name="addFiles[]" accept=".jpep, .jpg, .png, .doc, .docx, .ppt., .pptx, .pdf">
            </div>
            <i class="fa fa-times fileDel"></i> &nbsp
        </div>
        `);
    });

    $(document).on("click", "i.fileDel", function() {
        $(this).parent().remove();
    });

    $(function() {
        $(document).on("change", ".uploadFile", function() {
            var uploadFile = $(this);
            var files = !!this.files ? this.files : [];
            if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

            if (/^image/.test(files[0].type)) { // only image file
                var reader = new FileReader(); // instance of the FileReader
                reader.readAsDataURL(files[0]); // read the local file

                reader.onloadend = function() { // set image data as background of div
                    //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
                    uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url(" + this.result + ")");
                }
            }
        });
    });

    $('#btnEdit').click(function() {
        $('#editFile').removeAttr('hidden');
        $('#editFile').prop('disabled', true);
        $('#btnEdit').hide();
    });

    $('.remove-kerja_sama').click(function() {
        const hrefRemove = $(this).data('href');
        $('#remove-kerja_sama').attr('action', hrefRemove);
    });
</script>
@endsection