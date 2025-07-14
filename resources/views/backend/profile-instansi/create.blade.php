{{ html()->form('POST', route($page->url.'.store'))->id('form-create-'.$page->code)->acceptsFiles()->class('form form form-horizontal')->open() }}
<div class="panel shadow-sm">
    <div class="panel-body">
        <div class='form-group'>
			{!! html()->label('Kata Pengantar')->class('control-label')->for('kata_pengantar')->text('Kata Pengantar') !!}
            <span class="text-danger">*</span>
			{!! html()->textarea('kata_pengantar')->placeholder('Ketik disini')->class('form-control')->id('kata_pengantar')-> required() !!}
		</div>
		<div class='form-group'>
			{!! html()->label('Sejarah Singkat')->class('control-label')->for('sejarah_singkat')->text('Sejarah Singkat') !!}
            <span class="text-danger">*</span>
			{!! html()->textarea('sejarah_singkat')->placeholder('Ketik Disini')->class('form-control')->id('sejarah_singkat')-> required() !!}
		</div>
		<div class='form-group'>
			{!! html()->label('Visi Misi')->class('control-label')->for('visi_misi')->text('Visi Misi') !!}
            <span class="text-danger">*</span>
			{!! html()->textarea('visi_misi')->placeholder('Ketik Disini')->class('form-control')->id('visi_misi')-> required() !!}
		</div>
		<div class='form-group'>
			{!! html()->label('Tugas dan Fungsi')->class('control-label')->for('tugas_fungsi')->text('Tugas Fungsi') !!}
            <span class="text-danger">*</span>
			{!! html()->textarea('tugas_fungsi')->placeholder('Ketik Disini')->class('form-control')->id('tugas_fungsi')-> required() !!}
		</div>
		<div class='form-group'>
            {!! html()->label('Foto Struktur Organisasi', 'file')->text('Unggah Foto')->class('control-label') !!}
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
