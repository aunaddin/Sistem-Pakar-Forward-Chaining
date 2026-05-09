@extends('layouts.public')

@section('content')

<section class="section"
         style="margin-top: 80px;">

    <div class="container">

        <h2 class="section-title">

            Daftar Penyakit Kopi Robusta

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
                           class="btn btn-coffee mt-2">

                            Lihat Detail

                        </a>

                    </div>

                </div>

            </div>

            @empty

            <div class="col-12 text-center">

                <p>Data penyakit kosong</p>

            </div>

            @endforelse

        </div>

    </div>

</section>

@endsection