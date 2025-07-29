@extends('layouts.app')
@section('content')
<section class="container py-5">
  <h2 class="fw-bold text-center mb-5" style="font-size:2.1rem;letter-spacing:1px;color:#F15A29;text-transform:uppercase;text-decoration:underline 3px #2ecc71;">PENGUMUMAN</h2>
  <div class="row justify-content-center">
    <div class="col-lg-10">
      @if(isset($item) && is_object($item))
        <div class="card mb-4 border-0 shadow-sm" style="background:#f9f8fa;">
          <div class="card-body p-4">
            <h3 class="fw-bold text-center mb-4" style="font-size:1.7rem;line-height:1.3;">{{ $item->judul ?? '-' }}</h3>
            <div class="mb-4" style="background:#fff;border-radius:12px;padding:18px 20px 12px 20px;border:1.5px solid #e0e0e0;min-height:70px;">
              <div class="mb-2 text-muted small">{{ isset($item->created_at) ? $item->created_at->format('d M Y') : '-' }}</div>
              <div style="font-size:1.08rem;">{!! nl2br(e($item->isi ?? $item->content ?? '')) !!}</div>
              @if(isset($item->file) && isset($item->file->link_stream))
                <div class="mt-3">
                  <a href="{{ $item->file->link_stream }}" class="fw-bold text-primary" target="_blank" rel="noopener">klik untuk Pengumuman Selengkapnya...</a>
                </div>
              @endif
            </div>
          </div>
        </div>
      @else
        <div class="alert alert-info">Pengumuman tidak ditemukan.</div>
      @endif
    </div>
  </div>
</section>
@endsection