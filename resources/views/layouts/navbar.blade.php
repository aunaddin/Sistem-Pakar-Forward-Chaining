<nav class="main-header navbar navbar-expand navbar-white navbar-light fixed-top shadow-sm">

    <!-- LEFT -->
    <ul class="navbar-nav">

        <!-- SIDEBAR BUTTON -->
        <li class="nav-item">

            <a class="nav-link"
               data-widget="pushmenu"
               href="#">

                <i class="fas fa-bars"></i>

            </a>

        </li>

        <!-- TITLE -->
        <li class="nav-item d-none d-sm-inline-block">

            <span class="nav-link fw-bold"
                  style="color:#6F4E37;">

                PAKIRO ADMIN

            </span>

        </li>

    </ul>

    <!-- RIGHT -->
    <ul class="navbar-nav ms-auto align-items-center">

        <!-- USER -->
        <li class="nav-item me-2">

            <span class="nav-link">

                <i class="fas fa-user-circle me-1"></i>

                {{ Auth::user()->name }}

            </span>

        </li>

        <!-- LOGOUT -->
        <li class="nav-item me-3">

            <form action="{{ route('logout') }}"
                  method="POST">

                @csrf

                <button class="btn btn-danger btn-sm rounded-pill">

                    <i class="fas fa-sign-out-alt"></i>

                    Logout

                </button>

            </form>

        </li>

    </ul>

</nav>