@extends('layouts.app')
@section('content')
@section('title', 'Berita')
<section class="container py-4">
  <div class="row">
    <div class="col-lg-8">
      <h2 class="fw-bold mb-4" style="letter-spacing:2px;">BERITA</h2>
      @forelse($beritaList ?? [] as $berita)
        <div class="card mb-4 border-0 shadow-sm">
          <div class="position-relative">
            @if(isset($berita->file) && isset($berita->file->link_stream))
              <img src="{{ $berita->file->link_stream }}" class="card-img-top" alt="Gambar Berita" style="object-fit:cover;max-height:320px;">
            @endif
            <span class="badge bg-danger position-absolute" style="left:16px;bottom:16px;font-size:1rem;">{{ isset($berita->created_at) ? $berita->created_at->format('d M') : '-' }}</span>
          </div>
          <div class="card-body">
            <h5 class="card-title">{{ $berita->judul ?? $berita->title ?? '-' }}</h5>
            <p class="card-text">{{ Str::limit(strip_tags($berita->deskripsi ?? $berita->isi ?? $berita->content ?? ''), 120) }}</p>
            <a href="{{ route('berita.detail', $berita->id) }}" class="btn btn-primary btn-sm">Baca Selengkapnya</a>
          </div>
        </div>
      @empty
        <div class="alert alert-info">Belum ada berita.</div>
      @endforelse
    </div>
    <div class="col-lg-4">
      <div class="card mb-4 border-0 shadow-sm">
        <div class="card-header bg-white fw-bold">Postingan Terbaru</div>
        <ul class="list-group list-group-flush">
          @foreach(($beritaTerbaru ?? []) as $berita)
          <li class="list-group-item px-2 py-2">
            <div class="d-flex align-items-center">
              @if(isset($berita->file) && isset($berita->file->link_stream))
                <img src="{{ $berita->file->link_stream }}" alt="Gambar Berita" class="me-2 rounded" style="width:40px;height:40px;object-fit:cover;">
              @endif
              <div>
                <div class="fw-bold small mb-1">{{ $berita->judul ?? $berita->title ?? '-' }}</div>
                <div class="text-muted small">{{ isset($berita->created_at) ? $berita->created_at->format('d M Y') : '-' }}</div>
              </div>
            </div>
          </li>
          @endforeach
          @if(empty($beritaTerbaru))
            <li class="list-group-item text-muted">Tidak ada berita lain.</li>
          @endif
        </ul>
      </div>
    </div>
  </div>
</section>
@endsection
