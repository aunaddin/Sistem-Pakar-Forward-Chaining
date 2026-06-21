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

            <form action="{{ route('gejala.store') }}"
                  method="POST">

                @csrf

                <div class="mb-3">

                    <label>Kode Gejala</label>

                    <input type="text"
                           name="kode_gejala"
                           class="form-control"
                           required>

                </div>

                <div class="mb-3">

                    <label>Nama Gejala</label>

                    <input type="text"
                           name="nama_gejala"
                           class="form-control"
                           required>

                </div>

                <button class="btn btn-primary">
                    Simpan
                </button>

            </form>

        </div>

    </div>

</div>

@endsection