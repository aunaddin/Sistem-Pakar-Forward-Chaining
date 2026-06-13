<aside class="main-sidebar sidebar-dark-primary elevation-4 sidebar-fixed">

    <!-- BRAND LOGO -->
    <a href="/dashboard"
    class="brand-link d-flex align-items-center">

        <!-- LOGO -->
        <img src="{{ asset('images/logo.png') }}"
            alt="PAKIRO Logo"
            class="brand-image img-circle elevation-3"
            style="opacity: .9">

        <!-- TEXT -->
        <span class="brand-text fw-bold">

            PAKIRO

        </span>

    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- User -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">
                    {{ Auth::user()->name }}
                </a>
            </div>
        </div>

        <!-- Menu -->
        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">

                <li class="nav-item">
                    <a href="/dashboard" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('penyakit.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-disease"></i>
                        <p>Penyakit</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('gejala.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-notes-medical"></i>
                        <p>Gejala</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('rules.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-project-diagram"></i>
                        <p>Rules</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('riwayat.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-history"></i>
                        <p>Riwayat Diagnosis</p>
                    </a>
                </li>

            </ul>

        </nav>

    </div>

</aside>