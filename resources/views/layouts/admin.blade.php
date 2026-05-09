<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>
        {{ config('app.name', 'PAKIRO') }}
    </title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- AdminLTE -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>

        body{

            background: #f4f6f9;
        }

        /* NAVBAR */
        .main-header{

            border: none !important;
        }

        /* SIDEBAR */
        .main-sidebar{

            position: fixed;

            top: 0;
            left: 0;

            height: 100vh;

            overflow-y: auto;
        }

        /* CONTENT */
        .content-wrapper{

            margin-left: 250px !important;

            margin-top: 57px !important;

            min-height: 100vh;

            background: #f4f6f9;
        }

        /* MOBILE */
        @media(max-width: 991px){

            .content-wrapper{

                margin-left: 0 !important;
            }

        }

    </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

    {{-- NAVBAR --}}
    @include('layouts.navbar')

    {{-- SIDEBAR --}}
    @include('layouts.sidebar')

    {{-- CONTENT --}}
    <div class="content-wrapper">

        <section class="content pt-4">

            <div class="container-fluid">

                @yield('content')

            </div>

        </section>

    </div>

</div>

<!-- jQuery -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

</body>
</html>