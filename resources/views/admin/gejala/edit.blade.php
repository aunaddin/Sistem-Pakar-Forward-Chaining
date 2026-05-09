@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="card">

        <div class="card-header">
            <h3>Edit Gejala</h3>
        </div>

        <div class="card-body">

            <form action="{{ route('gejala.update', $gejala->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label>Kode Gejala</label>

                    <input type="text"
                           name="kode_gejala"
                           class="form-control"
                           value="{{ $gejala->kode_gejala }}"
                           required>

                </div>

                <div class="mb-3">

                    <label>Nama Gejala</label>

                    <input type="text"
                           name="nama_gejala"
                           class="form-control"
                           value="{{ $gejala->nama_gejala }}"
                           required>

                </div>

                <button class="btn btn-primary">
                    Update
                </button>

            </form>

        </div>

    </div>

</div>

@endsection