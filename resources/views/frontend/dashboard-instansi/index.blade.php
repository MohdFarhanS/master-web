@extends('layouts.app')

@section('content')
    <h1 style="color: #28a745; text-align: center; margin-bottom: 35px;">Dashboard Instansi</h1>

    @if($dashboardInstansis->isEmpty())
        <p style="text-align: center; color: #6c757d; font-style: italic; margin-top: 40px;">Belum ada instansi yang terdaftar saat ini.</p>
    @else
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 25px;">
            @foreach ($dashboardInstansis as $instansi)
                <div style="background-color: #e6ffe6; border: 1px solid #28a745; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.05); transition: transform 0.2s ease-in-out;">
                    @if(!is_null($instansi->file))
                        @if($instansi->file->exists() && $instansi->file->type == 'image')
                            <img src="{!! url($instansi->file->link_stream) !!}"
                                 alt="{!! $instansi->nama_instansi !!} Logo"
                                 style="width: 100%; height: 200px; object-fit: contain; padding: 10px; background-color: #ffffff; display: block;" />
                        @else
                            {{-- Placeholder jika file ada tapi tidak eksis atau bukan gambar --}}
                            <img src="{{ asset('images/placeholder-file-instansi.jpg') }}" alt="File Bukan Gambar"
                                 style="width: 100%; height: 200px; object-fit: contain; padding: 10px; background-color: #ffffff; display: block;" />
                        @endif
                    @else
                        {{-- Placeholder jika tidak ada relasi file sama sekali --}}
                        <img src="{{ asset('images/placeholder-instansi.jpg') }}" alt="Tidak Ada Logo"
                             style="width: 100%; height: 200px; object-fit: contain; padding: 10px; background-color: #ffffff; display: block;" />
                    @endif
                    <div style="padding: 15px; text-align: center;">
                        <h2 style="margin-top: 0; margin-bottom: 10px; color: #343a40; font-size: 1.5em;">{{ $instansi->nama_instansi }}</h2>
                        <a href="{{ route('frontend.dashboard-instansi.show', $instansi->id) }}" style="display: inline-block; margin-top: 10px; text-decoration: none; color: #28a745; font-weight: bold;">Lihat Detail</a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection