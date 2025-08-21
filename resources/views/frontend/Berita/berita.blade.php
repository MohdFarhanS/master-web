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
    height: 320px;
    object-fit: cover;
    border-radius: 8px;
    display: block;
  }
  .berita-date {
    position: absolute;
    left: 32px;
    top: 260px;
    background: #2976f1ff;
    color: #fff;
    font-size: 1.1rem;
    font-weight: bold;
    border-radius: 10px;
    padding: 12px 18px 6px 18px;
    text-align: center;
    box-shadow: 0 2px 8px rgba(0,0,0,0.07);
    line-height: 1.3;
    z-index: 2;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: 80px;
    height: 80px;
  }
  .berita-title {
    font-size: 1.8rem;
    font-weight: 700;
    color: #232323;
    margin: 24px 0 12px 0;
    text-shadow: 1px 1px 0 #fff;
    transition: color 0.3s;
  }
  .berita-title a {
    text-decoration: none;
    color: inherit;
  }
  .berita-title a:hover {
    color: #0d6efd; /* Warna biru saat diklik */
  }
  .berita-desc {
    font-size: 1.2rem;
    color: #444;
    margin-bottom: 16px;
  }
  .sidebar-post {
    display: flex;
    align-items: center;
    border-bottom: 2px solid #eee;
    padding: 10px 0;
    margin: 15px;
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
    font-size: 1.05rem;
    color: #232323;
    margin-bottom: 2px;
    text-decoration: none;
    display: block;
    transition: color 0.3s;
  }
  .sidebar-post-title:visited {
    color: #232323; /* Tetap hitam setelah diklik */
  }
  .sidebar-post-title:hover {
    color: #0d6efd; /* Warna biru saat hover */
  }

   .berita-header-bg {
    background: linear-gradient(135deg, #e4ebffff 0%, #002affff 100%);
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
                  @if(isset($berita->file) && is_object($berita->file) && isset($berita->file->link_stream))
                      <img src="{{ $berita->file->link_stream }}" class="berita-img" alt="Berita">
                    @else
                      <img src="/img/berita-default.jpg" class="berita-img" alt="Berita">
                    @endif
                    @if(isset($berita->created_at))
                      <div class="berita-date">
                        {{ $berita->created_at->format('d M') }}
                    </div>
                    @endif
                  </div>
                  <div class="berita-content">
                    <div class="berita-title">
                      <a href="{{ route('berita.detail', $berita->id ?? 0) }}">{{ $berita->judul ?? '-' }}</a>
                    </div>
                    <div class="berita-desc">{!! \Illuminate\Support\Str::limit(strip_tags($berita->deskripsi ?? 'deskripsi_berita'), 200) !!}</div>
                  </div>
                </div>
              @endif
            @empty
              <div class="text-muted">Belum ada berita terbaru.</div>
            @endforelse
            <a href="/berita" class="btn btn-dark btn-sm">LIHAT SEMUA BERITA</a>
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
