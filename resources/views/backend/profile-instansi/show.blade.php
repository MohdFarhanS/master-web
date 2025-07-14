<div class="panel shadow-sm">
    <div class="panel-body">
        <div class="row">
			<div class="col-md-6">
				<div class="form-group">
					{!! html()->span()->text("Kata Pengantar")->class("control-label") !!}
					{!! html()->p($data->kata_pengantar)->class("form-control") !!}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! html()->span()->text("Sejarah Singkat")->class("control-label") !!}
					{!! html()->p($data->sejarah_singkat)->class("form-control") !!}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! html()->span()->text("Visi dan Misi")->class("control-label") !!}
					{!! html()->p($data->visi_misi)->class("form-control") !!}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! html()->span()->text("Tugas dan Fungsi")->class("control-label") !!}
					{!! html()->p($data->tugas_fungsi)->class("form-control") !!}
				</div>
			</div>
			<div>
				<label>Struktur Organisasi</label>
                    @if(!is_null($data->file))
                            @if($data->file->exists())
                                <div class="form-group text-center">
									@if($data->file->type == 'image')
										<img src="{!! url($data->file->link_stream) !!}" alt="{!! $data->file->name !!}" style="width: 80%; height: auto;" />
									@endif
                                </div>
                            @endif
            		@endif
			</div>
		</div>
    </div>
</div>
<style>
    .modal-lg {
        max-width: 1000px !important;
    }
</style>
<script>
    $('.submit-data').hide();
    $('.modal-title').html('<i class="fa fa-search"></i> Detail Data {!! $page->title !!}');
</script>
