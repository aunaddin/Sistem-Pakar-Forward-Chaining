@extends('layouts.public')

@section('content')

<section class="section"
         style="margin-top: 80px;">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-10">

                <div class="card border-0 shadow-lg rounded-4">

                    <div class="card-body p-5">

                        <!-- BADGE -->
                        <div class="text-center mb-3">

                            <span class="badge bg-success px-4 py-2">

                                Tingkat Kecocokan
                                {{ number_format($persentaseTertinggi, 0) }}%

                            </span>

                        </div>

                        <!-- JUDUL -->
                        <h2 class="fw-bold text-center mb-4"
                            style="color:#6F4E37;">

                            {{ $hasilPenyakit->nama_penyakit ?? 'Tidak Ditemukan' }}

                        </h2>

                        <!-- IMAGE -->
                        <div class="d-flex justify-content-center mb-5">

                            <div class="image-card">

                                @if($hasilPenyakit && $hasilPenyakit->gambar)

                                    <img src="{{ asset('storage/' . $hasilPenyakit->gambar) }}"
                                         class="hasil-image">

                                @else

                                    <img src="https://via.placeholder.com/500x300"
                                         class="hasil-image">

                                @endif

                            </div>

                        </div>

                        <!-- DESKRIPSI -->
                        <h5>Deskripsi</h5>

                        <p class="text-muted">

                            {{ $hasilPenyakit->deskripsi ?? '-' }}

                        </p>

                        <hr>

                        <!-- DATA USER -->
                        <h5 class="mb-3">

                            Data Pengguna

                        </h5>

                        <table class="table">

                            <tr>

                                <th width="150">Nama</th>

                                <td>{{ $diagnosa->nama_pasien }}</td>

                            </tr>

                            <tr>

                                <th>Alamat</th>

                                <td>{{ $diagnosa->alamat }}</td>

                            </tr>

                        </table>

                        <hr>

                        <!-- GEJALA -->
                        <h5 class="mb-3">

                            Gejala Dipilih

                        </h5>

                        <div class="mb-4">

                            @foreach($gejalaUser as $item)

                                <span class="badge bg-secondary p-2 mb-2">

                                    {{ $item->kode_gejala }}
                                    -
                                    {{ $item->nama_gejala }}

                                </span>

                            @endforeach

                        </div>

                        <hr>

                        <!-- PENANGANAN -->
                        <h5 class="mb-3">

                            Penanganan

                        </h5>

                        <p class="text-muted">

                            {{ $hasilPenyakit->penanganan ?? '-' }}

                        </p>

                        <!-- BUTTON -->
                        <div class="text-center mt-4">

                            <a href="{{ route('deteksi.pdf', $diagnosa->id) }}"
                               class="btn btn-danger me-2">

                                <i class="fas fa-file-pdf"></i>

                                Download PDF

                            </a>

                            <a href="/deteksi"
                               class="btn btn-coffee">

                                <i class="fas fa-redo"></i>

                                Diagnosis Lagi

                            </a>

                        </div>

                    </div>

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

.hasil-image{

    width: 100%;
    height: 320px;
    object-fit: cover;
    display: block;
}

@media(max-width: 768px){

    .hasil-image{

        height: 220px;
    }

}

</style>

@endsection