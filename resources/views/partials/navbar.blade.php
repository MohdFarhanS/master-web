<nav id="mainNavbar" class="navbar navbar-expand-lg navbar-light bg-transparent fixed-top shadow-sm py-2" style="transition:background 0.3s;z-index:1055;">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold d-flex align-items-center" href="/dashboard">
      @if(isset($dashboardInstansi->file) && is_object($dashboardInstansi->file) && isset($dashboardInstansi->file->link_stream))
        <img src="{{ $dashboardInstansi->file->link_stream }}" alt="Logo" style="height:40px;width:auto;" class="me-2">
      @else
        <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height:40px;width:auto;" class="me-2">
      @endif
      {{ $dashboardInstansi->nama ?? 'Badan Riset dan Inovasi Daerah' }} <br>{{ $dashboardInstansi->provinsi ?? 'Provinsi Riau' }}
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-lg-center">
        <li class="nav-item"><a class="nav-link" href="/dashboard">Dashboard</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Profile</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/profil-pimpinan">Profil Pimpinan</a></li>
            <li><a class="dropdown-item" href="/profil-instansi">Profil Instansi</a></li>
            <li><a class="dropdown-item" href="/struktur-organisasi">Struktur Organisasi</a></li>
          </ul>
        </li>
        <li class="nav-item"><a class="nav-link" href="/berita">Berita</a></li>
        <li class="nav-item"><a class="nav-link" href="/pengumuman">Pengumuman</a></li>
        <li class="nav-item"><a class="nav-link" href="/galeri">Galeri

        </a></li>
        <li class="nav-item d-flex align-items-center">
          <a class="nav-link d-flex align-items-center" href="/kontak">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="#232323" style="vertical-align:middle;margin-right:6px;display:inline-block;">
              <path d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2a1 1 0 011.01-.24c1.12.37 2.33.57 3.58.57a1 1 0 011 1v3.5a1 1 0 01-1 1C7.61 22 2 16.39 2 9.5a1 1 0 011-1h3.5a1 1 0 011 1c0 1.25.2 2.46.57 3.58a1 1 0 01-.24 1.01l-2.2 2.2z"/>
            </svg>
            <span style="color:#232323;">Kontak</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<style>
  .section-title {
    font-size: 1.8rem;
    font-weight: 700;
    border-bottom: 3px solid #198754;
    display: inline-block;
    margin-bottom: 1.5rem;
  }
  .card-news {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.07);
    margin-bottom: 32px;
    overflow: hidden;
    position: relative;
    padding-bottom: 0;
  }
  .card-news-img {
    width: 100%;
    height: 320px;
    object-fit: cover;
    display: block;
  }
  .card-news-date {
    position: absolute;
    left: 24px;
    top: 260px;
    background: #F15A29;
    color: #fff;
    font-size: 2rem;
    font-weight: bold;
    border-radius: 10px;
    padding: 12px 18px 6px 18px;
    text-align: center;
    box-shadow: 0 2px 8px rgba(0,0,0,0.07);
    line-height: 1.1;
  }
  .card-news-title {
    font-size: 2rem;
    font-weight: 700;
    color: #232323;
    margin: 24px 0 12px 0;
  }
  .card-news-desc {
    font-size: 1.1rem;
    color: #232323;
    margin-bottom: 18px;
  }
  .card-news-link {
    font-size: 1rem;
    color: #F15A29;
    font-weight: 600;
    text-decoration: underline;
    margin-top: 8px;
    display: inline-block;
  }
  .galeri-img {
    height: 180px;
    object-fit: cover;
    width: 100%;
  }
  .footer {
    background-color: #222;
    color: #ccc;
    padding: 30px 0;
    margin-top: 50px;
    font-size: 14px;
  }
  .navbar-orange {
    background: #0d6efd !important;
    transition: background 0.3s;
    box-shadow: 0 2px 8px rgba(0,0,0,0.07);
  }
  .navbar .navbar-brand, .navbar .nav-link {
    color: #222 !important;
    font-weight: 500;
  }
  .navbar-orange .navbar-brand, .navbar-orange .nav-link {
    color: #fff !important;
  }

