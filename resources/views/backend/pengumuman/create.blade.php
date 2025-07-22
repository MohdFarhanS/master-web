{{ html()->form('POST', route($page->url.'.store'))->id('form-create-'.$page->code)->acceptsFiles()->class('form form form-horizontal')->open() }}
<div class="panel shadow-sm">
    <div class="panel-body">
        <div class='form-group'>
			{!! html()->label('Judul')->class('control-label')->for('judul') !!}
            <span class="text-danger">*</span>
			{!! html()->text('judul')->placeholder('Ketik Disini')->class('form-control')->id('judul')->required() !!}
		</div>
		<div class='form-group'>
			{!! html()->label('Deskripsi', 'deskripsi')->class('control-label')->for('deskripsi') !!}
            <span class="text-danger">*</span>
			{!! html()->textarea('deskripsi')->placeholder('Ketik Disini')->class('form-control')->id('deskripsi')->required() !!}
		</div>
        <div class='form-group'>
            {!! html()->label('File Pendukung','file')->class('control-label') !!}
            <span class="text-danger">*</span>
            <div class="file-loading">
                {!! html()->file('file')->id('file')->class('form-control') !!}
            </div>
            <span class="text-danger">Allowed : jpeg,png,jpg,pdf</span>
        </div>
        <div class='form-group'>
            {!! html()->hidden('tampilkan', 0) !!} 
            {!! html()->checkbox('tampilkan',false,1)->id('md_checkbox')->class('filled-in chk-col-primary') !!}
            {!! html()->label('Tampilkan Pengumuman','md_checkbox')->class('control-label') !!}
            <span class="text-danger">*</span>
        </div>
    </div>
</div>
{!! html()->hidden('table-id','datatable')->id('table-id') !!}
{{--{!! html()->hidden('function','loadMenu,sidebarMenu')->id('function') !!}--}}
{{--{!! html()->hidden('redirect',url('/dashboard'))->id('redirect') !!}--}}
{!! html()->form()->close() !!}
<style>
    .kv-file-upload, .fileinput-upload, .file-upload-indicator {
        display: none;
    }

    .select2-container {
        z-index: 9999 !important;
        width: 100% !important;
    }

    .modal-lg {
        max-width: 1000px !important;
    }
</style>
<script src="{{ url($template.'/fileupload/js/fileinput.js') }}"></script>
<script>
    $('.select2').select2();
    $('.modal-title').html('<i class="fa fa-plus-circle"></i> Tambah Data {!! $page->title !!}');
    $('.submit-data').html('<i class="fa fa-save"></i> Simpan Data');

    $(".file-drag-drop").fileinput({
        theme: 'fa',
        uploadUrl: "/#",
        showUpload: false,
        showRemove: false,
        showCancel: false,
        showClose: false,
        allowedFileExtensions: ['jpg', 'jpeg', 'png', 'pdf'],
        overwriteInitial: true,
        maxFileSize: 2048,
        maxFilesNum: 10,
        slugCallback: function (filename) {
            return filename.replace('(', '_').replace(']', '_');
        },
        initialPreviewAsData: true,
    });
</script>
