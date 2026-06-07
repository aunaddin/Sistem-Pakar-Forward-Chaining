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
                    <div class="border rounded p-3" style="max-height: 400px; overflow-y: auto;">
                        @foreach($gejala as $item)
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox"
                                       name="gejala_id[]"
                                       value="{{ $item->id }}"
                                       id="gejala_{{ $item->id }}"
                                       {{ in_array($item->id, $selectedGejalaIds) ? 'checked' : '' }}>
                                <label class="form-check-label" for="gejala_{{ $item->id }}">
                                    {{ $item->nama_gejala }}
                                </label>
                            </div>
                        @endforeach
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