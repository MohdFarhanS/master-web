<div class="panel shadow-sm">
    <div class="panel-body">
        <div class="row">
			<div class="col-md-12">
                <div class="form-group">
                    <label>Nama Kegiatan :</label>
                    {{  $data->judul }}
                </div>
            </div>
            <div class="form-group">
                <label>Foto Banner</label>
                @if(isset($data->file) && $data->file->isNotEmpty())
                    <div class="row">
                        @foreach ($data->file as $file)
                            @if($file->exists() && $file->type == 'image')
                                <div class="col-md-4 mb-3">
                                    <div class="card p-2 text-center">
                                        <img src="{!! url($file->link_stream) !!}" 
                                             alt="{!! $file->name !!}" 
                                             style="width: 100%; height: auto;" />
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @else
                    <div class="text-muted mt-2">
                        <p>Tidak ada banner yang ditautkan.</p>
                    </div>
                @endif
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Status Publikasi :</label>
                    {!! $data->tampilkan ? "<span class='badge badge-success'>Ditampilkan</span>" : "<span class='badge badge-danger'>Tidak Ditampilkan</span>" !!}
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
