{!! html()->modelForm($data,'PUT', route($page->url.'.update', $data->id))->id('form-create-'.$page->code)->acceptsFiles()->class('form form form-horizontal')->open() !!}
<div class="panel shadow-sm">
    <div class="panel-body">
        <div class='form-group'>
			{!! html()->label('Judul', 'judul')->class('control-label')->for('judul') !!}
			{!! html()->text('judul',$data->judul)->placeholder('Ketik Disini')->class('form-control')->id('judul') !!}
		</div>
		<div class='form-group'>
			{!! html()->label('Deskripsi', 'deskripsi')->class('control-label')->for('deskripsi') !!}
			{!! html()->textarea('deskripsi',$data->deskripsi)->class('form-control')->id('deskripsi') !!}
		</div>
        <div class='form-group'>
            {!! html()->label('Unggah Gambar')->text('Unggah Gambar')->class('control-label') !!}
            <span class="text-danger">Allowed : jpeg,png,jpg,pdf</span><br>
            {!! html()->file('file')->class('form-control')->id('file')->accept('image/jpeg,image/png,image/jpg,.pdf') !!}
        </div>
        <div class='form-group'>
            {!! html()->checkbox('tampilkan',$data->publish,1)->id('md_checkbox')->class('filled-in chk-col-primary') !!}
            {!! html()->label('Tampilkan Pengumuman','md_checkbox')->class('control-label') !!}
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