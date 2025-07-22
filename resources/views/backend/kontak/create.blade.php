{{ html()->form('POST', route($page->url.'.store'))->id('form-create-'.$page->code)->acceptsFiles()->class('form form form-horizontal')->open() }}
<div class="panel shadow-sm">
    <div class="panel-body">
        <div class='form-group'>
			{!! html()->label('Alamat', 'alamat')->class('control-label')->for('alamat') !!}
            <span class="text-danger">*</span>
			{!! html()->text('alamat')->placeholder('Ketik Disini')->class('form-control')->id('alamat')->required() !!}
		</div>
		<div class='form-group'>
			{!! html()->label('Telepon', 'telp')->class('control-label')->for('telp') !!}
            <span class="text-danger">*</span>
			{!! html()->input('number','telp')->placeholder('123456789')->class('form-control')->id('telp')->required() !!}
		</div>
		<div class='form-group'>
			{!! html()->label('Email', 'email')->class('control-label')->for('email') !!}
            <span class="text-danger">*</span>
			{!! html()->email('email')->placeholder('Ketik Disini')->class('form-control')->id('email')->required() !!}
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