.dashboard-footer {
        background: #232323;
        color: #fff;
        padding: 32px 0 0 0;
        margin-top: 32px;
    }
    .dashboard-footer .footer-title {
        font-weight: bold;
        margin-bottom: 8px;
    }
    .dashboard-footer .footer-info {
        font-size: 1rem;
        margin-bottom: 8px;
    }
    .dashboard-footer .footer-social a {
        color: #fff;
        margin-right: 12px;
        font-size: 1.3rem;
    }
</style>


@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var navbar = document.getElementById('mainNavbar');
    function onScroll() {
      if(window.scrollY > 60) {
        navbar.classList.add('navbar-orange');
      } else {
        navbar.classList.remove('navbar-orange');
      }
    }
    window.addEventListener('scroll', onScroll);
    onScroll();
  });
</script>

<footer class="dashboard-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-3">
              <div style="font-size:2.1rem;font-weight:900;letter-spacing:1px;margin-bottom:20px;color:#fff;font-family:'Arial Black',Arial,sans-serif;text-transform:uppercase;">Info Kontak</div>
              <div style="color:#bfc4c9;font-size:1.15rem;margin-bottom:22px;line-height:1.7;">
                @if(isset($kontak) && !empty($kontak->alamat))
                  {!! nl2br(e($kontak->alamat)) !!}
                @else
                  <span style='color:#888;'>Alamat belum tersedia</span>
                @endif
              </div>
              <div style="display:flex;align-items:center;margin-bottom:14px;">
                <span style="display:inline-flex;align-items:center;justify-content:center;width:32px;height:32px;background:#23272b;border-radius:8px;margin-right:12px;">
                  <svg width="20" height="20" fill="#fff" viewBox="0 0 24 24"><path d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2a1 1 0 011.01-.24c1.12.37 2.33.57 3.58.57a1 1 0 011 1v3.5a1 1 0 01-1 1C7.61 22 2 16.39 2 9.5a1 1 0 011-1h3.5a1 1 0 011 1c0 1.25.2 2.46.57 3.58a1 1 0 01-.24 1.01l-2.2 2.2z"/></svg>
                </span>
                <span style="color:#bfc4c9;font-size:1.13rem;">
                  @if(isset($kontak) && !empty($kontak->telp))
                    {{ $kontak->telp }}
                  @else
                    <span style='color:#888;'>-</span>
                  @endif
                </span>
              </div>
              <div style="display:flex;align-items:center;">
                <span style="display:inline-flex;align-items:center;justify-content:center;width:32px;height:32px;background:#23272b;border-radius:8px;margin-right:12px;">
                  <svg width="20" height="20" fill="#fff" viewBox="0 0 24 24"><path d="M20 4H4a2 2 0 00-2 2v12a2 2 0 002 2h16a2 2 0 002-2V6a2 2 0 00-2-2zm0 2v.01L12 13 4 6.01V6h16zM4 20V8.83l8 7.17 8-7.17V20H4z"/></svg>
                </span>
                <span style="color:#bfc4c9;font-size:1.13rem;">
                  @if(isset($kontak) && !empty($kontak->email))
                    {{ $kontak->email }}
                  @else
                    <span style='color:#888;'>-</span>
                  @endif
                </span>
              </div>
            </div>
      <div class="col-md-6 mb-3">
        <div style="font-size:2rem;font-weight:700;letter-spacing:1px;margin-bottom:18px;color:#fff;font-family:'Arial Black',Arial,sans-serif;">SOCIAL MEDIA</div>
        <div class="footer-social" style="display:flex;gap:18px;align-items:center;">
          <a href="#" style="color:#fff;font-size:1.5rem;"><i class="fab fa-instagram"></i></a>
          <a href="#" style="color:#fff;font-size:1.5rem;"><i class="fas fa-globe"></i></a>
          <a href="#" style="color:#fff;font-size:1.5rem;"><i class="fab fa-facebook"></i></a>
          <a href="#" style="color:#fff;font-size:1.5rem;"><i class="fab fa-twitter"></i></a>
        </div>
      </div>
        </div>
        <div class="text-center py-3" style="border-top:1px solid #444;">Copyright © {{ date('Y') }} Badan Riset dan Inovasi Daerah Provinsi Riau</div>
    </div>
</footer>
@endpush


