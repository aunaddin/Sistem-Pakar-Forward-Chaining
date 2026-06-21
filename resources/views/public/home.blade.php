@extends('layouts.public')

@section('content')

<!-- HERO -->
<section class="hero">

    <div class="container">

        <div class="row align-items-center">

            <!-- TEXT -->
            <div class="col-lg-6">

                <h1 class="hero-title">

                    Sistem Pakar Penyakit
                    Tanaman Kopi Robusta

                </h1>

                <p class="hero-text">

                    Pakiro membantu mendeteksi penyakit
                    tanaman kopi robusta menggunakan
                    metode Forward Chaining berdasarkan
                    gejala yang dipilih pengguna.

                </p>

                <a href="/deteksi"
                   class="btn btn-coffee mt-3">

                    <i class="fas fa-stethoscope"></i>

                    Mulai Diagnosis

                </a>

            </div>

            <!-- IMAGE -->
            <div class="col-lg-6 text-center">

                <img src="{{ asset('images/kopi.jpeg') }}"
                     class="hero-image img-fluid"
                     alt="kopi">

            </div>

        </div>

    </div>

</section>

<!-- PENYAKIT -->
<section class="section">

    <div class="container">

        <h2 class="section-title">

            Daftar Penyakit

        </h2>

        <div class="row">

            @forelse($penyakit as $item)

            <div class="col-lg-3 col-md-6 mb-4">

                <div class="card disease-card h-100">

                    @if($item->gambar)

                        <img src="{{ asset('storage/' . $item->gambar) }}"
                             class="card-img-top">

                    @else

                        <img src="https://via.placeholder.com/300x200"
                             class="card-img-top">

                    @endif

                    <div class="card-body text-center">

                        <h5 class="fw-bold">

                            {{ $item->nama_penyakit }}

                        </h5>

                        <a href="/penyakit/{{ $item->id }}"
                           class="btn btn-coffee btn-sm mt-2">

                            Lihat Detail

                        </a>

                    </div>

                </div>

            </div>

            @empty

            <div class="col-12 text-center">

                <p>Belum ada data penyakit</p>

            </div>

            @endforelse

        </div>
        <div class="text-center mt-4">
            <a href="/penyakit" class="btn btn-coffee">
                Selengkapnya ->
            </a>
        </div>
    </div>

</section>

<!-- TENTANG -->
<section class="section bg-white">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-6">

                <img src="{{ asset('images/logo.png') }}"
                     class="img-fluid rounded shadow">

            </div>

            <div class="col-lg-6">

                <h2 class="section-title text-start">

                    Tentang Pakiro

                </h2>

                <p class="hero-text">

                    Pakiro adalah sistem pakar berbasis web
                    yang dirancang untuk membantu pengguna
                    mendeteksi penyakit tanaman kopi robusta.

                </p>

                <p class="hero-text">

                    Sistem ini menggunakan metode
                    Forward Chaining dengan basis aturan
                    berdasarkan gejala dan penyakit.

                </p>

            </div>

        </div>

    </div>

</section>

@endsection