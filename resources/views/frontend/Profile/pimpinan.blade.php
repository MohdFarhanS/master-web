@extends('layouts.app')
@section('content')
<style>
.pimpinan-section-title {
  font-size: 2rem;
  font-weight: 700;
  color: #222;
  margin-bottom: 24px;
  letter-spacing: 1px;
  border-bottom: 1.5px solid #eaeaea;
  padding-bottom: 10px;
}
.pimpinan-card {
  background: #fcfcfd;
  border-radius: 12px;
  box-shadow: 0 2px 12px rgba(0,0,0,0.06);
  padding: 32px 18px 24px 18px;
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
  font-size: 2rem;
  font-weight: 700;
  color: #222;
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
</style>
<section class="container py-5">
  <h2 class="pimpinan-section-title">Profil Pimpinan</h2>
  <div class="row justify-content-center">
    <div class="col-lg-5 col-md-7 col-12">
      <div class="pimpinan-card">
        @if(isset($profilePimpinan) && count($profilePimpinan))
            @foreach($profilePimpinan as $pimpinan)
                <img src="{{ $pimpinan->file->link_stream ?? '' }}" alt="Foto Pimpinan" class="pimpinan-img">
                <div class="pimpinan-name">{{ $pimpinan->nama ?? '-' }}</div>
            @endforeach
        @else
            <div class="pimpinan-empty">Belum ada data pimpinan.</div>
        @endif
      </div>
    </div>
  </div>
</section>
@endsection