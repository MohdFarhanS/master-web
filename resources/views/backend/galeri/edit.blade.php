{!! html()->modelForm($data,'PUT', route($page->url.'.update', $data->id))->id('form-create-'.$page->code)->acceptsFiles()->class('form form form-horizontal')->open() !!}
<div class="panel shadow-sm">
    <div class="panel-body">
        <div class='form-group'>
			{!! html()->label()->class('control-label')->for('nama_kegiatan')->text('Nama Kegiatan') !!}
			{!! html()->text('nama_kegiatan',$data->nama_kegiatan)->placeholder('Type Nama Kegiatan here')->class('form-control')->id('nama_kegiatan') !!}
		</div>
         @if(!$data->file->isEmpty())
            <div class="form-group">
                <label class="control-label">Foto Saat Ini :</label>
                <table class="table">
                    @foreach($data->file as $file)
                        <tr id="{{ $file->id }}">
                            <td>
                                <a href="{{ $file->link_stream }}" target="_blank">{{ $file->file_name }}</a>
                            </td>
                            <td>
                                <a href="#delete" class="btn btn-danger btn-xs delete-file" data-title="Delete" data-id="{{ $file->id }}" data-url="{{ $file->link_delete }}" data-message="Do you want to delete this data ?">
                                    <span class="fa fa-trash"></span> Delete File
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        @endif
    </div>
</div>
{!! html()->hidden('table-id','datatable')->id('table-id') !!}
{{--{!! html()->hidden('function','loadMenu,sidebarMenu')->id('function') !!}--}}
{{--{!! html()->hidden('redirect',url('/dashboard'))->id('redirect') !!}--}}
{!! html()->closeModelForm() !!}
<link href="{{ url($template.'/fileupload/css/fileinput.css') }}" rel="stylesheet">
<link href="{{ url($template.'/fileupload/css/font_bootstrap-icons.min.css') }}" rel="stylesheet">
<style>
    .select2-container {
        z-index: 9999 !important;
        width: 100% !important;
    }

    .modal-lg {
        max-width: 1000px !important;
    }
</style>
<script src="{{ url($template.'/fileupload/js/fileinput.js') }}"></script>
<script>
    $('.select2').select2();
    $('.modal-title').html('<i class="fa fa-edit"></i> Edit Data {!! $page->title !!}');
    $('.submit-data').html('<i class="fa fa-save"></i> Simpan Data');

     $(".file-drag-drop").fileinput({
        theme: 'fa',
        uploadUrl: "/#",
        allowedFileExtensions: ['jpg', 'jpeg', 'png'],
        overwriteInitial: false,
        maxFileSize: 2048,
        maxFilesNum: 10,
        slugCallback: function (filename) {
            return filename.replace('(', '_').replace(']', '_');
        },
        initialPreviewAsData: true,
    });
</script>