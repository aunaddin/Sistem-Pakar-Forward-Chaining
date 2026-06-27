@extends('layouts.public')

@section('content')

<section class="section"
         style="margin-top: 80px;">

    <div class="container">

        <!-- HEADER -->
        <div class="text-center mb-5">

            <h1 class="fw-bold"
                style="color:#6F4E37;">

                Diagnosis Penyakit Kopi

            </h1>

            <p class="text-muted">

                Pilih gejala yang dialami tanaman kopi robusta

            </p>

        </div>
        @if (session('error'))
            <div class="alert alert-danger text-center mb-4">
                <i class="fas fa-exclamation-circle me-1"></i> {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('deteksi.proses') }}"
              method="POST">

            @csrf

            <!-- DATA PASIEN -->
            <div class="card border-0 shadow-sm rounded-4 mb-4">

                <div class="card-body p-4">

                    <h4 class="mb-4">

                        Data Pengguna

                    </h4>

                    <div class="row">

                        <div class="col-lg-6 mb-3">

                            <label>Nama</label>

                            <input type="text"
                                   name="nama_pasien"
                                   class="form-control form-control-lg"
                                   required>

                        </div>

                        <div class="col-lg-6 mb-3">

                            <label>Alamat</label>

                            <input type="text"
                                   name="alamat"
                                   class="form-control form-control-lg"
                                   required>

                        </div>

                    </div>

                </div>

            </div>

            <!-- GEJALA -->
            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body p-4">

                    <h4 class="mb-4">

                        Pilih Gejala

                    </h4>

                    <div class="row">

                        @foreach($gejala as $item)

                        <div class="col-lg-6 mb-4">

                            <label class="w-100">

                                <input type="checkbox"
                                       name="gejala[]"
                                       value="{{ $item->id }}"
                                       class="d-none gejala-checkbox">

                                <div class="gejala-card p-4">

                                    <div class="d-flex justify-content-between align-items-center">

                                        <div>

                                            <h5 class="fw-bold mb-2"
                                                style="color:#6F4E37;">

                                                {{ $item->kode_gejala }}

                                            </h5>

                                            <p class="mb-0 text-muted">

                                                {{ $item->nama_gejala }}

                                            </p>

                                        </div>

                                        <div class="check-icon">

                                            <i class="fas fa-check-circle"></i>

                                        </div>

                                    </div>

                                </div>

                            </label>

                        </div>

                        @endforeach

                    </div>

                   <div class="text-center mt-4">

                        <button class="btn btn-coffee btn-lg px-5"
                                id="btnProses"
                                type="submit">

                            <i class="fas fa-stethoscope"></i>

                            Proses Diagnosis

                        </button>

                    </div>

                </div>

            </div>

        </form>

    </div>

</section>

<style>

    .gejala-card{

        background: #fff;
        border-radius: 20px;
        border: 2px solid #eee;
        transition: 0.3s;
        cursor: pointer;
        height: 100%;
    }

    .gejala-card:hover{

        transform: translateY(-5px);
        border-color: #6F4E37;
    }

    .check-icon{

        font-size: 28px;
        color: #ccc;
        transition: 0.3s;
    }

    .gejala-checkbox:checked + .gejala-card{

        background: #6F4E37;
        border-color: #6F4E37;
        color: white;
    }

    .gejala-checkbox:checked + .gejala-card p,
    .gejala-checkbox:checked + .gejala-card h5{

        color: white !important;
    }

    .gejala-checkbox:checked + .gejala-card .check-icon{

        color: #fff;
    }

</style>

<script>
    document.querySelector('form').addEventListener('submit', function() {
        const btn = document.getElementById('btnProses');
        btn.disabled = true;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';
    });
</script>
@endsection