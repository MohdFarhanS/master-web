{!! html()->modelForm($data,'PUT', route($page->url.'.update', $data->id))->id('form-create-'.$page->code)->acceptsFiles()->class('form form form-horizontal')->open() !!}
<div class="panel shadow-sm">
    <div class="panel-body">
        <div class='form-group'>
			{!! html()->label()->class('control-label')->for('alamat')->text('Alamat') !!}
			{!! html()->text('alamat',$data->alamat)->placeholder('Type Alamat here')->class('form-control')->id('alamat') !!}
		</div>
		<div class='form-group'>
			{!! html()->label()->class('control-label')->for('telp')->text('Telp') !!}
			{!! html()->number('telp',$data->telp)->placeholder('Type Telp here')->class('form-control')->id('telp') !!}
		</div>
		<div class='form-group'>
			{!! html()->label()->class('control-label')->for('email')->text('Email') !!}
			{!! html()->email('email',$data->email)->class('form-control')->id('email') !!}
		</div>
    </div>
</div>
{!! html()->hidden('table-id','datatable')->id('table-id') !!}
{{--{!! html()->hidden('function','loadMenu,sidebarMenu')->id('function') !!}--}}
{{--{!! html()->hidden('redirect',url('/dashboard'))->id('redirect') !!}--}}
{!! html()->closeModelForm() !!}
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
    $('.modal-title').html('<i class="fa fa-edit"></i> Edit Data {!! $page->title !!}');
    $('.submit-data').html('<i class="fa fa-save"></i> Simpan Data');
</script>