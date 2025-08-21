<nav id="mainNavbar" class="navbar navbar-expand-lg navbar-light bg-transparent fixed-top shadow-sm py-2" style="transition:background 0.3s;z-index:1055;">
<div class="container-fluid">
    <a class="navbar-brand fw-bold d-flex align-items-center" href="/dashboard">
      @if(isset($dashboardInstansi->file) && is_object($dashboardInstansi->file) && isset($dashboardInstansi->file->link_stream))
        <img src="{{ $dashboardInstansi->file->link_stream }}" alt="Logo" style="height:40px;width:auto;" class="me-2">
      @else
        <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height:40px;width:auto;" class="me-2">
      @endif
      {{ $dashboardInstansi->nama_instansi }} <br>{{ $dashboardInstansi->provinsi ?? 'Provinsi Riau' }}
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
            <svg width="20" height="20" viewBox="0 0 24 24" fill="#000000" stylegit="vertical-align:middle;margin-right:6px;display:inline-block;">
              <path d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2a1 1 0 011.01-.24c1.12.37 2.33.57 3.58.57a1 1 0 011 1v3.5a1 1 0 01-1 1C7.61 22 2 16.39 2 9.5a1 1 0 011-1h3.5a1 1 0 011 1c0 1.25.2 2.46.57 3.58a1 1 0 01-.24 1.01l-2.2 2.2z"/>
            </svg>
            <span style="color:#fffff;">Kontak</span>
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
</style>
