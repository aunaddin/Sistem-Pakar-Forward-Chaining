@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <!-- HEADER -->
    <div class="mb-4">

        <h1 class="fw-bold"
            style="color:#6F4E37;">

            Dashboard Admin

        </h1>

        <p class="text-muted">

            Selamat datang di sistem pakar
            penyakit tanaman kopi robusta

        </p>

    </div>

    <!-- STATISTIC -->
    <div class="row">

        <!-- PENYAKIT -->
        <div class="col-lg-4 col-md-6 mb-4">

            <div class="dashboard-card">

                <div>

                    <h6>Total Penyakit</h6>

                    <h2 class="fw-bold">

                        {{ $totalPenyakit }}

                    </h2>

                </div>

                <div class="dashboard-icon bg-primary-custom">

                    <i class="fas fa-virus"></i>

                </div>

            </div>

        </div>

        <!-- GEJALA -->
        <div class="col-lg-4 col-md-6 mb-4">

            <div class="dashboard-card">

                <div>

                    <h6>Total Gejala</h6>

                    <h2 class="fw-bold">

                        {{ $totalGejala }}

                    </h2>

                </div>

                <div class="dashboard-icon bg-success-custom">

                    <i class="fas fa-notes-medical"></i>

                </div>

            </div>

        </div>

        <!-- DIAGNOSA -->
        <div class="col-lg-4 col-md-6 mb-4">

            <div class="dashboard-card">

                <div>

                    <h6>Total Diagnosa</h6>

                    <h2 class="fw-bold">

                        {{ $totalDiagnosa }}

                    </h2>

                </div>

                <div class="dashboard-icon bg-danger-custom">

                    <i class="fas fa-stethoscope"></i>

                </div>

            </div>

        </div>

    </div>

    <!-- INFO -->
    <div class="row">

        <!-- ABOUT -->
        <div class="col-lg-8 mb-4">

            <div class="modern-card">

                <h4 class="fw-bold mb-3"
                    style="color:#6F4E37;">

                    Tentang Pakiro

                </h4>

                <p class="text-muted">

                    Pakiro adalah sistem pakar berbasis web
                    yang digunakan untuk mendeteksi penyakit
                    tanaman kopi robusta menggunakan
                    metode Forward Chaining.

                </p>

                <p class="text-muted mb-0">

                    Admin dapat mengelola data penyakit,
                    gejala, aturan, dan melihat riwayat
                    diagnosis pengguna.

                </p>

            </div>

        </div>

        <!-- QUICK MENU -->
        <div class="col-lg-4 mb-4">

            <div class="modern-card">

                <h4 class="fw-bold mb-3"
                    style="color:#6F4E37;">

                    Menu Cepat

                </h4>

                <div class="d-grid gap-2">

                    <a href="/admin/penyakit"
                       class="btn btn-coffee">

                        <i class="fas fa-virus"></i>

                        Data Penyakit

                    </a>

                    <a href="/admin/gejala"
                       class="btn btn-coffee">

                        <i class="fas fa-notes-medical"></i>

                        Data Gejala

                    </a>

                    <a href="/admin/rule"
                       class="btn btn-coffee">

                        <i class="fas fa-project-diagram"></i>

                        Data Rule

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

<style>

.dashboard-card{

    background: white;
    border-radius: 20px;
    padding: 25px;

    display: flex;
    justify-content: space-between;
    align-items: center;

    box-shadow: 0 5px 20px rgba(0,0,0,0.05);

    transition: 0.3s;
}

.dashboard-card:hover{

    transform: translateY(-5px);
}

.dashboard-icon{

    width: 70px;
    height: 70px;

    border-radius: 20px;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 28px;
    color: white;
}

.bg-primary-custom{

    background: #6F4E37;
}

.bg-success-custom{

    background: #A67B5B;
}

.bg-danger-custom{

    background: #DDB892;
}

.modern-card{

    background: white;
    border-radius: 20px;
    padding: 30px;

    box-shadow: 0 5px 20px rgba(0,0,0,0.05);

    height: 100%;
}

.btn-coffee{

    background: #6F4E37;
    color: white;
    border: none;
    border-radius: 10px;
}

.btn-coffee:hover{

    background: #5a3f2d;
    color: white;
}

</style>

@endsection