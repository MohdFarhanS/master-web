<div class="panel shadow-sm">
    <div class="panel-body">
        <div class="row">
			<div class="col-md-6">
				<div class="form-group">
					{!! html()->span()->text("Nama Kegiatan")->class("control-label") !!}
					{!! html()->p($data->nama_kegiatan)->class("form-control") !!}
				</div>
			</div>
              <div class="col-md-12">
                <div class="form-group">
                    <label>File Pendukung :</label>
                     @if(!$data->file->isEmpty())
                        <ul>
                            @foreach($data->file as $file)
                                <li>
                                    <a href="{{  $file->link_download }}" class="fa fa-download"></a> | <a href="{{  $file->link_stream }}" target="_blank" class="fa fa-search"></a> | {{  $file->file_name }}
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <span class="badge badge-danger">Tidak ada file</span>
                    @endif
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
