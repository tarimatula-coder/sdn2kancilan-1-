<nav class="navbar navbar-expand navbar-light navbar-bg">
    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">

            <!-- USER -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                    <img src="../../adminkit-3.1.0/adminkit-3.1.0/static/img/avatars/avatar.jpg"
                        class="avatar img-fluid rounded me-1">

                    <!-- ✅ LANGSUNG DARI SESSION -->
                    <span class="text-dark">
                        <?= htmlspecialchars($_SESSION['email']); ?>
                    </span>
                </a>
            </li>

        </ul>
    </div>
</nav>

<style>
    @keyframes navbarGradient {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }

    .navbar-bg {
        background: linear-gradient(90deg, #0f766e, #0ea5e9, #1d4ed8, #22c55e) !important;
        background-size: 400% 400% !important;
        animation: navbarGradient 14s ease-in-out infinite !important;
        border: none;
    }

    .navbar a,
    .navbar i,
    .navbar span {
        color: #ffffff !important;
    }

    .navbar .text-dark {
        color: #ffffff !important;
    }

    .navbar a:hover {
        background: transparent !important;
    }
</style>