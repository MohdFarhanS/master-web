@extends('layouts.app')
@section('title', 'Berita')
@section('content')
<style>
  .berita-card {
    box-shadow: 0 2px 8px rgba(0,0,0,0.07);
    border-radius: 18px;
    overflow: hidden;
    margin-bottom: 32px;
    background: #fff;
    transition: box-shadow .2s;
  }
  .berita-card:hover {
    box-shadow: 0 6px 24px rgba(0,0,0,0.13);
  }
  .berita-img {
    width: 100%;
    height: 220px;
    object-fit: cover;
    border-radius: 0 0 0 0;
  }
  .berita-date {
    position: absolute;
    left: 18px;
    top: 18px;
    background: #F15A29;
    color: #fff;
    padding: 8px 14px;
    border-radius: 10px;
    font-weight: 700;
    font-size: 1.1rem;
    text-align: center;
    line-height: 1.1;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    z-index: 2;
  }
  .berita-title {
    font-size: 1.2rem;
    font-weight: bold;
    margin-bottom: 8px;
    color: #232323;
  }
  .berita-desc {
    color: #444;
    margin-bottom: 10px;
  }
  .berita-link {
    color: #F15A29;
    font-weight: 600;
    text-decoration: underline;
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

   .berita-header-bg {
    background: #fdf4f5;
    padding: 60px 0 32px 0;
    margin-bottom: 0;
    text-align: center;
  }
  .berita-header-title {
    font-size: 2.4rem;
    font-weight: 700;
    color: #232323;
    letter-spacing: 2px;
    margin: 0;
    line-height: 1.1;
  }
</style>
<div class="berita-header-bg">
  <div class="berita-header-title">BERITA</div>
</div>

<section class="container py-4">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      @forelse($beritaList ?? [] as $berita)
        @if(is_object($berita))
        <div class="berita-card">
          <div class="position-relative">
            @if(isset($berita->file) && is_object($berita->file) && isset($berita->file->link_stream) && $berita->file->link_stream)
              <img src="{{ $berita->file->link_stream }}" class="berita-img" alt="Berita">
            @else
              <img src="/img/berita-default.jpg" class="berita-img" alt="Berita">
            @endif
            @if(isset($berita->created_at))
              <div class="berita-date" style="background-color: {{ $berita->bg_color }}">
                {{ $berita->created_at->format('d') }}<br><span style="font-size:1rem;font-weight:400; ">{{ $berita->created_at->format('M') }}</span>
              </div>
            @endif
          </div>
          <div class="p-4">
            <div class="berita-title">{{ $berita->judul ?? '-' }}</div>
            <div class="berita-desc">{!! \Illuminate\Support\Str::limit(strip_tags($berita->isi ?? ''), 200) !!}</div>
            <a href="{{ route('berita.detail', $berita->id ?? 0) }}" class="berita-link">Baca Selengkapnya...</a>
          </div>
        </div>
        @endif
      @empty
        <div class="text-muted">Belum ada berita terbaru.</div>
      @endforelse
      <div class="text-center mt-4">
        <a href="/berita" class="btn btn-dark btn-sm px-4">LIHAT SEMUA BERITA</a>
      </div>
    </div>
    <div class="col-lg-4 d-none d-lg-block">
      <div class="card shadow-sm border-0 rounded-4 mb-4">
        <div class="p-3 pb-2 border-bottom fw-bold" style="font-size:1.1rem;letter-spacing:1px;">Postingan Terbaru</div>
        <ul class="list-unstyled m-0">
          @foreach(($beritaTerbaru ?? []) as $post)
            @if(is_object($post))
            <li class="sidebar-post">
              @if(isset($post->file) && is_object($post->file) && isset($post->file->link_stream) && $post->file->link_stream)
                <img src="{{ $post->file->link_stream }}" alt="thumb" class="sidebar-thumb">
              @else
                <img src="/img/berita-default.jpg" alt="thumb" class="sidebar-thumb">
              @endif
              <div class="ms-3 flex-grow-1">
                <a href="{{ route('berita.detail', $post->id ?? 0) }}" class="sidebar-post-title">{{ $post->judul ?? '-' }}</a>
                <div class="sidebar-post-date">{{ isset($post->created_at) ? $post->created_at->format('d M Y') : '' }}</div>
              </div>
            </li>
            @endif
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</section>
@endsection
