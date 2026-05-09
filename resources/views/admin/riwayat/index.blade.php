@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="card">

        <div class="card-header">

            <h3>Riwayat Diagnosa</h3>

        </div>

        <div class="card-body">

            <table class="table table-bordered table-striped">

                <thead>

                    <tr>

                        <th>No</th>

                        <th>Nama Pasien</th>

                        <th>Alamat</th>

                        <th>Hasil Diagnosa</th>

                        <th>Tanggal</th>

                        <th width="120">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($riwayat as $item)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $item->nama_pasien }}</td>

                        <td>{{ $item->alamat }}</td>

                        <td>

                            @if($item->penyakit)

                                {{ $item->penyakit->nama_penyakit }}

                            @else

                                <span class="text-danger">
                                    Tidak ditemukan
                                </span>

                            @endif

                        </td>

                        <td>

                            {{ $item->created_at->format('d-m-Y H:i') }}

                        </td>

                        <td>

                            <form action="{{ route('riwayat.destroy', $item->id) }}"
                                  method="POST">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Hapus riwayat?')">

                                    Hapus

                                </button>

                            </form>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="6" class="text-center">

                            Belum ada riwayat

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection