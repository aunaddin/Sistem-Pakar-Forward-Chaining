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
    
    {{-- NOTIFIKASI --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

    <div class="card">

        <div class="card-body">

            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th width="60">No</th>
                        <th width="100">Kode</th>
                        <th width="140">Gambar</th>
                        <th>Nama Penyakit</th>
                        <th width="250">Aksi</th>
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

                        <td>
                            <!-- DETAIL -->
                            <a href="{{ route('penyakit.show', $item->id) }}"
                            class="btn btn-info btn-sm">

                                <i class="fas fa-eye"></i>Detail

                            </a>

                            <!-- EDIT -->
                            <a href="{{ route('penyakit.edit', $item->id) }}"
                            class="btn btn-warning btn-sm">

                                <i class="fas fa-edit"></i> Edit

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

                                    <i class="fas fa-trash"></i> Hapus

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