@extends('layouts.app')
@section('content')
<style>
  .pengumuman-header {
    background: linear-gradient(135deg, #e4ebffff 0%, #002affff 100%);
    color: white;
    padding: 60px 0 40px 0;
    text-align: center;
    margin-bottom: 40px;
  }
  .pengumuman-header h1 {
    font-size: 2.5rem;
    font-weight: 800;
    letter-spacing: 2px;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    margin: 0;
  }
  .pengumuman-item {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    margin-bottom: 25px;
    padding: 25px;
    transition: all 0.3s ease;
    border-left: 4px solid #0d6efd;
  }
  .pengumuman-item:hover {
    box-shadow: 0 4px 20px rgba(0,0,0,0.12);
    transform: translateY(-2px);
  }
  .pengumuman-date-badge {
    background: #0d6efd;
    color: white;
    padding: 8px 15px;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 600;
    display: inline-block;
    margin-bottom: 15px;
  }
  .pengumuman-title {
    font-size: 1.4rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 12px;
    line-height: 1.4;
  }
  .pengumuman-content {
    color: #555;
    font-size: 1rem;
    line-height: 1.6;
    margin-bottom: 15px;
  }
  .pengumuman-actions {
    display: flex;
    gap: 10px;
    align-items: center;
  }
  .btn-detail {
    background: #0d6efd;
    color: white;
    padding: 8px 16px;
    border-radius: 6px;
    text-decoration: none;
    font-size: 0.9rem;
    font-weight: 600;
    transition: all 0.3s;
  }
  .btn-detail:hover {
    background: #0b5ed7;
    color: white;
    transform: translateX(2px);
  }
  .btn-pdf {
    background: #dc3545;
    color: white;
    padding: 8px 16px;
    border-radius: 6px;
    text-decoration: none;
    font-size: 0.9rem;
    font-weight: 600;
    transition: all 0.3s;
  }
  .btn-pdf:hover {
    background: #c82333;
    color: white;
  }
  .empty-state {
    text-align: center;
    padding: 60px 20px;
    background: #f8f9fa;
    border-radius: 12px;
    margin: 40px 0;
  }
  .empty-icon {
    font-size: 4rem;
    color: #6c757d;
    margin-bottom: 20px;
  }
</style>

<div class="pengumuman-header">
  <div class="container">
    <h1>PENGUMUMAN</h1>
    <p class="mt-3 mb-0" style="font-size:1.1rem;opacity:0.9;">Informasi Terbaru dan Penting</p>
  </div>
</div>

<section class="container py-4">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      @forelse($pengumuman ?? [] as $item)
        @if(is_object($item))
        <div class="pengumuman-item">
          <div class="pengumuman-date-badge">
            <i class="fas fa-calendar-alt me-2"></i>
            {{ isset($item->created_at) ? $item->created_at->format('d M Y') : '-' }}
          </div>
          
          <h3 class="pengumuman-title">{{ $item->judul ?? '-' }}</h3>
          
          <div class="pengumuman-content">
            {{ Str::limit(strip_tags($item->deskripsi ?? $item->isi ?? $item->content ?? ''), 200) }}
          </div>
          
          <div class="pengumuman-actions">
            @if(isset($item->file) && isset($item->file->link_stream) && Str::endsWith(strtolower($item->file->link_stream), '.pdf'))
              <a href="{{ $item->file->link_stream }}" class="btn-pdf" target="_blank" rel="noopener">
                <i class="fas fa-file-pdf me-1"></i> Lihat PDF
              </a>
            @endif
            <a href="{{ route('pengumuman.detail', $item->id) }}" class="btn-detail">
              <i class="fas fa-eye me-1"></i> Lihat Detail
            </a>
          </div>
        </div>
        @endif
      @empty
        <div class="empty-state">
          <div class="empty-icon">
            <i class="fas fa-bullhorn"></i>
          </div>
          <h4 class="text-muted">Belum Ada Pengumuman</h4>
          <p class="text-muted">Pengumuman akan ditampilkan di sini ketika tersedia.</p>
        </div>
      @endforelse
    </div>
  </div>
</section>
@endsection