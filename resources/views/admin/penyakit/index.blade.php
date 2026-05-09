@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between mb-3">
        <h3>Data Penyakit</h3>

        <a href="{{ route('penyakit.create') }}"
           class="btn btn-primary">
            Tambah Penyakit
        </a>
    </div>

    <div class="card">

        <div class="card-body">

            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Gambar</th>
                        <th>Nama Penyakit</th>
                        <th>Penanganan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($penyakit as $item)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $item->kode_penyakit }}</td>

                        <td width="120">

                            @if($item->gambar)

                                <img src="{{ asset('storage/' . $item->gambar) }}"
                                     width="100">

                            @endif

                        </td>

                        <td>{{ $item->nama_penyakit }}</td>

                        <td>{{ $item->penanganan }}</td>

                        <td>
                            <!-- EDIT -->
                            <a href="{{ route('penyakit.edit', $item->id) }}"
                            class="btn btn-warning btn-sm">

                                <i class="fas fa-edit"></i>

                            </a>

                            <!-- DELETE -->
                            <form action="{{ route('penyakit.destroy', $item->id) }}"
                                method="POST"
                                class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus data?')">

                                    <i class="fas fa-trash"></i>

                                </button>

                            </form>
                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="5" class="text-center">
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