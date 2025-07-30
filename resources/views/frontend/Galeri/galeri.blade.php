@extends('layouts.app')
@section('content')
<style>
.galeri-header-bg {
  background: #fdf4f5;
  padding: 60px 0 32px 0;
  margin-bottom: 0;
  text-align: center;
}
.galeri-header-title {
  font-size: 2.4rem;
  font-weight: 700;
  color: #232323;
  letter-spacing: 2px;
  margin: 0;
  line-height: 1.1;
}
.galeri-img-card {
  background: #fff;
  border-radius: 16px;
  box-shadow: 0 2px 12px rgba(0,0,0,0.07);
  padding: 16px 12px 12px 12px;
  margin-bottom: 24px;
  border: 1.5px solid #f3f3f3;
  text-align: center;
  transition: box-shadow 0.2s;
}
.galeri-img-card:hover {
  box-shadow: 0 6px 24px rgba(0,0,0,0.13);
}
.galeri-img {
  width: 100%;
  height: 200px;
  object-fit: cover;
  border-radius: 10px;
  background: #fff;
  box-shadow: 0 2px 12px rgba(33,150,243,0.10);
  border: 1.5px solid #e0e0e0;
}
.galeri-caption {
  color: #555;
  font-size: 1rem;
  margin-top: 8px;
}
.galeri-empty {
  color: #888;
  font-size: 1.1rem;
  text-align: center;
  margin: 32px 0;
}
</style>
<div class="galeri-header-bg">
  <div class="galeri-header-title">GALERI</div>
</div>
<section class="container py-5">
  <div class="row">
    @forelse($galeri ?? [] as $foto)
      @if(is_object($foto) && isset($foto->file) && is_object($foto->file) && isset($foto->file->link_stream))
        <div class="col-md-3 col-sm-6 mb-3">
          <div class="galeri-img-card">
            <img src="{{ $foto->file->link_stream }}" class="galeri-img" alt="Foto Galeri">
            @if(!empty($foto->caption))
              <div class="galeri-caption">{{ $foto->caption }}</div>
            @endif
          </div>
        </div>
      @endif
    @empty
      <div class="col-12 galeri-empty">Belum ada foto galeri.</div>
    @endforelse
  </div>
</section>
@endsection