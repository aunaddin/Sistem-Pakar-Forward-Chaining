@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="card">

        <div class="card-header d-flex align-items-center">
            <a href="{{ route('penyakit.index') }}" class="btn btn-outline-secondary btn-sm me-3">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h3 class="mb-0">Tambah Penyakit</h3>
        </div>

        <div class="card-body">

            <form action="{{ route('penyakit.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="mb-3">
                    <label>Kode Penyakit</label>

                    <input type="text"
                           name="kode_penyakit"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label>Nama Penyakit</label>

                    <input type="text"
                           name="nama_penyakit"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label>Deskripsi</label>

                    <textarea name="deskripsi"
                              class="form-control"
                              rows="5"></textarea>
                </div>

                <div class="mb-3">

                    <label>Penanganan</label>

                    <textarea name="penanganan"
                            class="form-control"
                            rows="5"></textarea>

                </div>
                
                <div class="mb-3">
                    <label>Gambar</label>

                    <input type="file"
                           name="gambar"
                           class="form-control">
                </div>

                <button class="btn btn-primary">
                    Simpan
                </button>

            </form>

        </div>

    </div>

</div>

@endsection