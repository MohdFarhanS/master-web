{{ html()->form('POST', route($page->url.'.store'))->id('form-create-'.$page->code)->acceptsFiles()->class('form form form-horizontal')->open() }}
<div class="panel shadow-sm">
    <div class="panel-body">
        <div class='form-group'>
			{!! html()->label()->class('control-label')->for('judul')->text('Judul') !!}
            <span class="text-danger">*</span>
			{!! html()->text('judul')->placeholder('Ketik Disini')->class('form-control')->id('judul')->required() !!}
		</div>
        <div class='form-group'>
            {!! html()->label('Unggah Gambar', 'file')->text('Unggah Gambar')->class('control-label') !!}
            <span class="text-danger">*</span>
            <span class="text-danger">Allowed : jpeg,png,jpg</span><br>
            {!! html()->file('file')->class('form-control')->id('file')->accept('image/jpeg,image/png,image/jpg')-> required() !!}
        </div>
        <div class='form-group'>
            {!! html()->hidden('tampilkan', 0) !!} 
            {!! html()->checkbox('tampilkan',false,1)->id('md_checkbox')->class('filled-in chk-col-primary') !!}
            {!! html()->label('Tampilkan Banner','md_checkbox')->class('control-label') !!}
            <span class="text-danger">*</span>
        </div>
    </div>
</div>
{!! html()->hidden('table-id','datatable')->id('table-id') !!}
{{--{!! html()->hidden('function','loadMenu,sidebarMenu')->id('function') !!}--}}
{{--{!! html()->hidden('redirect',url('/dashboard'))->id('redirect') !!}--}}
{!! html()->form()->close() !!}
<style>
    .select2-container {
        z-index: 9999 !important;
        width: 100% !important;
    }

    .modal-lg {
        max-width: 1000px !important;
    }
</style>
<script>
    $('.select2').select2();
    $('.modal-title').html('<i class="fa fa-plus-circle"></i> Tambah Data {!! $page->title !!}');
    $('.submit-data').html('<i class="fa fa-save"></i> Simpan Data');
</script>
