@extends('layouts.app')
@section('content')
<style>
.instansi-header-bg {
  background: #fdf4f5;
  padding: 60px 0 32px 0;
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
  color: #ff7300;
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
            <p>{!! nl2br(e(trim($profileInstansi->kata_pengantar) !== '' ? $profileInstansi->kata_pengantar : '-')) !!}</p>
          </div>
          <div class="mb-4">
            <h4>Sejarah Singkat</h4>
            <p>{!! nl2br(e(trim($profileInstansi->sejarah_singkat) !== '' ? $profileInstansi->sejarah_singkat : '-')) !!}</p>
          </div>
          <div class="mb-4">
            <h4>Visi & Misi</h4>
            <p>{!! nl2br(e(trim($profileInstansi->visi_misi) !== '' ? $profileInstansi->visi_misi : '-')) !!}</p>
          </div>
          <div class="mb-4">
            <h4>Tugas dan Fungsi</h4>
            <p>{!! nl2br(e(trim($profileInstansi->tugas_fungsi) !== '' ? $profileInstansi->tugas_fungsi : '-')) !!}</p>
          </div>
        @else
          <div class="instansi-empty">Belum ada data profil instansi.</div>
        @endif
      </div>
    </div>
  </div>
</section>
@endsection