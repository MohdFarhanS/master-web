@extends('layouts.app')
@section('content')
<section class="container py-5">
  <h2 class="section-title text-center mb-5" style="font-weight:700;letter-spacing:2px;">PROFIL INSTANSI</h2>
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <div class="p-4 mb-4 bg-white shadow-sm rounded">
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
            <h4>Visi&Misi</h4>
            <p>{!! nl2br(e(trim($profileInstansi->sejarah_singkat) !== '' ? $profileInstansi->sejarah_singkat : '-')) !!}</p>
          </div>
          <div class="mb-4">
            <h4>Tugas dan Fungsi</h4>
            <p>{!! nl2br(e(trim($profileInstansi->tugas_fungsi) !== '' ? $profileInstansi->tugas_fungsi : '-')) !!}</p>
          </div>
        @else
          <div class="text-muted">Belum ada data profil instansi.</div>
        @endif
      </div>
    </div>
  </div>
</section>
@endsection