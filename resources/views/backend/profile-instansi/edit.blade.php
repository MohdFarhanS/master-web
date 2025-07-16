{!! html()->modelForm($data,'PUT', route($page->url.'.update', $data->id))->id('form-create-'.$page->code)->acceptsFiles()->class('form form form-horizontal')->open() !!}
<div class="panel shadow-sm">
    <div class="panel-body">
        <div class='form-group'>
			{!! html()->label('Edit Kata Pengantar', 'kata_pengantar')->class('control-label')->for('kata_pengantar') !!}
			{!! html()->text('kata_pengantar',$data->kata_pengantar)->placeholder('Ketik Disini')->class('form-control')->id('kata_pengantar') !!}
		</div>
		<div class='form-group'>
			{!! html()->label('Edit Sejarah Singkat', 'sejarah_singkat')->class('control-label')->for('sejarah_singkat') !!}
			{!! html()->text('sejarah_singkat',$data->sejarah_singkat)->placeholder('Ketik Disini')->class('form-control')->id('sejarah_singkat') !!}
		</div>
		<div class='form-group'>
			{!! html()->label('Edit Visi dan Misi', 'visi_misi')->class('control-label')->for('visi_misi') !!}
			{!! html()->text('visi_misi',$data->visi_misi)->placeholder('Ketik Disini')->class('form-control')->id('visi_misi') !!}
		</div>
		<div class='form-group'>
			{!! html()->label('Edit Tugas dan Fungsi', 'tugas_fungsi')->class('control-label')->for('tugas_fungsi') !!}
			{!! html()->text('tugas_fungsi',$data->tugas_fungsi)->placeholder('Ketik Disini')->class('form-control')->id('tugas_fungsi') !!}
		</div>
        <div class='form-group'>
            {!! html()->label('Unggah Struktur Organisasi')->text('Unggah Struktur Organisasi')->class('control-label') !!}
            <span class="text-danger">Allowed : jpeg,png</span><br>
            {!! html()->file('file')->class('form-control')->id('file')->accept('image/jpeg,image/png') !!}
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
