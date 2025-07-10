{!! html()->modelForm($data,'PUT', route($page->url.'.update', $data->id))->id('form-create-'.$page->code)->acceptsFiles()->class('form form form-horizontal')->open() !!}
<div class="panel shadow-sm">
    <div class="panel-body">
        <div class='form-group'>
			{!! html()->label()->class('control-label')->for('kata_pengantar')->text('Kata Pengantar') !!}
			{!! html()->text('kata_pengantar',$data->kata_pengantar)->placeholder('Type Kata Pengantar here')->class('form-control')->id('kata_pengantar') !!}
		</div>
		<div class='form-group'>
			{!! html()->label()->class('control-label')->for('sejarah_singkat')->text('Sejarah Singkat') !!}
			{!! html()->text('sejarah_singkat',$data->sejarah_singkat)->placeholder('Type Sejarah Singkat here')->class('form-control')->id('sejarah_singkat') !!}
		</div>
		<div class='form-group'>
			{!! html()->label()->class('control-label')->for('visi_misi')->text('Visi Misi') !!}
			{!! html()->text('visi_misi',$data->visi_misi)->placeholder('Type Visi Misi here')->class('form-control')->id('visi_misi') !!}
		</div>
		<div class='form-group'>
			{!! html()->label()->class('control-label')->for('tugas_fungsi')->text('Tugas Fungsi') !!}
			{!! html()->text('tugas_fungsi',$data->tugas_fungsi)->placeholder('Type Tugas Fungsi here')->class('form-control')->id('tugas_fungsi') !!}
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