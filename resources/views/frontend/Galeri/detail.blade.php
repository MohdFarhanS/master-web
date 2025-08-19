@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">{{ $foto->judul ?? 'Detail Galeri' }}</h1>
            <div class="text-center my-4">
                <img src="{{ $foto->file->link_stream }}" alt="{{ $foto->judul ?? 'Galeri' }}" class="img-fluid" style="border-radius: 8px; max-height: 500px;">
            </div>
            <div class="text-center">
                <p>{{ $foto->deskripsi ?? 'Tidak ada deskripsi tersedia.' }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
