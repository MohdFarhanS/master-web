<div class="panel shadow-sm">
    <div class="panel-body">
        <div class="row">
			<div class="col-md-12">
                <div class="form-group">
                    <label>Judul :</label>
                    {{  $data->judul }}
                </div>
            </div>
			<div class="col-md-12">
                <div class="form-group">
                    <label>Deskripsi Berita :</label>
					<div class="p-10 shadow-sm">
						{{  $data->deskripsi }}
					</div>
                </div>
            </div>
			<div class="col-md-6">
                <div class="form-group">
                    <label>Tanggal Berita :</label>
                    {{  date('d-m-Y', strtotime($data->tanggal)) }}
                </div>
            </div>
            <div>
                <label>Gambar</label>
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
            <div class="col-md-6">
                <div class="form-group">
                    <label>Pembuat Berita :</label>
                    {{  $data->user->name ?? 'N/A' }}
                </div>
            </div>
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
