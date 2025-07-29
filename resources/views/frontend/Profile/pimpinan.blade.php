@extends('layouts.app')
@section('content')
<section class="container py-5">
  <h2 class="section-title text-center mb-5 text-orange" style="font-weight:700;letter-spacing:2px;">PROFIL PIMPINAN</h2>
  <div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
      <div class="card shadow-lg border-0 p-4 text-center" style="border-radius:18px;">
        @if(isset($profilePimpinan[0]))
          @if(isset($profilePimpinan[0]->file) && isset($profilePimpinan[0]->file->link_stream))
            <img src="{{ $profilePimpinan[0]->file->link_stream }}" alt="Foto Pimpinan" class="rounded-circle mb-3 shadow" style="width:140px;height:140px;object-fit:cover;">
          @else
            <img src="https://ui-avatars.com/api/?name={{ urlencode($profilePimpinan[0]->nama ?? 'Pimpinan') }}&size=140" alt="Foto Pimpinan" class="rounded-circle mb-3 shadow" style="width:140px;height:140px;object-fit:cover;">
          @endif
          <h4 class="fw-bold mb-1">{{ $profilePimpinan[0]->nama ?? '-' }}</h4>
          <div class="text-muted mb-2">{{ $profilePimpinan[0]->jabatan ?? '-' }}</div>
          @if(!empty($profilePimpinan[0]->deskripsi))
            <div class="mt-3 text-start small text-secondary">{!! nl2br(e($profilePimpinan[0]->deskripsi)) !!}</div>
          @endif
        @else
          <div class="text-muted">Belum ada data pimpinan.</div>
        @endif
      </div>
    </div>
  </div>
</section>
@endsection