@extends('layouts.app')
@section('content')
<style>
.galeri-header-bg {
   background: linear-gradient(135deg, #e4ebffff 0%, #002affff 100%);
    color: white;
    padding: 60px 0 40px 0;
    text-align: center;
    margin-bottom: 40px;
}
.galeri-header-title {
  font-size: 2.4rem;
  font-weight: 700;
  color: #232323;
  letter-spacing: 2px;
  margin: 0;
  line-height: 1.1;
}
.galeri-img-card {
  background: #fff;
  border-radius: 12px;
  box-shadow: 0 2px 12px rgba(0,0,0,0.07);
  padding: 17px;
  margin-bottom: 24px;
  border: 1.5px solid #f3f3f3;
  text-align: center;
  transition: box-shadow 0.2s;
  display: flex;
  flex-direction: column;
  align-items: center;
}
.galeri-img-card:hover {
  box-shadow: 0 6px 24px rgba(0,0,0,0.13);
}
.galeri-img-hoverbox {
  position: relative;
  width: 100%;
  height: 300px; 
  border-radius: 14px;
  overflow: hidden;
  cursor: pointer;
  display: flex;
  justify-content: center;
  align-items: center;
}
.galeri-img-hoverbox img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  border-radius: 16px;
  transition: filter 0.3s;
}
.galeri-img-hoverbox .galeri-hover-overlay {
  position: absolute;
  top: 0; left: 0; right: 0; bottom: 0;
  background: #232323;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  opacity: 0;
  pointer-events: none;
  border-radius: 16px;
  transition: opacity 0.25s;
  z-index: 2;
}
.galeri-img-hoverbox .galeri-hover-title {
  color: #0066ffff; 
  font-size: 1.1rem;
  font-family: Arial, sans-serif;
  font-weight; 
  margin-bottom: 10px;
  text-align: center;
  padding: 0 10px;
}
.galeri-img-hoverbox .galeri-hover-link {
  color: #fff;
  font-size: 1.6rem;
  font-family: Arial, sans-serif;
  font-weight: bold;
  text-align: center;
  text-decoration: none;
  margin-top: 8px;
  letter-spacing: 1px;
  transition: color 0.2s;
}
.galeri-img-hoverbox .galeri-hover-link:hover {
  color: rgba(255, 255, 255, 1);
}
.galeri-img-hoverbox:hover img,
.galeri-img-hoverbox.active img {
  filter: blur(2.5px) brightness(0.7);
}
.galeri-img-hoverbox:hover .galeri-hover-overlay,
.galeri-img-hoverbox.active .galeri-hover-overlay {
  opacity: 1;
  pointer-events: auto;
}
@media (hover: none) {
  .galeri-img-hoverbox:active img,
  .galeri-img-hoverbox.active img {
    filter: blur(2.5px) brightness(0.7);
  }
  .galeri-img-hoverbox:active .galeri-hover-overlay,
  .galeri-img-hoverbox.active .galeri-hover-overlay {
    opacity: 1;
    pointer-events: auto;
  }
}
.galeri-modal-overlay {
  position: fixed;
  top: 0; left: 0; right: 0; bottom: 0;
  background: rgba(0,0,0,0.7);
  z-index: 9999;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: opacity 0.2s;
}
.galeri-modal-content {
  background: #232323;
  border-radius: 28px;
  padding: 32px 24px 24px 24px;
  color: #fff;
  min-width: 320px;
  min-height: 220px;
  max-width: 90vw;
  max-height: 90vh;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  box-shadow: 0 8px 32px rgba(0,0,0,0.18);
  position: relative;
}

.galeri-modal-close {
  position: absolute;
  top: 12px;
  right: 18px;
  font-size: 2rem;
  color: #fff;
  background: none;
  border: none;
  cursor: pointer;
  opacity: 0.7;
  transition: opacity 0.2s;
  z-index: 2;
}
.galeri-modal-close:hover { opacity: 1; }
</style>
<div class="galeri-header-bg">
  <div class="galeri-header-title">GALERI</div>
</div>
<section class="container py-5">
  <div class="row">
    @forelse($galeri ?? [] as $foto)
      @if(is_object($foto) && isset($foto->file) && is_object($foto->file) && isset($foto->file->link_stream))
        <div class="col-md-3 col-sm-6 mb-3">
          <div class="galeri-img-card">
            <div class="galeri-img-hoverbox" tabindex="0"
              ontouchstart="this.classList.add('active')"
              ontouchend="this.classList.remove('active')"
              onmouseleave="this.classList.remove('active')">
              <img src="{{ $foto->file->link_stream }}" alt="Foto Galeri">
              <div class="galeri-hover-overlay">
                <div class="galeri-hover-title">
                  {{ $foto->nama_kegiatan ?? $foto->caption ?? '-' }}
                </div>
                <a href="#" class="galeri-hover-link" onclick="showGaleriModal(event, '{{ addslashes($foto->nama_kegiatan ?? $foto->caption ?? '-') }}', '{{ addslashes($foto->file->link_stream) }}')">LIHAT SELENGKAPNYA</a>
              </div>
            </div>
          </div>
        </div>
      @endif
    @empty
      <div class="col-12 galeri-empty">Belum ada foto galeri.</div>
    @endforelse
  </div>
</section>
<div id="galeriModal" class="galeri-modal-overlay" style="display:none;">
  <div class="galeri-modal-content">
    <button class="galeri-modal-close" onclick="closeGaleriModal()">&times;</button>
    <div id="galeriModalTitle" class="galeri-modal-title"></div>
    <img id="galeriModalImg" src="" alt="Galeri" style="width:100%;max-width:520px;max-height:60vh;object-fit:contain;border-radius:18px;">
  </div>
</div>
<script>
function showGaleriModal(e, title, imgSrc) {
  e.preventDefault();
  document.getElementById('galeriModal').style.display = 'flex';
  document.getElementById('galeriModalImg').src = imgSrc;
}
function closeGaleriModal() {
  document.getElementById('galeriModal').style.display = 'none';
}
document.addEventListener('keydown', function(e) {
  if(e.key === 'Escape') closeGaleriModal();
});
document.getElementById('galeriModal').addEventListener('click', function(e) {
  if(e.target === this) closeGaleriModal();
});
</script>
@endsection