<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>PAKIRO</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>

        html{
            scroll-behavior: smooth;
        }

        body{
            font-family: 'Segoe UI', sans-serif;
            background: #F8F5F0;
        }

        /*
        |--------------------------------------------------------------------------
        | Navbar
        |--------------------------------------------------------------------------
        */
        .public-logo{

            width: 40px;
            height: 40px;

            object-fit: cover;

            border-radius: 50%;
        }

        .navbar{
            transition: 0.3s;
            padding: 15px 0;
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .navbar-brand{
            font-size: 28px;
            font-weight: bold;
            color: #6F4E37 !important;
        }

        .nav-link{
            color: #333 !important;
            font-weight: 500;
            margin-left: 15px;
        }

        .nav-link:hover{
            color: #6F4E37 !important;
        }

        /*
        |--------------------------------------------------------------------------
        | Hero
        |--------------------------------------------------------------------------
        */

        .hero{
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding-top: 100px;
        }

        .hero-title{
            font-size: 55px;
            font-weight: bold;
            color: #6F4E37;
        }

        .hero-text{
            font-size: 18px;
            color: #555;
            margin-top: 20px;
            line-height: 1.8;
        }

        .btn-coffee{
            background: #6F4E37;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 10px;
            transition: 0.3s;
        }

        .btn-coffee:hover{
            background: #5a3f2d;
            color: white;
            transform: translateY(-2px);
        }

        .hero-image{
            width: 100%;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float{

            0%{
                transform: translateY(0px);
            }

            50%{
                transform: translateY(-10px);
            }

            100%{
                transform: translateY(0px);
            }

        }

        /*
        |--------------------------------------------------------------------------
        | Section
        |--------------------------------------------------------------------------
        */

        .section{
            padding: 80px 0;
        }

        .section-title{
            text-align: center;
            margin-bottom: 50px;
            font-size: 40px;
            font-weight: bold;
            color: #6F4E37;
        }

        /*
        |--------------------------------------------------------------------------
        | Card Penyakit
        |--------------------------------------------------------------------------
        */

        .disease-card{
            border: none;
            border-radius: 20px;
            overflow: hidden;
            transition: 0.3s;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            background: white;
        }

        .disease-card:hover{
            transform: translateY(-10px);
        }

        .disease-card img{
            height: 220px;
            object-fit: cover;
        }

        /*
        |--------------------------------------------------------------------------
        | Footer
        |--------------------------------------------------------------------------
        */

        footer{
            background: #6F4E37;
            color: white;
            padding: 30px 0;
            margin-top: 80px;
        }

        /*
        |--------------------------------------------------------------------------
        | Responsive
        |--------------------------------------------------------------------------
        */

        @media(max-width: 768px){

            .hero{
                text-align: center;
            }

            .hero-title{
                font-size: 40px;
            }

            .hero-image{
                margin-top: 40px;
            }

        }

    </style>

</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg fixed-top">

    <div class="container">

        <a class="navbar-brand d-flex align-items-center fw-bold"
        href="/"
            style="color:#6F4E37;">

            <!-- LOGO -->
            <img src="{{ asset('images/logo.png') }}"
                alt="PAKIRO Logo"
                class="me-2 public-logo">
            <!-- TEXT -->
            <span>

                PAKIRO

            </span>

        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse"
             id="navbarNav">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">

                    <a class="nav-link"
                       href="/">

                        Home

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link"
                       href="/penyakit">

                        Daftar Penyakit

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link"
                       href="/deteksi">

                        Diagnosis

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link"
                       href="/login">

                        Login

                    </a>

                </li>

            </ul>

        </div>

    </div>

</nav>

<!-- CONTENT -->
@yield('content')

<!-- FOOTER -->
<footer>

    <div class="container text-center">

        <h5>PAKIRO</h5>

        <p>
            Sistem Pakar Penyakit Tanaman Kopi Robusta
        </p>

        <small>
            © 2026 Pakiro - Forward Chaining Expert System
        </small>

    </div>

</footer>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>