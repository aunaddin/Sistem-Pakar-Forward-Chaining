@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex align-items-center mb-4">
        <a href="{{ route('riwayat.index') }}" class="btn btn-outline-secondary me-3">
            <i class="fas fa-arrow-left"></i>
        </a>
        <h3 class="mb-0">Detail Riwayat Diagnosis</h3>
    </div>

    <div class="card mb-4">
        <div class="card-header">Data Pengguna</div>
        <div class="card-body">
            <table class="table table-borderless mb-0">
                <tr>
                    <th width="200">Nama Pasien</th>
                    <td>: {{ $riwayat->nama_pasien }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>: {{ $riwayat->alamat }}</td>
                </tr>
                <tr>
                    <th>Tanggal Diagnosis</th>
                    <td>: {{ $riwayat->created_at->format('d-m-Y H:i') }}</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="card">
        <div class="card-header">Hasil Diagnosis</div>
        <div class="card-body">

            @if($riwayat->penyakit)

                <h5 class="mb-3">{{ $riwayat->penyakit->nama_penyakit }}</h5>

                @if($riwayat->penyakit->gambar)
                    <img src="{{ asset('storage/' . $riwayat->penyakit->gambar) }}"
                         alt="{{ $riwayat->penyakit->nama_penyakit }}"
                         class="img-fluid rounded mb-3"
                         style="max-height: 300px;">
                @endif

                <h6 class="fw-semibold">Deskripsi</h6>
                <p stl>{{ $riwayat->penyakit->deskripsi }}</p>

                <h6 class="fw-semibold">Penanganan</h6>
                <p>{{ $riwayat->penyakit->penanganan }}</p>

            @else
                <span class="text-danger">Data penyakit tidak ditemukan</span>
            @endif

        </div>
    </div>

</div>

@endsection