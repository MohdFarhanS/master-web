{{ html()->form('POST', route($page->url.'.store'))->id('form-create-'.$page->code)->acceptsFiles()->class('form form form-horizontal')->open() }}
<div class="panel shadow-sm">
    <div class="panel-body">
        <div class='form-group'>
			{!! html()->label('Nama Instansi', 'nama_instansi')->class('control-label')->for('nama_instansi') !!}
            <span class="text-danger">*</span>
			{!! html()->text('nama_instansi')->placeholder('Ketik Disini')->class('form-control')->id('nama_instansi')->required() !!}
		</div>
        <div class='form-group'>
            {!! html()->label('Unggah Gambar', 'file')->class('control-label') !!}
            <span class="text-danger">Allowed : jpeg,png,jpg</span><br>
            {!! html()->file('file')->class('form-control')->id('file')->accept('image/jpeg,image/png,image/jpg') !!}
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
