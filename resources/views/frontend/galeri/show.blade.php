@extends('layouts.app')

@section('content')
    <h1 style="color: #007bff; text-align: center; margin-bottom: 30px;">Detail Kegiatan</h1>

    <div style="margin-bottom: 15px;">
        <strong style="color: #495057; display: inline-block; width: 120px;">Nama Kegiatan:</strong> <span>{{ $galeri->nama_kegiatan }}</span>
    </div>

    <div style="text-align: center; margin-top: 20px;">
        <h3>Foto Kegiatan</h3>
        @if(!is_null($galeri->file))
            @if($galeri->file->exists() && $galeri->file->type == 'image')
                <img src="{!! url($galeri->file->link_stream) !!}" alt="{!! $galeri->file->name !!}" style="max-width: 80%; height: auto; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);" />
            @else
                <p>File ini bukan gambar atau tidak dapat ditampilkan.</p>
            @endif
        @else
            <p>Tidak ada foto kegiatan.</p>
        @endif
    </div>

    <a href="{{ route('frontend.galeri.index') }}" style="display: block; text-align: center; margin-top: 30px; text-decoration: none; color: #007bff; font-weight: bold; padding: 10px 20px; border: 1px solid #007bff; border-radius: 5px; transition: background-color 0.2s, color 0.2s;">Kembali ke Daftar Kegiatan</a>
@endsection