<div class="panel shadow-sm">
    <div class="panel-body">
        <div class="row">
			<div class="col-md-6">
                <div class="form-group">
                    <label>Nama Pimpinan :</label>
                    {{  $data->nama  }}
                </div>
            </div>
            <div>
				<label>Foto Pimpinan</label>
                    @if(!is_null($data->file))
                            @if($data->file->exists())
                                <div class="form-group text-center">
                                    @if($data->file->type == 'image')
                                        <img src="{!! url($data->file->link_stream) !!}" alt="{!! $data->file->name !!}" style="width: 30%; height: auto;" />
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
