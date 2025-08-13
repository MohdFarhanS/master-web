@extends('layouts.app')
@section('content')
<style>
.navbar .dropdown-menu {
  background: #0d6efd !important;
  border: none;
  box-shadow: 0 2px 8px rgba(0,0,0,0.07);
}
.navbar .dropdown-item {
  color: #fff !important;
  font-weight: 500;
  transition: background 0.2s, color 0.2s;
}
.navbar .dropdown-item:hover, .navbar .dropdown-item:focus {
  background: #0d6efd !important;
  color: #fff !important;
}
    .navbar-blue {
        background: #0d6efd;
        color: #fff;
        position: sticky;
        top: 0;
        z-index: 1040;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        width: 100vw;
        left: 50%;
        transform: translateX(-50%);
        border-radius: 0 !important;
        padding-left: 0;
        padding-right: 0;
        margin-left: 0;
        margin-right: 0;
    }
    .dashboard-section-title {
        font-family: 'Arial Black', 'Arial', 'Segoe UI', 'sans-serif';
        font-size: 3rem;
        font-weight: 900;
        color: #0d6efd;
        margin-bottom: 18px;
        letter-spacing: 2px;
        text-transform: uppercase;
        border-bottom: 4px solid #0d6efd;
        display: inline-block;
        padding-bottom: 4px;
        line-height: 1.1;
        text-shadow: none;
    }
    .dashboard-berita {
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.07);
        padding: 32px 32px 24px 32px;
        margin-bottom: 32px;
        overflow: hidden;
        position: relative;
    }
    .dashboard-berita-img {
        width: 100%;
        height: 320px;
        object-fit: cover;
        border-radius: 8px;
        display: block;
    }
    .dashboard-berita-date {
        position: absolute;
        left: 32px;
        top: 260px;
        background: #0d6efd;
        color: #fff;
        font-size: 2rem;
        font-weight: bold;
        border-radius: 10px;
        padding: 12px 18px 6px 18px;
        text-align: center;
        box-shadow: 0 2px 8px rgba(0,0,0,0.07);
        line-height: 1.1;
        z-index: 2;
    }
    .dashboard-berita-content {
        margin-top: 24px;
    }
    .dashboard-berita-title {
        font-size: 2rem;
        font-weight: 700;
        color: #232323;
        margin: 24px 0 12px 0;
        text-shadow: 1px 1px 0 #fff;
    }
    .dashboard-berita-desc {
        font-size: 1.1rem;
        color: #232323;
        margin-bottom: 18px;
    }
    .dashboard-berita-link {
        font-size: 1rem;
        color: #0d6efd;
        font-weight: 600;
        text-decoration: underline;
        margin-top: 8px;
        display: inline-block;
    }
    .dashboard-profile {
        background-color: #fafafa;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.07);
        padding: 24px 12px 18px 12px;
        margin-bottom: 24px;
        text-align: center;
        border: 1px solid #eee;
    }
    .dashboard-profile-title {
        font-size: 2rem;
        font-weight: 600;
        color: #232323;
        margin-bottom: 0.5rem;
        text-align: left;
    }
    .dashboard-profile-title-underline {
        border-bottom: 2px solid #e0e0e0;
        margin-bottom: 18px;
        margin-top: 0.2rem;
    }
    .dashboard-profile-img-wrapper {
        border: 3px solid #2196f3;
        border-radius: 6px;
        padding: 6px 6px 0 6px;
        display: inline-block;
        background: #fff;
        margin-bottom: 12px;
    }
    .dashboard-profile-img {
        width: 220px;
        height: 280px;
        object-fit: cover;
        border-radius: 0;
        display: block;
        background: #fff;
    }
    .dashboard-profile-name {
        font-size: 1.5rem;
        font-weight: 900;
        color: #111;
        margin-top: 12px;
        margin-bottom: 0;
        text-align: center;
        font-family: 'Arial Black', 'Arial', 'Segoe UI', 'sans-serif';
    }
    .dashboard-galeri-img {
        width: 100%;
        height: auto;
        border-radius: 8px;
    }
    .dashboard-map {
        width: 100%;
        height: 260px;
        border-radius: 8px;
        margin-bottom: 20px;
        border: none;
    }
    .dashboard-profil-instansi {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        padding: 16px;
    }

</style>


