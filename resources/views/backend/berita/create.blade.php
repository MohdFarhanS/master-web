{{ html()->form('POST', route($page->url.'.store'))->id('form-create-'.$page->code)->acceptsFiles()->class('form form form-horizontal')->open() }}
<div class="panel shadow-sm">
    <div class="panel-body">
        <div class='form-group'>
			{!! html()->label('Judul Berita', 'judul')->class('control-label')->for('judul') !!}
            <span class="text-danger">*</span>
			{!! html()->text('judul')->placeholder('Ketik Disini')->class('form-control')->id('judul')->required() !!}
		</div>
		<div class='form-group'>
			{!! html()->label('Deskripsi Berita', 'deskripsi')->class('control-label')->for('deskripsi') !!}
            <span class="text-danger">*</span>
			{!! html()->textarea('deskripsi')->placeholder('Ketik Disini')->class('form-control')->id('deskripsi')->required() !!}
		</div>
        <div class='form-group'>
            {!! html()->label('Unggah Gambar', 'file')->class('control-label') !!}
            <span class="text-danger">*</span>
            <span class="text-danger">Allowed : jpeg,png,jpg</span><br>
            {!! html()->file('file')->class('form-control')->id('file')->accept('image/jpeg,image/png,image/jpg')->required() !!}
        </div>
		<div class='form-group'>
			{!! html()->label('Tanggal Berita', 'tanggal')->class('control-label')->for('tanggal') !!}
            <span class="text-danger">*</span>
			{!! html()->date('tanggal')->class('form-control')->id('tanggal')->required() !!}
		</div>
    </div>
</div>
{!! html()->hidden('table-id','datatable')->id('table-id') !!}
{!! html()->hidden('user_id', Auth::user()->id)->id('user_id') !!}
{{-- {!! html()->hidden('function','loadMenu,sidebarMenu')->id('function') !!} --}}
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
