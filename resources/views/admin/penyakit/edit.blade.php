@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="card shadow border-0 rounded-4">

        <div class="card-header d-flex align-items-center">
            <a href="{{ route('penyakit.index') }}" class="btn btn-outline-secondary btn-sm me-3">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h3 class="mb-0">Edit Penyakit</h3>
        </div>

        <div class="card-body">
            {{-- ERROR --}}
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle me-1"></i> {{ $errors->first() }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- SUCCESS --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <p class="text-muted mb-3">
                <span class="text-danger">*</span> = Wajib diisi
            </p>

            <form action="{{ route('penyakit.update', $penyakit->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <!-- KODE -->
                <div class="mb-3">

                    <label>Kode Penyakit <span class="text-danger">*</span></label>

                    <input type="text"
                           name="kode_penyakit"
                           class="form-control"
                           value="{{ $penyakit->kode_penyakit }}"
                           required>

                </div>

                <!-- NAMA -->
                <div class="mb-3">

                    <label>Nama Penyakit <span class="text-danger">*</span></label>

                    <input type="text"
                           name="nama_penyakit"
                           class="form-control"
                           value="{{ $penyakit->nama_penyakit }}"
                           required>

                </div>

                <!-- DESKRIPSI -->
                <div class="mb-3">

                    <label>Deskripsi <span class="text-danger">*</span></label>

                    <textarea name="deskripsi"
                              rows="5"
                              class="form-control"
                              required>{{ $penyakit->deskripsi }}</textarea>

                </div>

                <!-- PENANGANAN -->
                <div class="mb-3">

                    <label>Penanganan <span class="text-danger">*</span></label>

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
                        class="form-control"
                        accept="image/*">

                    <small class="form-text text-muted">
                        Format: JPG, PNG. Maksimal ukuran file 2MB. Kosongkan jika tidak ingin mengganti gambar.
                    </small>

                </div>
                <!-- BUTTON -->
                <button type="submit"
                        class="btn btn-warning"
                        onclick="return confirm('Yakin ingin menyimpan perubahan data ini?')">

                    <i class="fas fa-save"></i>

                    Update

                </button>

            </form>

        </div>

    </div>

</div>

@endsection