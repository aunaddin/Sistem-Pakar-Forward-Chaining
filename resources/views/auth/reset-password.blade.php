<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - PAKIRO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            margin: 0; padding: 0; min-height: 100vh;
            display: flex; justify-content: center; align-items: center;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),
                        url('{{ asset('images/bglg.jpg') }}');
            background-size: cover; background-position: center;
        }
        .login-card {
            width: 100%; max-width: 420px;
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(10px);
            border-radius: 25px; padding: 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        .logo-title { color: #6F4E37; font-size: 32px; font-weight: bold; }
        .subtitle { color: #777; margin-bottom: 30px; }
        .form-control {
            height: 50px; border-radius: 12px;
            padding-left: 45px; border: 1px solid #ddd;
        }
        .form-control:focus { border-color: #6F4E37; box-shadow: none; }
        .input-group-custom { position: relative; }
        .input-icon {
            position: absolute; top: 50%; left: 15px;
            transform: translateY(-50%); z-index: 10; color: #6F4E37;
        }
        .btn-login {
            background: #6F4E37; border: none; color: white;
            height: 50px; border-radius: 12px; transition: 0.3s;
        }
        .btn-login:hover { background: #5a3f2d; transform: translateY(-2px); }
    </style>
</head>
<body>
    <div class="login-card">

        <div class="text-center mb-3">
            <img src="{{ asset('images/logo.png') }}"
                 style="width:100px;height:100px;object-fit:cover;border-radius:50%;border:4px solid #DDB892;"
                 alt="logo">
        </div>

        <div class="text-center">
            <h1 class="logo-title">Reset Password</h1>
            <p class="subtitle">Masukkan password baru kamu</p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email }}">

            <div class="mb-3 input-group-custom">
                <i class="bi bi-lock input-icon"></i>
                <input type="password" name="password"
                       class="form-control"
                       placeholder="Password Baru" required>
            </div>

            <div class="mb-4 input-group-custom">
                <i class="bi bi-lock-fill input-icon"></i>
                <input type="password" name="password_confirmation"
                       class="form-control"
                       placeholder="Konfirmasi Password" required>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-login">
                    <i class="bi bi-check-circle"></i> Reset Password
                </button>
            </div>
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>