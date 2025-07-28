<header id="main-header" style="background-color: #ffffff; padding: 15px 30px; border-bottom: 1px solid #e0e0e0; display: flex; align-items: center; justify-content: space-between; box-shadow: 0 2px 5px rgba(0,0,0,0.05);
               position: fixed; top: 0; width: 100%; z-index: 1000; box-sizing: border-box; transition: padding 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;"> {{-- TAMBAHKAN ID DAN TRANSITION --}}
    <div style="display: flex; align-items: center;">
        {{-- Logo Instansi --}}
        @if(isset($instansiHeader))
            @if(!is_null($instansiHeader->file))
                @if($instansiHeader->file->exists() && $instansiHeader->file->type == 'image')
                    <img id="header-logo" src="{!! url($instansiHeader->file->link_stream) !!}" 
                         alt="{{ $instansiHeader->nama_instansi ?? 'Logo Instansi' }} Logo"
                         style="height: 60px; width: auto; object-fit: contain; margin-right: 15px; transition: height 0.3s ease;">  
                @else
                    <img id="header-logo" src="{{ asset('images/default_logo.png') }}" alt="Default Logo" 
                         style="height: 60px; width: auto; object-fit: contain; margin-right: 15px; transition: height 0.3s ease;"> 
                @endif
            @else
                <img id="header-logo" src="{{ asset('images/default_logo.png') }}" alt="Default Logo"
                     style="height: 60px; width: auto; object-fit: contain; margin-right: 15px; transition: height 0.3s ease;"> 
            @endif
        @else
            <img id="header-logo" src="{{ asset('images/default_logo.png') }}" alt="Default Logo" 
                 style="height: 60px; width: auto; object-fit: contain; margin-right: 15px; transition: height 0.3s ease;"> 
        @endif

        {{-- Nama Instansi --}}
        <h1 id="header-title" style="margin: 0; font-size: 1.5em; color: #333; line-height: 1.3; transition: font-size 0.3s ease;"> 
            <span style="white-space: nowrap;">{{ $instansiHeader->nama_instansi ?? 'Nama Instansi Default' }}</span>
        </h1>
    </div>

    {{-- Navigasi Menu --}}
    <nav>
        <ul style="list-style: none; margin: 0; padding: 0; display: flex; gap: 20px;">
            <li><a href="{{ route('frontend.dashboard-instansi.index') }}" style="text-decoration: none; color: #555; font-weight: bold; font-size: 1em; white-space: nowrap; transition: font-size 0.3s ease, color 0.3s ease;">BERANDA</a></li> 
            <li style="position: relative;">
                <a href="#" style="text-decoration: none; color: #555; font-weight: bold; font-size: 1em; white-space: nowrap; transition: font-size 0.3s ease, color 0.3s ease;">PROFILE <i class="fas fa-caret-down" style="font-size: 0.8em; margin-left: 5px;"></i></a>
            </li>
            <li><a href="#" style="text-decoration: none; color: #555; font-weight: bold; font-size: 1em; white-space: nowrap; transition: font-size 0.3s ease, color 0.3s ease;">BERITA</a></li>
            <li><a href="{{ route('frontend.galeri.index') }}" style="text-decoration: none; color: #555; font-weight: bold; font-size: 1em; white-space: nowrap; transition: font-size 0.3s ease, color 0.3s ease;">GALERI</a></li>
            <li><a href="#" style="text-decoration: none; color: #555; font-weight: bold; font-size: 1em; white-space: nowrap; transition: font-size 0.3s ease, color 0.3s ease;"><i class="fas fa-phone-alt" style="margin-right: 5px;"></i>KONTAK</a></li>
        </ul>
    </nav>
</header>