<!-- Sticky Blue Navbar -->
<section class="container py-4" style="margin-top:110px;">
    <!-- Banner Section -->
    <div class="mb-4">
        @if(isset($banners) && $banners->count() > 0)
            <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner rounded shadow-sm">
                    @php $hasImage = false; $slideIndex = 0; @endphp
                    @foreach($banners as $banner)
                        @if(isset($banner->file) && is_iterable($banner->file) && count($banner->file) > 0)
                            @foreach($banner->file as $file)
                                @if(isset($file->type, $file->link_stream) && $file->type === 'image' && !empty($file->link_stream))
                                    <div class="carousel-item {{ !$hasImage ? 'active' : '' }}">
                                        <img src="{{ url($file->link_stream) }}" class="d-block" alt="Banner {{ $slideIndex + 1 }}" style="max: width 95px;px;width:100%;height:auto;aspect-ratio:16/7;object-fit:contain;display:block;margin:0 auto;">
                                    </div>
                                    @php $hasImage = true; $slideIndex++; @endphp
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                    @if(!$hasImage)
                        <div class="carousel-item active">
                            <img src="{{ asset('/img/banner-default.jpg') }}" class="d-block" alt="Banner Default" style="max-width:900px;width:100%;height:auto;aspect-ratio:16/7;object-fit:contain;display:block;margin:0 auto;">
                        </div>
                    @endif
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        @else
            <img src="{{ asset('/img/banner-default.jpg') }}" class="w-90 rounded shadow-sm" alt="Banner Default" style="max-height:320px;object-fit:cover;">
        @endif
    </div>

    <!-- Berita Section -->
    <div class="dashboard-section-title">BERITA TERKINI!</div>
    <div class="row mb-4">
        <div class="col-lg-8 mb-3">
            @forelse($beritaTerbaru ?? [] as $berita)
                <div class="dashboard-berita">
                    <div style="position:relative;">
                        @if(isset($berita->file) && isset($berita->file->link_stream) && $berita->file->link_stream)
                            <img src="{{ $berita->file->link_stream }}" class="dashboard-berita-img" alt="Berita">
                        @else
                            <img src="/img/berita-default.jpg" class="dashboard-berita-img" alt="Berita">
                        @endif
                        @if(isset($berita->created_at))
                            <div class="dashboard-berita-date" style="background-color: {{ $berita->bg_color }}; !important">
                                {{ $berita->created_at->format('d') }}<br><span style="font-size:1.1rem;font-weight:400;">{{ $berita->created_at->format('M') }}</span>
                            </div>
                        @endif
                    </div>
                    <div class="dashboard-berita-content">
                        <div class="dashboard-berita-title">{{ $berita->judul ?? '-' }}</div>
                        <div class="dashboard-berita-desc">{!! \Illuminate\Support\Str::limit(strip_tags($berita->isi ?? ''), 200) !!}</div>
                        <a href="{{ route('berita.detail', $berita->id ?? 0) }}" class="dashboard-berita-link" style="color: {{ $berita->bg_color }}; !important">Baca Selengkapnya...</a>
                    </div>
                </div>
            @empty
                <div class="text-muted">Belum ada berita terbaru.</div>
            @endforelse
            <a href="/berita" class="btn btn-dark btn-sm">LIHAT SEMUA BERITA</a>
        </div>
        <div class="col-lg-4 mb-3">
            <div class="dashboard-profile mb-3">
                <div class="dashboard-profile-title">Profile Pimpinan</div>
                <div class="dashboard-profile-title-underline"></div>
                @if(isset($profilePimpinan[0]))
                    <a href="{{ route('profil.pimpinan') }}" style="text-decoration:none;">
                        <div class="dashboard-profile-img-wrapper">
                        @if(isset($profilePimpinan[0]->file) && isset($profilePimpinan[0]->file->link_stream))
                            <img src="{{ $profilePimpinan[0]->file->link_stream }}" alt="Foto Pimpinan" class="dashboard-profile-img">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($profilePimpinan[0]->nama ?? 'Pimpinan') }}&size=220x280" alt="Foto Pimpinan" class="dashboard-profile-img">
                        @endif
                        </div>
                        <div class="dashboard-profile-name">{{ $profilePimpinan[0]->nama ?? '-' }}</div>
                    </a>
                @else
                    <div class="text-muted">Belum ada data pimpinan.</div>
                @endif
            </div>
            <!-- Postingan Terbaru -->
            <div class="mb-3" style="background:#fff;border-radius:12px;box-shadow:0 2px 8px rgba(0,0,0,0.07);padding:24px 18px 18px 18px;">
                <div style="font-size:1.5rem;font-weight:900;color:#232323;margin-bottom:12px;letter-spacing:0.5px;">Postingan Terbaru</div>
                @foreach($beritaTerbaru ?? [] as $berita)
                    @if(is_object($berita))
                    <div class="d-flex align-items-start mb-3" style="gap:12px;">
                        <div style="width:80px;min-width:80px;">
                            @if(isset($berita->file) && isset($berita->file->link_stream) && $berita->file->link_stream)
                                <img src="{{ $berita->file->link_stream }}" alt="thumb" style="width:80px;height:56px;object-fit:cover;border-radius:8px;">
                            @else
                                <img src="/img/berita-default.jpg" alt="thumb" style="width:80px;height:56px;object-fit:cover;border-radius:8px;">
                            @endif
                        </div>
                        <div style="flex:1;min-width:0;">
                            <a href="{{ route('berita.detail', $berita->id ?? 0) }}" style="font-weight:700;font-size:1.05rem;color:#232323;text-decoration:none;display:block;line-height:1.2;">{{ $berita->judul ?? '-' }}</a>
                            <div style="font-size:0.92rem;color:#888;margin-top:2px;">{{ isset($berita->created_at) ? $berita->created_at->format('d M Y') : '-' }}</div>
                        </div>
                    </div>
                    @endif
                @endforeach
                @if(empty($beritaTerbaru))
                    <div class="text-muted">Belum ada berita terbaru.</div>
                @endif
            </div>
            <!-- Pengumuman -->
            <div style="background:#fff;border-radius:12px;box-shadow:0 2px 8px rgba(0,0,0,0.07);padding:24px 18px 18px 18px;">
                <div style="font-size:1.5rem;font-weight:900;color:#232323;margin-bottom:8px;letter-spacing:0.5px;border-bottom:2px solid #eee;padding-bottom:4px;">Pengumuman</div>
                <ul style="list-style-type:disc;padding-left:20px;margin-bottom:0;">
                    @forelse($pengumuman ?? [] as $item)
                        @if(is_object($item))
                        <li style="margin-bottom:7px;font-size:1.08rem;">
                            <a href="{{ route('pengumuman.detail', $item->id ?? 0) }}" style="color:#232323;font-weight:600;text-decoration:none;">{{ $item->judul ?? '-' }}</a>
                        </li>
                        @endif
                    @empty
                        <li class="text-muted">Belum ada pengumuman.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>

    <!-- Galeri Section -->
    <div class="dashboard-section-title">GALERY</div>
    <div class="row mb-4">
        @forelse($galeri ?? [] as $foto)
            @if(is_object($foto) && isset($foto->file) && is_object($foto->file) && isset($foto->file->link_stream))
                <div class="col-md-3 mb-3">
                    <img src="{{ $foto->file->link_stream }}" class="dashboard-galeri-img" alt="Foto Galeri">
                </div>
            @endif
        @empty
            <div class="col-12 text-muted">Belum ada foto galeri.</div>
        @endforelse
        <div class="col-12">
            <a href="/galeri" class="btn btn-dark btn-sm">LIHAT SEMUA GALERI</a>
        </div>
    </div>

    <!-- Lokasi Section -->
    <div style="font-family:'Arial Black','Arial','Segoe UI',sans-serif;font-size:3.5rem;font-weight:900;color:#0037ffff;letter-spacing:2px;text-transform:uppercase;border-bottom:6px solid #0037ffff;display:inline-block;padding-bottom:6px;line-height:1.1;margin-bottom:32px;">LOKASI</div>
    <div class="mb-4" style="margin-top:32px;">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.728282019839!2d101.45582153528665!3d0.523317600930215!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5ade64f297b57%3A0x2ee541838c361bba!2sBadan%20Riset%20dan%20Inovasi%20Daerah%20(BRIDA)%20Provinsi%20Riau!5e0!3m2!1sid!2sid!4v1753763766945!5m2!1sid!2sid" width="100%" height="420" style="border:0;min-width:320px;max-width:100vw;display:block;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

</section>
@endsection