@extends('layouts.app')
@section('content')
<style>
.instansi-header-bg {
  background: linear-gradient(135deg, #e4ebffff 0%, #002affff 100%)f5;
  padding: 60px 0 32px 0;linear-gradient(135deg, #e4ebffff 0%, #002affff 100%)
  margin-bottom: 0;
  text-align: center;
}
.instansi-header-title {
  font-size: 2.4rem;
  font-weight: 700;
  color: #232323;
  letter-spacing: 2px;
  margin: 0;
  line-height: 1.1;
}
.instansi-card {
  background: #fcfcfd;
  border-radius: 12px;
  box-shadow: 0 2px 12px rgba(0,0,0,0.06);
  padding: 32px 18px 24px 18px;
  margin-bottom: 32px;
  border: 1.5px solid #f3f3f3;
  font-size: 1.08rem;
  color: #222;
  line-height: 1.7;
}
.instansi-section-title {
  font-size: 2.2rem;
  font-weight: 800;
  color: #0d6efd;
  letter-spacing: 2px;
  margin-bottom: 32px;
  text-shadow: 1px 1px 0 #fff;
}
.instansi-empty {
  color: #888;
  font-size: 1.1rem;
  text-align: center;
  margin: 32px 0;
}
</style>
<div class="instansi-header-bg">
  <div class="instansi-header-title">PROFIL INSTANSI</div>
</div>
<section class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <div class="instansi-card">
        @if(isset($profileInstansi) && is_object($profileInstansi))
          <div class="mb-4">
            <h4>Kata Pengantar</h4>
            <p>{!! nl2br(e(!empty(trim($profileInstansi->kata_pengantar ?? '')) ? $profileInstansi->kata_pengantar : '-')) !!}</p>
          </div>
          <div class="mb-4">
            <h4>Sejarah Singkat</h4>
            <p>{!! nl2br(e(!empty(trim($profileInstansi->sejarah_singkat ?? '')) ? $profileInstansi->sejarah_singkat : '-')) !!}</p>
          </div>
          <div class="mb-4">
            <h4>Visi & Misi</h4>
            <p>{!! nl2br(e(!empty(trim($profileInstansi->visi_misi ?? '')) ? $profileInstansi->visi_misi : '-')) !!}</p>
          </div>
          <div class="mb-4">
            <h4>Tugas dan Fungsi</h4>
            <p>{!! nl2br(e(!empty(trim($profileInstansi->tugas_fungsi ?? '')) ? $profileInstansi->tugas_fungsi : '-')) !!}</p>
          </div>
          @if(isset($profileInstansi->file) && is_object($profileInstansi->file) && isset($profileInstansi->file->link_stream))
            <div class="mb-4">
              <h4>Struktur Organisasi</h4>
              <img src="{{ $profileInstansi->file->link_stream }}" alt="Struktur Organisasi" class="img-fluid" style="border-radius:12px;box-shadow:0 4px 16px rgba(0,0,0,0.1);">
            </div>
          @endif
        @else
          <div class="instansi-empty">Belum ada data profil instansi.</div>
        @endif
      </div>
    </div>
  </div>
</section>
@endsection