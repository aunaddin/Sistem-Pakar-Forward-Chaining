@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <h3 class="mb-3">Rules Forward Chaining</h3>

    <div class="card mb-4">

        <div class="card-header">
            Tambah Rule
        </div>

        <div class="card-body">

            <form action="{{ route('rules.store') }}"
                  method="POST">

                @csrf

                <div class="mb-3">

                    <label>Penyakit</label>

                    <select name="penyakit_id"
                            class="form-control"
                            required>

                        <option value="">
                            -- Pilih Penyakit --
                        </option>

                        @foreach($penyakit as $item)

                        <option value="{{ $item->id }}">
                            {{ $item->nama_penyakit }}
                        </option>

                        @endforeach

                    </select>

                </div>

                <div class="mb-3">

                    <label>Gejala</label>

                    <select name="gejala_id"
                            class="form-control"
                            required>

                        <option value="">
                            -- Pilih Gejala --
                        </option>

                        @foreach($gejala as $item)

                        <option value="{{ $item->id }}">
                            {{ $item->nama_gejala }}
                        </option>

                        @endforeach

                    </select>

                </div>

                <button class="btn btn-primary">
                    Simpan Rule
                </button>

            </form>

        </div>

    </div>

    <div class="card">

        <div class="card-header">
            Data Rules
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Penyakit</th>
                        <th>Gejala</th>
                        <th width="120">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($rules as $item)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $item->penyakit->nama_penyakit }}</td>

                        <td>{{ $item->gejala->nama_gejala }}</td>

                        <td>

                            <form action="{{ route('rules.destroy', $item->id) }}"
                                  method="POST">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Hapus rule?')">

                                    Hapus

                                </button>

                            </form>

                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="4" class="text-center">
                            Data kosong
                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection