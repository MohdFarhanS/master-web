@extends('layouts.app')

@section('styles')
    {{-- Tambahkan CSS khusus untuk halaman galeri di sini --}}
    <style>
        .galeri-section {
            padding: 30px 0;
            background-color: #f8f9fa;
        }

        .galeri-grid-container {
            max-width: 1200px; /* Batasi lebar container agar gambar tidak terlalu lebar */
            margin: 0 auto;
            padding: 0 15px;
        }

        .galeri-heading {
            color: #333; /* Warna gelap untuk judul seperti di gambar */
            text-align: center;
            margin-bottom: 40px;
            font-size: 2.5em;
            font-weight: bold;
            letter-spacing: 2px; /* Sedikit spasi antar huruf agar terlihat lebih "GALERI" */
        }

        .galeri-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr); /* 4 kolom yang sama lebar */
            gap: 20px; /* Jarak antar gambar seperti di contoh */
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .galeri-item {
            background-color: #ffffff;
            border: 1px solid #ddd; /* Border tipis seperti di gambar */
            border-radius: 5px; /* Sedikit melengkung di sudut */
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1); /* Bayangan yang halus */
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .galeri-item:hover {
            transform: translateY(-3px); /* Efek naik sedikit saat hover */
            box-shadow: 0 4px 10px rgba(0,0,0,0.15); /* Bayangan sedikit lebih gelap saat hover */
        }

        .galeri-image-wrapper {
            width: 100%;
            padding-top: 75%; /* Rasio aspek 4:3 untuk gambar */
            position: relative;
            overflow: hidden;
        }

        .galeri-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7); /* Overlay hitam semi-transparan */
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center; /* Teks dan link di bagian bawah */
            align-items: center;
            padding: 15px;
            box-sizing: border-box;
            text-align: center;
            opacity: 0; /* Awalnya tidak terlihat */
            transition: opacity 0.3s ease-in-out;
        }

        .galeri-item:hover .galeri-overlay {
            opacity: 1; /* Muncul saat dihover */
        }

        .galeri-overlay-title {
            font-size: 1.2em;
            font-weight: bold;
            margin: 0 0 10px 0;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.8); /* Efek bayangan pada teks */
            word-break: break-word; /* Mencegah teks panjang keluar dari batas */
            padding: 0 5px;
        }

        .galeri-overlay-link {
            display: inline-block;
            padding: 8px 15px;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 0.9em;
            transition: background-color 0.3s ease;
            margin-top: 0;
        }

        .galeri-overlay-link:hover {
            background-color: #0056b3;
        }

        .galeri-image-wrapper img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover; /* Gambar akan mengisi area, bisa terpotong */
        }

        .galeri-content {
            padding: 10px; /* Padding lebih kecil untuk konten di bawah gambar */
            flex-grow: 1;
            text-align: center;
        }

        .galeri-title {
            font-size: 1em; /* Ukuran font lebih kecil seperti di contoh */
            font-weight: normal; /* Tidak terlalu tebal */
            color: #333;
            margin-bottom: 5px; /* Jarak lebih kecil */
            line-height: 1.3;
        }

        .galeri-link {
            display: none; /* Sembunyikan link "Lihat Detail" jika tidak ada di contoh gambar */
            /* Jika ingin menampilkan, atur display: inline-block; */
            margin-top: 5px;
            padding: 5px 10px;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 3px;
            font-size: 0.8em;
        }

        /* Media Queries untuk Responsif (sesuaikan agar tetap 4 kolom di layar besar) */
        @media (min-width: 992px) { /* Untuk layar desktop besar (misal > 992px) */
            .galeri-grid {
                grid-template-columns: repeat(4, 1fr); /* Tetap 4 kolom */
            }
        }

        @media (max-width: 991px) { /* Untuk layar yang lebih kecil dari desktop besar, mungkin tablet landscape */
            .galeri-grid {
                grid-template-columns: repeat(3, 1fr); /* Ubah jadi 3 kolom */
                gap: 15px;
            }
        }

        @media (max-width: 767px) { /* Untuk tablet portrait dan layar lebih kecil */
            .galeri-grid {
                grid-template-columns: repeat(2, 1fr); /* Ubah jadi 2 kolom */
                gap: 10px;
            }
            .galeri-heading {
                font-size: 2em;
            }
        }

        @media (max-width: 480px) { /* Untuk ponsel */
            .galeri-grid {
                grid-template-columns: 1fr; /* Ubah jadi 1 kolom */
                gap: 10px;
            }
            .galeri-heading {
                font-size: 1.8em;
            }
        }
    </style>
@endsection

@section('content')
    <section class="galeri-section">
        <div class="galeri-grid-container">
            <h1 class="galeri-heading">GALERI</h1> {{-- Mengganti "KEGIATAN" agar sesuai gambar --}}

            @if($galeris->isEmpty())
                <p class="no-galeri-data">Belum ada kegiatan yang terdaftar saat ini.</p>
            @else
                <div class="galeri-grid">
                    @foreach ($galeris as $galeri)
                        <div class="galeri-item">
                            <div class="galeri-image-wrapper">
                                @if(!is_null($galeri->file))
                                    @if($galeri->file->exists() && $galeri->file->type == 'image')
                                        <img src="{!! url($galeri->file->link_stream) !!}"
                                            alt="{!! $galeri->nama_kegiatan !!}" />
                                    @else
                                        <img src="{{ asset('images/placeholder-file.jpg') }}"
                                            alt="File bukan gambar" />
                                    @endif
                                @else
                                    <img src="{{ asset('images/placeholder.jpg') }}"
                                        alt="Tidak ada gambar" />
                                @endif
                                <div class="galeri-overlay">
                                    <h3 class="galeri-overlay-title">{{ $galeri->nama_kegiatan }}</h3>
                                    <a href="{{ route('frontend.galeri.show', $galeri->id) }}" class="galeri-overlay-link">LIHAT SELENGKAPNYA</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection