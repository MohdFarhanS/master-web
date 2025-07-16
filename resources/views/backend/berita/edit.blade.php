{!! html()->modelForm($data,'PUT', route($page->url.'.update', $data->id))->id('form-create-'.$page->code)->acceptsFiles()->class('form form form-horizontal')->open() !!}
<div class="panel shadow-sm">
    <div class="panel-body">
        <div class='form-group'>
			{!! html()->label('Edit Judul Berita', 'judul')->class('control-label')->for('judul') !!}
			{!! html()->text('judul',$data->judul)->placeholder('Ketik Disini')->class('form-control')->id('judul') !!}
		</div>
		<div class='form-group'>
			{!! html()->label('Edit Deskripsi Berita', 'deskripsi')->class('control-label')->for('deskripsi') !!}
			{!! html()->textarea('deskripsi',$data->deskripsi)->placeholder('Ketik Disini')->class('form-control')->id('deskripsi') !!}
		</div>
		<div class='form-group'>
			{!! html()->label('Edit Tanggal', 'tanggal')->class('control-label')->for('tanggal') !!}
			{!! html()->date('tanggal',$data->tanggal)->class('form-control')->id('tanggal') !!}
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