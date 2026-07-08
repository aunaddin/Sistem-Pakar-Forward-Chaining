@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="card">

        <div class="card-header d-flex align-items-center">
            <a href="{{ route('gejala.index') }}" class="btn btn-outline-secondary btn-sm me-3">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h3 class="mb-0">Tambah Gejala</h3>
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

            <form action="{{ route('gejala.store') }}"
                  method="POST">

                @csrf

                <div class="mb-3">

                    <label>Kode Gejala <span class="text-danger">*</span></label>

                    <input type="text"
                        name="kode_gejala"
                        class="form-control"
                        required>

                    @if ($lastGejala)
                        <small class="form-text text-muted">
                            Kode terakhir digunakan: <strong>{{ $lastGejala->kode_gejala }}</strong>
                        </small>
                    @else
                        <small class="form-text text-muted">
                            Belum ada kode gejala yang tersimpan.
                        </small>
                    @endif

                </div>

                <div class="mb-3">

                    <label>Nama Gejala <span class="text-danger">*</span></label>

                    <input type="text"
                           name="nama_gejala"
                           class="form-control"
                           required>

                </div>

                <button class="btn btn-primary"
                    onclick="return confirm('Yakin ingin menambahkan data ini?')">
                    Simpan
                </button>

            </form>

        </div>

    </div>

</div>

@endsection