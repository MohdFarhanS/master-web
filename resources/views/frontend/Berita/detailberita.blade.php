@extends('layouts.app')
@section('content')
<section class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      @if(isset($berita->file) && isset($berita->file->link_stream) && $berita->file->link_stream)
        <img src="{{ $berita->file->link_stream }}" class="img-fluid mb-4 w-100" style="object-fit:cover;max-height:400px;" alt="Gambar Berita">
      @else
        <img src="/img/berita-default.jpg" class="img-fluid mb-4 w-100" style="object-fit:cover;max-height:400px;" alt="Gambar Berita Default">
      @endif
      <h2 class="fw-bold mb-3" style="font-size:2rem;">{{ $berita->judul ?? $berita->title ?? '-' }}</h2>
      <div class="mb-3 text-muted">Dipublikasikan pada: {{ isset($berita->created_at) ? $berita->created_at->format('d M Y') : '-' }}</div>
      <div class="fs-5" style="line-height:1.7;">
        {!! $berita->deskripsi ?? $berita->isi ?? $berita->content ?? '' !!}
      </div>
    </div>
  </div>
</section>
@endsection
