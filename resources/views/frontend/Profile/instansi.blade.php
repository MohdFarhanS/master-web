@extends('layouts.app')
@section('content')
<section class="container py-5">
  <h2 class="section-title">PROFILE INSTANSI</h2>
  <div class="mb-5">
    <h4>Kata Pengantar</h4>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ini adalah kata pengantar dari pimpinan instansi.</p>
  </div>
  <div class="mb-5">
    <h4>Sejarah Singkat</h4>
    <p>Instansi ini berdiri sejak tahun XXXX dengan tujuan utama untuk memajukan riset dan inovasi di daerah.</p>
  </div>
  <div class="mb-5">
    <h4>Visi & Misi</h4>
    <p><strong>Visi:</strong> Menjadi lembaga riset unggulan di tingkat nasional.</p>
    <p><strong>Misi:</strong></p>
    <ul>
      <li>Mengembangkan inovasi daerah berbasis riset</li>
      <li>Mendukung kebijakan berbasis data dan kajian ilmiah</li>
    </ul>
  </div>
  <div class="mb-5">
    <h4>Tugas dan Fungsi</h4>
    <p>Instansi bertugas merumuskan kebijakan riset dan mengkoordinasikan program inovasi lintas sektor.</p>
  </div>
  <div class="mb-5">
    <h4>Struktur Organisasi</h4>
    <img src="{{ asset('images/struktur.jpg') }}" alt="Struktur Organisasi" class="img-fluid">
  </div>
</section>
<footer class="dashboard-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="footer-title">INFO KONTAK</div>
                <div class="footer-info">Jl. Cut Nyak Dien No. 5, Pekanbaru, Riau</div>
                <div class="footer-info">Email: info@riset.riau.go.id</div>
                <div class="footer-info">Telp: (0761) 123456</div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="footer-title">SOCIAL MEDIA</div>
                <div class="footer-social">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="text-center py-3" style="border-top:1px solid #444;">Copyright © {{ date('Y') }} Badan Riset dan Inovasi Daerah Provinsi Riau</div>
    </div>
</footer>
@endsection