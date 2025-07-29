@extends('layouts.app')
@section('content')
<section class="container py-5">
  <h2 class="section-title">GALERI</h2>
  <div class="row">
    @forelse($galeri ?? [] as $foto)
      @if(is_object($foto) && isset($foto->file) && is_object($foto->file) && isset($foto->file->link_stream))
        <div class="col-md-3 col-sm-6 mb-3">
          <img src="{{ $foto->file->link_stream }}" class="galeri-img rounded shadow-sm w-100" alt="Foto Galeri">
          @if(!empty($foto->caption))
            <div class="small text-muted mt-1">{{ $foto->caption }}</div>
          @endif
        </div>
      @endif
    @empty
      <div class="col-12 text-muted">Belum ada foto galeri.</div>
    @endforelse
  </div>
</section>
@endsection
