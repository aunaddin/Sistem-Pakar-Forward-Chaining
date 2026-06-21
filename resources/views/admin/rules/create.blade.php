@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex align-items-center mb-4">
        <a href="{{ route('rules.index') }}" class="btn btn-outline-secondary me-3">
            <i class="fas fa-arrow-left"></i>
        </a>
        <h3 class="mb-0">Tambah Rule</h3>
    </div>

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-header">Form Tambah Rule</div>
        <div class="card-body">
            <form action="{{ route('rules.store') }}" method="POST">
                @csrf

                @if($penyakit->isEmpty())

                    <div class="alert alert-info">
                        <i class="fas fa-circle-info me-1"></i>
                        Semua penyakit sudah memiliki rule. Untuk menambah atau mengubah gejala,
                        silakan gunakan tombol <strong>Edit</strong> pada halaman
                        <a href="{{ route('rules.index') }}">Data Rules</a>.
                    </div>

                @else

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Penyakit</label>
                        <select name="penyakit_id" class="form-control @error('penyakit_id') is-invalid @enderror" required>
                            <option value="">-- Pilih Penyakit --</option>
                            @foreach($penyakit as $item)
                                <option value="{{ $item->id }}" {{ old('penyakit_id') == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_penyakit }}
                                </option>
                            @endforeach
                        </select>
                        @error('penyakit_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                @endif

                @if($penyakit->isNotEmpty())
                <div class="mb-4">
                    <label class="form-label fw-semibold">Gejala</label>
                    @error('gejala_id')
                        <div class="alert alert-danger py-2">{{ $message }}</div>
                    @enderror
                    <div class="border rounded" style="max-height: 350px; overflow-y: auto;">
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
                                            <input class="" type="checkbox"
                                                name="gejala_id[]"
                                                value="{{ $item->id }}"
                                                id="gejala_{{ $item->id }}"
                                                {{ in_array($item->id, old('gejala_id', [])) ? 'checked' : '' }}>
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
                        <i class="fas fa-save me-1"></i> Simpan Rule
                    </button>
                    <a href="{{ route('rules.index') }}" class="btn btn-outline-secondary">
                        Batal
                    </a>
                </div>
                @endif
            </form>
        </div>
    </div>

</div>

@endsection