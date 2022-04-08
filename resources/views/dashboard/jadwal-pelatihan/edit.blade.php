@extends('dashboard.layouts.app')

@section('title')
Edit Jadwal Pelatihan
@endsection

@section('extra-css')
<script src="https://cdn.tiny.cloud/1/mgnx3lcm1bg1v85bmqfw3ogmz9vjtdxolbcs3pmx800uia9e/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<style>
    .error-input {
        color: #d44950;
    }
</style>

<link href="{{ asset('_dashboard/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet" />
<script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script>
<script src="{{ asset('_dashboard/js/bootstrap-material-datetimepicker.js') }}"></script>
@endsection

@section('content')

<form action="{{ route('dashboard.jadwal_pelatihan.update', $jadwal->id) }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-8 col-lg-7">
            @if(session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
            @endif
            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Jadwal Pelatihan</h6>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <strong>Tema Pelatihan</strong>
                        <select name="tema_id" class="form-control js-example-basic-single">
                            <option value="" disabled selected>:: Pilih ::</option>
                            @foreach($tema as $key => $item)
                            <option value="{{ $item->id }}" @if($item->id === $jadwal->tema_id) selected @endif>{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('tema_id')
                        <small class="form-text error-input">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="row mb-4">
                        <strong>Lokasi Pelatihan</strong>
                        <input type="text" class="form-control" name="lokasi_pelatihan" value="{{ old('lokasi_pelatihan', $jadwal->lokasi_pelatihan) }}" />
                        @error('lokasi_pelatihan')
                        <small class="form-text error-input">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="row mb-4">
                        <strong>Tanggal Pelatihan</strong>
                        <input type="date" class="form-control" name="waktu_pelatihan" value="{{ old('waktu_pelatihan', $jadwal->waktu_pelatihan) }}" />
                        @error('waktu_pelatihan')
                        <small class="form-text error-input">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="row mb-4">
                        <strong>Peserta Pelatihan</strong>
                        <textarea class="form-control" rows="3" name="peserta">{{ old('peserta', $jadwal->peserta)}}</textarea>
                        @error('peserta')
                        <small class="form-text error-input">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="row mb-4">
                        <strong>File Undangan</strong>
                        <input type="file" class="form-control-file" name="file_undangan" accept=".pdf">
                        <input type="hidden" class="form-control-file" name="old_file_undangan" value="{{$jadwal->file_undangan}}">
                        <embed type="application/pdf" src="{{$jadwal->file_undangan}}" width="600px" height="400px"></embed>
                        @error('file_undangan')
                        <small class="form-text error-input">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Jam Pelatihan</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Mulai</label>
                        <input type="text" class="form-control" id="jam_mulai" name="jam_mulai" data-dtp="dtp_eFWas" value="{{ old('jam_mulai', $jadwal->jam_mulai) }}" />
                        @error('jam_mulai')
                        <small class="form-text error-input">{{ $message }}</small>
                        @enderror
                        <label>Berakhir</label>
                        <input type="text" class="form-control" id="jam_berakhir" name="jam_berakhir" data-dtp="dtp_eFWas" value="{{ old('jam_berakhir', $jadwal->jam_berakhir) }}" />
                        @error('jam_berakhir')
                        <small class="form-text error-input">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div> -->

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
        </div>
    </div>
</form>
@endsection

@section('extra-js')
<script>
    var useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
    tinymce.init({
        selector: 'textarea#content-tema',
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

    $('#jam_mulai').bootstrapMaterialDatePicker({
        date: false,
        shortTime: false,
        format: 'HH:mm'
    });

    $('#jam_berakhir').bootstrapMaterialDatePicker({
        date: false,
        shortTime: false,
        format: 'HH:mm'
    });
</script>
@endsection