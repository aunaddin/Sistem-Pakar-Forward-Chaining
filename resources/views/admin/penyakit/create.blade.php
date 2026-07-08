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
            {{-- ERROR --}}
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle me-1"></i> {{ $errors->first() }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            <p class="text-muted mb-3">
                <span class="text-danger">*</span> = Wajib diisi
            </p>


            <form action="{{ route('penyakit.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="mb-3">
                    <label>Kode Penyakit <span class="text-danger">*</span></label>

                    <input type="text"
                        name="kode_penyakit"
                        class="form-control"
                        required>

                    @if ($lastPenyakit)
                        <small class="form-text text-muted">
                            Kode terakhir digunakan: <strong>{{ $lastPenyakit->kode_penyakit }}</strong>
                        </small>
                    @else
                        <small class="form-text text-muted">
                            Belum ada kode penyakit yang tersimpan.
                        </small>
                    @endif
                </div>

                <div class="mb-3">
                    <label>Nama Penyakit <span class="text-danger">*</span></label>

                    <input type="text"
                           name="nama_penyakit"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label>Deskripsi <span class="text-danger">*</span></label>

                    <textarea name="deskripsi"
                              class="form-control"
                              rows="5"
                              required></textarea>
                </div>

                <div class="mb-3">

                    <label>Penanganan <span class="text-danger">*</span></label>

                    <textarea name="penanganan"
                            class="form-control"
                            rows="5"
                            required></textarea>

                </div>
                
                <div class="mb-3">
                    <label>Gambar <span class="text-danger">*</span></label>

                    <input type="file"
                        name="gambar"
                        class="form-control"
                        accept="image/*"
                        required>

                    <small class="form-text text-muted">
                        Format: JPG, PNG. Maksimal ukuran file 2MB.
                    </small>
                </div>

                <button class="btn btn-primary"
                 onclick=" return confirm( 'Yakin ingin menambahkan data ini?')">
                    Simpan
                </button>

            </form>

        </div>

    </div>

</div>

@endsection