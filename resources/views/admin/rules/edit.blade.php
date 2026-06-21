@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex align-items-center mb-4">
        <a href="{{ route('rules.index') }}" class="btn btn-outline-secondary me-3">
            <i class="fas fa-arrow-left"></i>
        </a>
        <h3 class="mb-0">Edit Rule</h3>
    </div>

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-header">Edit Gejala untuk Penyakit</div>
        <div class="card-body">
            <form action="{{ route('rules.update', $penyakit->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Penyakit readonly --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold">Penyakit</label>
                    <input type="text" class="form-control bg-light"
                           value="{{ $penyakit->nama_penyakit }}" readonly>
                </div>

                {{-- Checkbox gejala --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold">Gejala</label>
                    <p class="text-muted small mb-2">
                        Centang gejala yang ingin ditambahkan, hilangkan centang untuk menghapus.
                    </p>
                    @error('gejala_id')
                        <div class="alert alert-danger py-2">{{ $message }}</div>
                    @enderror
                    <div class="border rounded" style="max-height: 400px; overflow-y: auto;">
                        <table class="table table-sm mb-0">
                            <thead class="table-light" style="position: sticky; top: 0;">
                                <tr>
                                    <th width="40">Checklist</th>
                                    <th width="100">Kode</th>
                                    <th>Gejala</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($gejala as $item)
                                    <tr>
                                        <td>
                                            <input type="checkbox"
                                                name="gejala_id[]"
                                                value="{{ $item->id }}"
                                                id="gejala_{{ $item->id }}"
                                                style="width: 16px; height: 16px;"
                                                {{ in_array($item->id, $selectedGejalaIds) ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <label class="form-check-label" for="gejala_{{ $item->id }}">
                                                {{ $item->kode_gejala }}
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label" for="gejala_{{ $item->id }}">
                                                {{ $item->nama_gejala }}
                                            </label>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Simpan Perubahan
                    </button>
                    <a href="{{ route('rules.index') }}" class="btn btn-outline-secondary">
                        Batal
                    </a>
                </div>

            </form>
        </div>
    </div>

</div>

@endsection