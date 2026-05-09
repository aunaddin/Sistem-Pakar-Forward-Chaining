@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="card">

        <div class="card-header">
            <h3>Tambah Gejala</h3>
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