@extends('layouts.app')
@section('content')
<section class="container py-5">
  <h1 class="fw-bold text-center mb-5" style="font-size:2.5rem;letter-spacing:1px;">PENGUMUMAN</h1>
  <div class="row justify-content-center">
    <div class="col-lg-10">
      @forelse($pengumuman ?? [] as $item)
        @if(is_object($item))
        <div class="card mb-4 border-0 shadow-sm">
          <div class="card-body">
            <h4 class="fw-bold mb-2" style="font-size:1.3rem;">{{ $item->judul ?? '-' }}</h4>
            <div class="text-muted small mb-2">{{ isset($item->created_at) ? $item->created_at->format('d M Y') : '-' }}</div>
            <div class="mb-2">{{ Str::limit(strip_tags($item->isi ?? $item->content ?? ''), 200) }}</div>
            @if(isset($item->file) && isset($item->file->link_stream) && Str::endsWith(strtolower($item->file->link_stream), '.pdf'))
              <a href="{{ $item->file->link_stream }}" class="btn btn-outline-success btn-sm" target="_blank" rel="noopener">
                <i class="bi bi-file-earmark-pdf"></i> Lihat Pengumuman (PDF)
              </a>
            @else
              <a href="{{ route('pengumuman.detail', $item->id) }}" class="btn btn-outline-primary btn-sm">Klik Untuk Pengumuman Selengkapnya...</a>
            @endif
          </div>
        </div>
        @endif
      @empty
        <div class="alert alert-info">Belum ada pengumuman.</div>
      @endforelse
    </div>
  </div>
</section>
@endsection