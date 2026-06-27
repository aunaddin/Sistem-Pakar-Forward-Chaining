<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Login - PAKIRO</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
          rel="stylesheet">

    <style>

        body{

            margin: 0;
            padding: 0;
            min-height: 100vh;

            display: flex;
            justify-content: center;
            align-items: center;

            font-family: 'Segoe UI', sans-serif;

            background:
                linear-gradient(rgba(0,0,0,0.5),
                rgba(0,0,0,0.5)),

                url('{{ asset('images/bglg.jpg') }}');

            background-size: cover;
            background-position: center;
        }

        .login-card{

            width: 100%;
            max-width: 420px;

            background: rgba(255,255,255,0.95);

            backdrop-filter: blur(10px);

            border-radius: 25px;

            padding: 40px;

            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .logo-title{

            color: #6F4E37;
            font-size: 38px;
            font-weight: bold;
        }

        .subtitle{

            color: #777;
            margin-bottom: 30px;
        }

        .form-control{

            height: 50px;
            border-radius: 12px;
            padding-left: 45px;
            border: 1px solid #ddd;
        }

        .form-control:focus{

            border-color: #6F4E37;
            box-shadow: none;
        }

        .input-group-custom{

            position: relative;
        }

        .input-icon{

            position: absolute;

            top: 50%;
            left: 15px;

            transform: translateY(-50%);

            z-index: 10;

            color: #6F4E37;
        }

        .btn-login{

            background: #6F4E37;
            border: none;
            color: white;

            height: 50px;

            border-radius: 12px;

            transition: 0.3s;
        }

        .btn-login:hover{

            background: #5a3f2d;
            transform: translateY(-2px);
        }

        .btn-back{

            border-radius: 12px;
            height: 50px;
        }

        .logo-circle{

            width: 100px;
            height: 100px;
            object-fit: cover;

            border-radius: 50%;

            border: 4px solid #DDB892;

            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        @media(max-width: 576px){

            .login-card{

                margin: 20px;
                padding: 30px 25px;
            }

            .logo-title{

                font-size: 30px;
            }

        }

    </style>

</head>

<body>

    <div class="login-card">

        <!-- LOGO -->
        <div class="text-center mb-3">

            <img src="{{ asset('images/logo.png') }}"
                 class="logo-circle"
                 alt="logo">

        </div>

        <!-- TITLE -->
        <div class="text-center">

            <h1 class="logo-title">

                PAKIRO

            </h1>

            <p class="subtitle">

                Sistem Pakar Penyakit Kopi Robusta

            </p>

        </div>

        <!-- ERROR -->
        @if ($errors->any())

            <div class="alert alert-danger">

                {{ $errors->first() }}

            </div>

        @endif

        <!-- FORM -->
        <form method="POST"
              action="{{ url('/login') }}">

            @csrf

            <!-- USERNAME -->
            <div class="mb-3 input-group-custom">

                <i class="bi bi-person input-icon"></i>

                <input type="text"
                       name="username"
                       class="form-control"
                       placeholder="Username"
                       required>

            </div>

            <!-- PASSWORD -->
            <div class="mb-4 input-group-custom">

                <i class="bi bi-lock input-icon"></i>

                <input type="password"
                       name="password"
                       class="form-control"
                       placeholder="Password"
                       required>

            </div>
            <!-- LUPA PASSWORD -->
            <div class="text-end mb-3">

                <a href="{{ route('password.request') }}"
                style="color: #0d2a7a; font-size: 14px;">

                    Lupa Password?

                </a>

            </div>

            <!-- BUTTON -->
            <div class="d-grid gap-2">

                <button type="submit"
                        class="btn btn-login">

                    <i class="bi bi-box-arrow-in-right"></i>

                    Login Admin

                </button>

                <a href="/"
                   class="btn btn-outline-secondary btn-back">

                    <i class="bi bi-arrow-left"></i>

                    Kembali ke Home

                </a>

            </div>

        </form>

    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>