@extends('layouts.public')

@section('content')

<section class="section"
         style="margin-top: 80px;">

    <div class="container">

        <div class="card border-0 shadow-lg rounded-4">

            <div class="card-body p-5">

                <!-- JUDUL -->
                <h2 class="fw-bold text-center mb-4"
                    style="color:#6F4E37;">

                    {{ $penyakit->nama_penyakit }}

                </h2>

                <!-- IMAGE -->
                <div class="d-flex justify-content-center mb-5">

                    <div class="image-card">

                        @if($penyakit->gambar)

                            <img src="{{ asset('storage/' . $penyakit->gambar) }}"
                                 class="detail-image">

                        @else

                            <img src="https://via.placeholder.com/500x300"
                                 class="detail-image">

                        @endif

                    </div>

                </div>

                <!-- DESKRIPSI -->
                <h5>Deskripsi</h5>

                <p class="text-muted">

                    {{ $penyakit->deskripsi }}

                </p>

                <hr>

                <!-- GEJALA -->
                <h5>Gejala</h5>

                <ul>

                    @forelse($penyakit->gejala as $item)

                        <li class="mb-2">

                            {{ $item->kode_gejala }}
                            -
                            {{ $item->nama_gejala }}

                        </li>

                    @empty

                        <li>Belum ada gejala</li>

                    @endforelse

                </ul>

                <hr>

                <!-- PENANGANAN -->
                <h5>Penanganan</h5>

                <p class="text-muted">

                    {{ $penyakit->penanganan }}

                </p>

                <!-- BUTTON -->
                <div class="text-center mt-4">

                    <a href="/deteksi"
                       class="btn btn-coffee">

                        <i class="fas fa-stethoscope"></i>

                        Diagnosis Sekarang

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

<style>

.image-card{

    width: 100%;
    max-width: 500px;
    border-radius: 20px;
    overflow: hidden;
    background: white;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

.detail-image{

    width: 100%;
    height: 320px;
    object-fit: cover;
    display: block;
}

@media(max-width: 768px){

    .detail-image{

        height: 220px;
    }

}

</style>

@endsection