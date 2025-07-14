{!! html()->modelForm($data,'PUT', route($page->url.'.update', $data->id))->id('form-create-'.$page->code)->acceptsFiles()->class('form form form-horizontal')->open() !!}
<div class="panel shadow-sm">
    <div class="panel-body">
        <div class='form-group'>
			{!! html()->label('Judul Berita', 'judul')->class('control-label')->for('judul')->text('Ubah Judul Berita') !!}
			{!! html()->textarea('judul',$data->judul)->class('form-control')->placeholder('Ketik Disini')->id('judul')->required() !!}
		</div>
		<div class='form-group'>
			{!! html()->label('Deskripsi', 'deskripsi')->class('control-label')->for('deskripsi')->text('Ubah Deskripsi') !!}
			{!! html()->textarea('deskripsi',$data->deskripsi)->class('form-control')->placeholder('Ketik Disini')->id('deskripsi')->required() !!}
		</div>
		<div class='form-group'>
			{!! html()->label()->class('control-label')->for('tanggal')->text('Ubah Tanggal') !!}
			{!! html()->date('tanggal',$data->tanggal)->class('form-control')->id('tanggal')->required() !!}
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