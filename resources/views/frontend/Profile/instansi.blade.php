@extends('layouts.app')
@section('content')
<section class="container py-5">
  <h2 class="section-title text-center mb-5" style="font-weight:700;letter-spacing:2px;">PROFIL INSTANSI</h2>
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <div class="p-4 mb-4 bg-white shadow-sm rounded">
        @if(isset($profilInstansi) && is_object($profilInstansi))
          <div class="mb-4">
            <h4>Kata Pengantar</h4>
            <p>{!! nl2br(e($profilInstansi->kata_pengantar ?? '-')) !!}</p>
          </div>
          <div class="mb-4">
            <h4>Sejarah Singkat</h4>
            <p>{!! nl2br(e($profilInstansi->sejarah ?? '-')) !!}</p>
          </div>
          <div class="mb-4">
            <h4>Visi & Misi</h4>
            <p><strong>Visi:</strong> {!! nl2br(e($profilInstansi->visi ?? '-')) !!}</p>
            <p><strong>Misi:</strong></p>
            <ul>
              @if(!empty($profilInstansi->misi))
                @foreach(explode("\n", $profilInstansi->misi) as $misi)
                  <li>{{ $misi }}</li>
                @endforeach
              @else
                <li>-</li>
              @endif
            </ul>
          </div>
          <div class="mb-4">
            <h4>Tugas dan Fungsi</h4>
            <p>{!! nl2br(e($profilInstansi->tugas_fungsi ?? '-')) !!}</p>
          </div>
          <div class="mb-4">
            <h4>Struktur Organisasi</h4>
            @if(!empty($profilInstansi->struktur_organisasi))
              <img src="{{ $profilInstansi->struktur_organisasi }}" alt="Struktur Organisasi" class="img-fluid">
            @else
              <div class="text-muted">Belum ada gambar struktur organisasi.</div>
            @endif
          </div>
        @else
          <div class="text-muted">Belum ada data profil instansi.</div>
        @endif
      </div>
    </div>
  </div>
</section>

@endsection