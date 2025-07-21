<div class="panel shadow-sm">
    <div class="panel-body">
        <div class="row">
			<div class="col-md-12">
                <div class="form-group">
                    <label>Alamat :</label>
                    {{  $data->alamat }}
                </div>
            </div>
			<div class="col-md-6">
                <div class="form-group">
                    <label>Telepon :</label>
                    {{  $data->telp }}
                </div>
            </div>
			<div class="col-md-6">
                <div class="form-group">
                    <label>Email :</label>
                    {{  $data->email }}
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
