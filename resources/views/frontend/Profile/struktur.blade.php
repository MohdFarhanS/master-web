@extends('layouts.app')
@section('content')
<style>
.struktur-header-bg {
  background: linear-gradient(135deg, #e4ebffff 0%, #002affff 100%);
  padding: 60px 0 32px 0;
  margin-bottom: 0;
  text-align: center;
}
.struktur-header-title {
  font-size: 2.4rem;
  font-weight: 700;
  color: #232323;
  letter-spacing: 2px;
  margin: 0;
  line-height: 1.1;
}
.struktur-section-title {
  font-size: 2.2rem;
  font-weight: 800;
  color: #0d6efd;
  letter-spacing: 2px;
  margin-bottom: 32px;
  text-shadow: 1px 1px 0 #fff;
}
.struktur-card {
  background: #fff;
  border-radius: 18px;
  box-shadow: 0 4px 24px rgba(0,0,0,0.08);
  padding: 36px 28px 32px 28px;
  margin-bottom: 32px;
  border: 1.5px solid #f3f3f3;
}
.struktur-img {
  display: block;
  margin: 0 auto;
  max-width: 100%;
  max-height: 900px;
  min-height: 320px;
  width: 100%;
  height: auto;
  border-radius: 16px;
  box-shadow: 0 2px 18px rgba(33,150,243,0.13);
  border: 2.5px solid #e0e0e0;
  object-fit: contain;
  background: #f8f8f8;
  transition: box-shadow 0.2s;
}
.struktur-img:hover {
  box-shadow: 0 8px 32px rgba(33,150,243,0.18);
}
.struktur-empty {
  color: #888;
  font-size: 1.1rem;
  text-align: center;
  margin: 32px 0;
}
</style>
<div class="struktur-header-bg">
  <div class="struktur-header-title">STRUKTUR ORGANISASI</div>
</div>
<section class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <div class="struktur-card">
        @if(isset($profileInstansi) && is_object($profileInstansi))
            @if(isset($profileInstansi->file) && is_object($profileInstansi->file) && isset($profileInstansi->file->link_stream))
                <img src="{{ $profileInstansi->file->link_stream }}" alt="Struktur Organisasi" class="struktur-img">
            @elseif(!empty($profileInstansi->struktur_organisasi))
                <img src="{{ $profileInstansi->struktur_organisasi }}" alt="Struktur Organisasi" class="struktur-img">
            @else
                <div class="struktur-empty">Belum ada gambar struktur organisasi.</div>
            @endif
        @else
            <div class="struktur-empty">Belum ada data profil instansi.</div>
        @endif
      </div>
    </div>
  </div>
</section>
@endsection


