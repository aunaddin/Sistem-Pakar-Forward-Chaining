@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="card shadow border-0 rounded-4">

        <div class="card-header bg-warning">

            <h4 class="mb-0">

                Edit Penyakit

            </h4>

        </div>

        <div class="card-body">

            <form action="{{ route('penyakit.update', $penyakit->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <!-- KODE -->
                <div class="mb-3">

                    <label>Kode Penyakit</label>

                    <input type="text"
                           name="kode_penyakit"
                           class="form-control"
                           value="{{ $penyakit->kode_penyakit }}"
                           required>

                </div>

                <!-- NAMA -->
                <div class="mb-3">

                    <label>Nama Penyakit</label>

                    <input type="text"
                           name="nama_penyakit"
                           class="form-control"
                           value="{{ $penyakit->nama_penyakit }}"
                           required>

                </div>

                <!-- DESKRIPSI -->
                <div class="mb-3">

                    <label>Deskripsi</label>

                    <textarea name="deskripsi"
                              rows="5"
                              class="form-control"
                              required>{{ $penyakit->deskripsi }}</textarea>

                </div>

                <!-- PENANGANAN -->
                <div class="mb-3">

                    <label>Penanganan</label>

                    <textarea name="penanganan"
                              rows="5"
                              class="form-control"
                              required>{{ $penyakit->penanganan }}</textarea>

                </div>

                <!-- GAMBAR LAMA -->
                <div class="mb-3">

                    <label>Gambar Saat Ini</label>

                    <br>

                    @if($penyakit->gambar)

                        <img src="{{ asset('storage/' . $penyakit->gambar) }}"
                             width="200"
                             class="rounded shadow">

                    @else

                        <p>Tidak ada gambar</p>

                    @endif

                </div>

                <!-- GAMBAR BARU -->
                <div class="mb-3">

                    <label>Upload Gambar Baru</label>

                    <input type="file"
                           name="gambar"
                           class="form-control">

                </div>

                <!-- BUTTON -->
                <button type="submit"
                        class="btn btn-warning">

                    <i class="fas fa-save"></i>

                    Update

                </button>

                <a href="/admin/penyakit"
                   class="btn btn-secondary">

                    Kembali

                </a>

            </form>

        </div>

    </div>

</div>

@endsection