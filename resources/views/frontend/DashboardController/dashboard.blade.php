@extends('layouts.app')

@push('styles')
<style>
    .card { border-radius: 18px; box-shadow: 0 4px 24px rgba(0,0,0,0.07); transition: box-shadow 0.2s; }
    .card:hover { box-shadow: 0 8px 32px rgba(0,0,0,0.12); }
    .card-img-top, .img-fluid.rounded, .img-fluid.rounded-circle, .img-fluid.rounded.shadow { border-radius: 12px; object-fit: cover; }
    .fw-bold, .card-header.fw-bold, .section-title { color: #0d6efd !important; font-weight: 800; letter-spacing: 2px; }
    .badge.bg-warning, .badge.bg-danger { font-size: 1rem; border-radius: 8px; padding: 6px 14px; font-weight: 600; }
    .card-header.fw-bold { background: #f8f9fa; border-bottom: 1px solid #eee; font-size: 1.1rem; letter-spacing: 1px; }
    .card-body.text-center { padding-top: 24px; padding-bottom: 24px; }
    .list-group-item { border: none; border-bottom: 1px solid #f0f0f0; background: transparent; }
    .list-group-item:last-child { border-bottom: none; }
    .rounded-circle { border: 3px solid #0d6efd; box-shadow: 0 2px 8px rgba(13,110,253,0.08); }
    .btn-outline-primary { border-radius: 8px; font-weight: 600; padding: 6px 18px; transition: background 0.2s, color 0.2s; }
    .btn-outline-primary:hover { background: #0d6efd; color: #fff; border-color: #0d6efd; }
    @media (max-width: 991px) {
        .col-lg-8, .col-lg-4 { max-width: 100% !important; flex: 0 0 100%; }
        .card { margin-bottom: 24px; }
    }
</style>
@endpush

<div class="container">
    <div class="row mb-4">
        <div class="col-lg-8 mb-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white fw-bold">Berita Terbaru</div>
                <ul class="list-group list-group-flush">
                    @forelse($beritaTerbaru ?? [] as $berita)
                        @if(is_object($berita))
                        <li class="list-group-item">
                            <strong>{{ $berita->judul ?? '-' }}</strong>
                            <br><small class="text-muted">{{ isset($berita->created_at) ? $berita->created_at->format('d M Y') : '-' }}</small>
                        </li>
                        @endif
                    @empty
                        <li class="list-group-item text-muted">Belum ada berita terbaru.</li>
                    @endforelse
                </ul>
            </div>
        </div>
        <div class="col-lg-4 mb-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white fw-bold">Galeri Foto</div>
                <div class="row g-2 p-2">
                    @forelse($galeri ?? [] as $foto)
                        @if(is_object($foto) && isset($foto->file) && is_object($foto->file) && isset($foto->file->link_stream))
                        <div class="col-6 mb-2">
                            <img src="{{ $foto->file->link_stream }}" class="img-fluid rounded" alt="Foto Galeri">
                        </div>
                        @endif
                    @empty
                        <div class="col-12 text-muted">Belum ada foto galeri.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-sm border-0" id="profil-pimpinan">
                <div class="card-header bg-white fw-bold">Profil Pimpinan</div>
                <div class="card-body">
                    @forelse($profilePimpinan ?? [] as $pimpinan)
                        <div class="mb-3 d-flex align-items-center">
                            @if(is_object($pimpinan) && isset($pimpinan->file) && is_object($pimpinan->file) && isset($pimpinan->file->link_stream))
                                <img src="{{ $pimpinan->file->link_stream }}" alt="Foto Pimpinan" class="rounded-circle me-3" style="width:64px;height:64px;object-fit:cover;">
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ urlencode(is_object($pimpinan) && isset($pimpinan->nama) ? $pimpinan->nama : 'Pimpinan') }}&size=64" alt="Foto Pimpinan" class="rounded-circle me-3" style="width:64px;height:64px;object-fit:cover;">
                            @endif
                            <strong>{{ $pimpinan->nama }}</strong>
                        </div>
                    @empty
                        <div class="text-muted">Belum ada data pimpinan.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-sm border-0" id="profil-instansi">
                <div class="card-header bg-white fw-bold">Profil Instansi</div>
                <div class="card-body">
                    {{ $profileInstansi->sejarah_singkat ?? '-' }}
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-sm border-0" id="struktur-organisasi">
                <div class="card-header bg-white fw-bold">Struktur Organisasi</div>
                <div class="card-body">
                    <div class="text-muted">Struktur organisasi akan ditampilkan di sini.</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4" id="kontak">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white fw-bold">Kontak</div>
                <div class="card-body">
                    <p>{{ $kontak->alamat ?? '-' }}<br>Telp: {{ $kontak->telp ?? '-' }}<br>Email: {{ $kontak->email ?? '-' }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="bg-primary text-white mt-5 py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-3">
                <h5>Info Kontak</h5>
                <p>{{ $kontak->alamat ?? '-' }}<br>Telp: {{ $kontak->telp ?? '-' }}<br>Email: {{ $kontak->email ?? '-' }}</p>
            </div>
            <div class="col-md-4 mb-3">
                <h5>Sosial Media</h5>
                <a href="#" class="text-white me-2"><i class="bi bi-facebook"></i> Facebook</a><br>
                <a href="#" class="text-white me-2"><i class="bi bi-twitter"></i> Twitter</a><br>
                <a href="#" class="text-white"><i class="bi bi-instagram"></i> Instagram</a>
            </div>
        </div>
        <div class="text-center mt-3">&copy; {{ date('Y') }} Kominfo. All rights reserved.</div>
    </div>
</footer>