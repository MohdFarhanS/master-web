<footer class="dashboard-footer">
  <div class="container">
      <div class="row">
          <div class="col-md-6 mb-3">
            <div style="font-size:2.1rem;font-weight:900;letter-spacing:1px;margin-bottom:20px;color:#fff;font-family:'Arial Black',Arial,sans-serif;text-transform:uppercase;">Info Kontak</div>
            <div style="color:#bfc4c9;font-size:1.15rem;margin-bottom:22px;line-height:1.7;">
              @if(isset($contactInfoFooter) && !empty($contactInfoFooter->alamat))
                {!! nl2br(e($contactInfoFooter->alamat)) !!}
              @else
                <span style='color:#888;'>Alamat belum tersedia</span>
              @endif
            </div>
            <div style="display:flex;align-items:center;margin-bottom:14px;">
              <span style="display:inline-flex;align-items:center;justify-content:center;width:32px;height:32px;background:#23272b;border-radius:8px;margin-right:12px;">
                <svg width="20" height="20" fill="#fff" viewBox="0 0 24 24"><path d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2a1 1 0 011.01-.24c1.12.37 2.33.57 3.58.57a1 1 0 011 1v3.5a1 1 0 01-1 1C7.61 22 2 16.39 2 9.5a1 1 0 011-1h3.5a1 1 0 011 1c0 1.25.2 2.46.57 3.58a1 1 0 01-.24 1.01l-2.2 2.2z"/></svg>
              </span>
              <span style="color:#bfc4c9;font-size:1.13rem;">
                @if(isset($contactInfoFooter) && !empty($contactInfoFooter->telp))
                  {{ $contactInfoFooter->telp }}
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
                @if(isset($contactInfoFooter) && !empty($contactInfoFooter->email))
                  {{ $contactInfoFooter->email }}
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
      <div class="text-center py-3" style="border-top:1px solid #454444ff;">Copyright © {{ date('Y') }} Badan Riset dan Inovasi Daerah Provinsi Riau</div>
  </div>

    <style>
    .dashboard-footer {
    background: #272727ff;
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
</footer>