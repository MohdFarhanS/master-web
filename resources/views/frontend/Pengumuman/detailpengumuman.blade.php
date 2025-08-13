@extends('layouts.app')
@section('content')
<div style="background:#fcf7f6;padding:48px 0 32px 0;text-align:center;width:100%;margin-bottom:0;">
  <span style="font-family:'Arial Black','Arial','Segoe UI',sans-serif;font-size:3rem;font-weight:900;color:#232323;letter-spacing:2px;text-transform:uppercase;line-height:1.1;display:inline-block;">
    {{ $item->judul ?? '-' }}
  </span>
</div>
<section class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      @if(isset($item) && is_object($item))
        <div class="card mb-4 border-0 shadow-sm" style="background:#f9f8fa;">
            <div class="mb-4" style="background:#fff;border-radius:12px;padding:18px 20px 12px 20px;border:1.5px solid #e0e0e0;min-height:70px;">
              <div class="mb-2" style="font-size:1.15rem;color:#888;">{{ $item->judul ?? '-' }}</div>
              <div style="font-size:1.08rem;">{!! nl2br(e($item->isi ?? $item->content ?? '')) !!}</div>
              @if(isset($item->file) && isset($item->file->link_stream))
                <div class="mt-3">
                  <a href="{{ $item->file->link_stream }}" class="fw-bold text-primary" target="_blank" rel="noopener">klik untuk Pengumuman Selengkapnya...</a>
                </div>  
              @endif
            </div>
        </div>
      @else
        <div class="alert alert-info">Pengumuman tidak ditemukan.</div>
      @endif
    </div>
  </div>
</section>
@endsection