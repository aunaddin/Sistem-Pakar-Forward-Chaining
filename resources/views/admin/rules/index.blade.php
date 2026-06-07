@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Rules Forward Chaining</h3>
        <a href="{{ route('rules.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> Tambah Rule
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-header">Data Rules</div>
        <div class="card-body">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th width="50">No</th>
                        <th width="200">Penyakit</th>
                        <th>Gejala</th>
                        <th width="150" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($groupedRules as $penyakitId => $items)
                        @foreach($items as $i => $item)
                        <tr>
                            @if($i === 0)
                                <td rowspan="{{ count($items) }}" class="text-center fw-bold align-middle">
                                    {{ $loop->parent->iteration }}
                                </td>
                                <td rowspan="{{ count($items) }}" class="fw-semibold align-middle">
                                    {{ $item->penyakit->nama_penyakit }}
                                </td>
                            @endif

                            <td>
                                <span class="text-muted me-1">{{ $i + 1 }}.</span>
                                {{ $item->gejala->nama_gejala }}
                            </td>

                            @if($i === 0)
                                <td rowspan="{{ count($items) }}" class="text-center align-middle">
                                    <a href="{{ route('rules.edit', $penyakitId) }}"
                                       class="btn btn-warning btn-sm mb-1">
                                        <i class="fas fa-edit me-1"></i>Edit
                                    </a>
                                    <form action="{{ route('rules.destroyByPenyakit', $penyakitId) }}"
                                          method="POST"
                                          onsubmit="return confirm('Hapus semua rule untuk penyakit ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash me-1"></i>Hapus
                                        </button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                        @endforeach
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">
                                Belum ada data rules.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection