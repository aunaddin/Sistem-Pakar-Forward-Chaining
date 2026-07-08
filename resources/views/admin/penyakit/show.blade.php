@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="card">

        <div class="card-header d-flex align-items-center">
            <a href="{{ route('penyakit.index') }}" class="btn btn-outline-secondary btn-sm me-3">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h3 class="mb-0">Detail Penyakit</h3>
        </div>

        <div class="card-body">

            <h4 class="mb-3">{{ $penyakit->nama_penyakit }}</h4>

            @if($penyakit->gambar)
                <img src="{{ asset('storage/' . $penyakit->gambar) }}"
                     alt="{{ $penyakit->nama_penyakit }}"
                     class="img-fluid rounded mb-4"
                     style="max-height: 300px;">
            @endif

            <h6 class="fw-semibold">Deskripsi</h6>
            <p style="white-space: pre-wrap;">{{ $penyakit->deskripsi ?: '-' }}</p>

            <h6 class="fw-semibold">Solusi / Penanganan</h6>
            <p style="white-space: pre-wrap;">{{ $penyakit->penanganan ?: '-' }}</p>

        </div>

    </div>

</div>

@endsection