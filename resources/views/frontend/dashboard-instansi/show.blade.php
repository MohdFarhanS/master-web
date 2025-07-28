@extends('layouts.app')

@section('content')
    <h1 style="color: #28a745; text-align: center; margin-bottom: 30px;">Detail Instansi</h1>

    <div style="margin-bottom: 15px;">
        <strong style="color: #495057; display: inline-block; width: 150px;">Nama Instansi:</strong> <span>{{ $dashboardInstansi->nama_instansi }}</span>
    </div>

    <div style="text-align: center; margin-top: 20px;">
        <h3>Logo Instansi</h3>
        @if(!is_null($dashboardInstansi->file))
            @if($dashboardInstansi->file->exists() && $dashboardInstansi->file->type == 'image')
                <img src="{!! url($dashboardInstansi->file->link_stream) !!}" alt="{!! $dashboardInstansi->file->name !!}" style="max-width: 80%; height: auto; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);" />
            @else
                <p>File ini bukan gambar atau tidak dapat ditampilkan.</p>
            @endif
        @else
            <p>Tidak ada logo instansi.</p>
        @endif
    </div>

    <a href="{{ route('frontend.dashboard-instansi.index') }}" style="display: block; text-align: center; margin-top: 30px; text-decoration: none; color: #28a745; font-weight: bold; padding: 10px 20px; border: 1px solid #28a745; border-radius: 5px; transition: background-color 0.2s, color 0.2s;">Kembali ke Daftar Instansi</a>
@endsection