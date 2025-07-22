<div class="panel shadow-sm">
    <div class="panel-body">
        <div class="row">
			<div class="col-md-6">
                <div class="form-group">
                    <label>Judul :</label>
                    {{  $data->judul }}
                </div>
            </div>
			<div class="col-md-12">
                <div class="form-group">
                    <label>Deskripsi :</label>
                    {{  $data->deskripsi }}
                </div>
            </div>
			<div class="col-md-12">
                <div class="form-group">
                    <label>File Pendukung :</label>
					@php
						$file = $data->file ?? null;
						$filePath = $file->data['target'] ?? null;
						$fileName = $file->data['name'] ?? 'file';
						$disk = $file->data['disk'] ?? 'public';

						$fileUrl = $filePath ? Storage::disk($disk)->url($filePath) : '#';
						$fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
					@endphp

					@if(!is_null($data->file))
                            @if($data->file->exists())
                                <div class="form-group text-center">
									@if($data->file->type == 'image')
										<img src="{!! url($data->file->link_stream) !!}" alt="{!! $data->file->name !!}" style="width: 30%; height: auto;" />
									@elseif ($data->file->type == 'file')
										<img src="{{ url($data->file->link_stream) }}" type="pdf" width="50%" height="300px" />
										<p class="mt-2 text-muted"><small>Jika PDF tidak tampil, silahkan diunduh.</small></p>
									@endif

									<div class="mt-3">
										<a href="{{ $file->link_download }}" class="btn btn-primary" download="{{ $fileName }}">
											<i class="fa fa-download"></i> Unduh File
										</a>
									</div>
                                </div>
                            @endif
            		@endif
                </div>
            </div>
            {{-- Jika ingin menampilkan column Tampilan di show --}}
            {{-- <div class="col-md-6">
                <div class="form-group">
                    <label>Status Publikasi :</label>
                    {!! $data->tampilkan ? "<span class='badge badge-success'>Ditampilkan</span>" : "<span class='badge badge-danger'>Tidak Ditampilkan</span>" !!}
                </div>
            </div> --}}
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
