<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Situs Resmi Instansi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body { 
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background-color: #f4f7f6; 
            color: #333;
            display: flex; /* Tambahkan ini */
            flex-direction: column; /* Tambahkan ini */
            min-height: 100vh; /* Tambahkan ini agar footer selalu di bawah */
            padding-top: 100px;
        }
        .main-content { 
            padding: 30px 20px; 
            max-width: 1200px; 
            margin: 20px auto; 
            background-color: #fff; 
            border-radius: 8px; 
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            flex-grow: 1; /* Tambahkan ini agar konten mengisi ruang kosong */
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 50px;
        }
        a { text-decoration: none; color: #007bff; }
        a:hover { text-decoration: underline; }

        .header-scrolled {
            padding: 10px 30px !important; /* Padding lebih kecil saat di-scroll */
            background-color: #f0f0f0 !important; /* Sedikit perubahan warna */
            box-shadow: 0 4px 10px rgba(0,0,0,0.2) !important; /* Bayangan lebih kuat */
        }

        .header-scrolled #header-logo {
            height: 40px !important; /* Logo mengecil */
        }

        .header-scrolled #header-title {
            font-size: 1.2em !important; /* Ukuran judul mengecil */
        }

        .header-scrolled #header-subtitle {
            font-size: 0.7em !important; /* Ukuran subjudul mengecil */
        }
        
        /* Ubah ukuran font untuk semua link di navigasi saat header discroll */
        .header-scrolled nav ul li a {
            font-size: 0.9em !important; /* Ukuran font menu mengecil */
        }
    </style>
    @yield('styles') {{-- Untuk CSS khusus halaman --}}
</head>
<body>
    @include('partials.header') {{-- Sertakan header di sini --}}

    <div class="main-content">  
        @yield('content') {{-- Konten halaman akan masuk di sini --}}
    </div>

    @include('partials.footer') {{-- SERTAKAN FOOTER DI SINI --}}

    @yield('scripts') {{-- Untuk JavaScript khusus halaman --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const header = document.getElementById('main-header');
            // Dapatkan tinggi awal header untuk perhitungan padding-top
            const initialHeaderHeight = header.offsetHeight;
            document.body.style.paddingTop = initialHeaderHeight + 'px'; // Set padding-top awal

            window.addEventListener('scroll', function() {
                if (window.scrollY > 50) { // Jika scroll lebih dari 50px
                    header.classList.add('header-scrolled');
                    // Sesuaikan padding-top body lagi jika header mengecil
                    // Anda bisa menghitung tinggi header saat discroll atau menggunakan nilai tetap
                    document.body.style.paddingTop = (header.offsetHeight || 70) + 'px'; // Gunakan tinggi baru atau perkiraan 70px
                } else {
                    header.classList.remove('header-scrolled');
                    // Kembalikan padding-top body ke tinggi awal header
                    document.body.style.paddingTop = initialHeaderHeight + 'px';
                }
            });
        });
    </script>
</body>
</html>