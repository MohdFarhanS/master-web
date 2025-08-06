@extends('layouts.app')
@section('content')
<style>
.pimpinan-header-bg {
  background: linear-gradient(135deg, #e4ebffff 0%, #002affff 100%);
  padding: 60px 0 32px 0;
  margin-bottom: 0;
  text-align: center;
}
.pimpinan-header-title {
  font-size: 2.4rem;
  font-weight: 700;
  color: #232323;
  letter-spacing: 2px;
  margin: 0;
  line-height: 1.1;
}
.pimpinan-card {
  background: #fff;
  border-radius: 16px;
  box-shadow: 0 2px 12px rgba(0,0,0,0.07);
  padding: 36px 24px 32px 24px;
  margin-bottom: 32px;
  border: 1.5px solid #f3f3f3;
  text-align: center;
}
.pimpinan-img {
  display: block;
  margin: 0 auto 18px auto;
  max-width: 320px;
  width: 100%;
  height: auto;
  border-radius: 8px;
  background: #fff;
  box-shadow: 0 2px 12px rgba(33,150,243,0.10);
  border: 1.5px solid #e0e0e0;
  object-fit: contain;
}
.pimpinan-name {
  font-size: 1.25rem;
  font-weight: 700;
  color: #232323;
  text-align: center;
  margin-top: 18px;
  margin-bottom: 0;
  letter-spacing: 1px;
}
.pimpinan-empty {
  color: #888;
  font-size: 1.1rem;
  text-align: center;
  margin: 32px 0;
}
.sidebar-post {
  display: flex;
  align-items: center;
  border-bottom: 1px solid #eee;
  padding: 10px 0;
}
.sidebar-thumb {
  width: 48px;
  height: 48px;
  object-fit: cover;
  border-radius: 8px;
  flex-shrink: 0;
}
.sidebar-post-title {
  font-weight: 600;
  font-size: 0.98rem;
  color: #232323;
  margin-bottom: 2px;
  text-decoration: none;
  display: block;
}
.sidebar-post-date {
  color: #888;
  font-size: 0.92rem;
}
</style>
<div class="pimpinan-header-bg">
  <div class="pimpinan-header-title">PROFIL PIMPINAN</div>
</div>
<section class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="pimpinan-card">
        <div class="fw-bold mb-3 text-start" style="font-size:1.1rem;">Profile Pimpinan</div>
        @if(isset($profilePimpinan) && count($profilePimpinan))
            @foreach($profilePimpinan as $pimpinan)
                <img src="{{ $pimpinan->file->link_stream ?? '' }}" alt="Foto Pimpinan" class="pimpinan-img">
                <div class="pimpinan-name mt-3">{{ $pimpinan->nama ?? '-' }}</div>
            @endforeach
        @else
            <div class="pimpinan-empty">Belum ada data pimpinan.</div>
        @endif
      </div>
</section>
@endsection