@extends('layouts.app')
@section('content')
<style>
  .kontak-header-bg {
    background: #fdf1f1;
    padding: 48px 0 24px 0;
    margin-bottom: 0;
    text-align: center;
  }
  .kontak-header-title {
    font-family: 'Montserrat', 'Arial Black', Arial, sans-serif;
    font-size: 3rem;
    font-weight: 900;
    color: #191919;
    letter-spacing: 1px;
    margin-bottom: 0;
  }
  .kontak-card {
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.07);
    padding: 32px 24px 28px 24px;
    margin-bottom: 24px;
    min-height: 340px;
  }
  .kontak-label {
    font-weight: 600;
    margin-bottom: 6px;
    color: #222;
    font-size: 1.08rem;
  }
  .kontak-btn {
    background: #3a44e8;
    color: #fff;
    font-size: 1.1rem;
    font-weight: 600;
    border-radius: 6px;
    width: 100%;
    padding: 12px 0;
    margin-top: 12px;
    border: none;
    transition: background 0.2s;
  }
  .kontak-btn:hover {
    background: #2323b0;
  }
  .kontak-info-title {
    font-size: 2rem;
    font-weight: 700;
    color: #191919;
    text-align: center;
    margin-bottom: 18px;
  }
  .kontak-info-list {
    font-size: 1.08rem;
    color: #222;
    margin-bottom: 18px;
    line-height: 1.7;
  }
  .kontak-info-label {
    font-weight: 600;
    color: #222;
    margin-bottom: 2px;
    min-width: 90px;
    display: inline-block;
  }
  .kontak-sosmed {
    margin-top: 18px;
    font-weight: 700;
    color: #222;
  }
  .kontak-sosmed a {
    display: inline-block;
    margin-right: 12px;
    font-size: 1.3rem;
    color: #3a44e8;
    transition: color 0.2s;
  }
  .kontak-sosmed a:hover {
    color: #ff4c00;
  }
</style>
<div class="kontak-header-bg">
  <div class="kontak-header-title">KONTAK</div>
</div>
<section class="container" style="margin-top:60px;">
  <div class="row justify-content-center align-items-start">
    <div class="col-md-5 mb-4">
      <div class="kontak-card h-100">
        <div class="kontak-info-title" style="text-align:left;margin-bottom:24px;">Hubungi Kami</div>
        <form>
          <div class="mb-3">
            <label class="kontak-label">Nama</label>
            <input type="text" class="form-control" placeholder="Nama">
          </div>
          <div class="mb-3">
            <label class="kontak-label">Email</label>
            <input type="email" class="form-control" placeholder="Email">
          </div>
          <div class="mb-3">
            <label class="kontak-label">Pesan</label>
            <textarea class="form-control" rows="5" placeholder="Pesan"></textarea>
          </div>
          <button type="submit" class="kontak-btn">Kirim Pesan</button>
        </form>
      </div>
    </div>
    <div class="col-md-5 mb-4">
      <div class="kontak-card h-100">
        <div class="kontak-info-title" style="text-align:left;margin-bottom:24px;">Informasi Kontak</div>
        <div class="kontak-info-list">
          <div><span class="kontak-info-label">Alamat&nbsp;:</span> {{ $kontak->alamat }}</div>
          <div><span class="kontak-info-label">Telepon&nbsp;:</span> {{ $kontak->telp }}</div>
          <div><span class="kontak-info-label">Email&nbsp;:</span> {{ $kontak->email }}</div>
        </div>
        <div class="kontak-sosmed">
          Ikuti Kami<br>
          <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
          <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
          <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
          <a href="#" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
@endsection