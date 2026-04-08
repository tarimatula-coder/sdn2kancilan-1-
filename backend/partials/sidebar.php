<?php
$currentPage = basename($_SERVER['PHP_SELF']);
$currentUrl  = $_SERVER['REQUEST_URI'];
?>

<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">

        <a class="sidebar-brand" href="#">
            <span class="align-middle">SDN 2 KANCILAN</span>
        </a>

        <ul class="sidebar-nav">

            <li class="sidebar-header">Pages</li>

            <li class="sidebar-item <?= strpos($currentUrl, 'dashboard') ? 'active' : '' ?>">
                <a class="sidebar-link" href="../dashboard/index.php">
                    <i data-feather="home"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item <?= strpos($currentUrl, 'about') ? 'active' : '' ?>">
                <a class="sidebar-link" href="../about/index.php">
                    <i data-feather="info"></i>
                    <span>About</span>
                </a>
            </li>

            <li class="sidebar-item <?= strpos($currentUrl, 'galleri') ? 'active' : '' ?>">
                <a class="sidebar-link" href="../galleri/index.php">
                    <i data-feather="image"></i>
                    <span>Galeri</span>
                </a>
            </li>

            <li class="sidebar-item <?= strpos($currentUrl, 'contact') ? 'active' : '' ?>">
                <a class="sidebar-link" href="../contact/index.php">
                    <i data-feather="mail"></i>
                    <span>Kontak</span>
                </a>
            </li>

            <li class="sidebar-item <?= strpos($currentUrl, 'ekstrakulikuler') ? 'active' : '' ?>">
                <a class="sidebar-link" href="../ekstrakulikuler/index.php">
                    <i data-feather="activity"></i>
                    <span>Ekstrakulikuler</span>
                </a>
            </li>

            <li class="sidebar-item <?= strpos($currentUrl, 'guru') ? 'active' : '' ?>">
                <a class="sidebar-link" href="../guru/index.php">
                    <i data-feather="users"></i>
                    <span>Guru</span>
                </a>
            </li>

            <li class="sidebar-header">Management</li>

            <li class="sidebar-item <?= strpos($currentUrl, 'headmaster') ? 'active' : '' ?>">
                <a class="sidebar-link" href="../headmaster/index.php">
                    <i data-feather="user"></i>
                    <span>Kepala Sekolah</span>
                </a>
            </li>

            <li class="sidebar-item <?= strpos($currentUrl, 'pencapaian') ? 'active' : '' ?>">
                <a class="sidebar-link" href="../pencapaian/index.php">
                    <i data-feather="award"></i>
                    <span>Pencapaian</span>
                </a>
            </li>

            <li class="sidebar-item <?= strpos($currentUrl, 'user') ? 'active' : '' ?>">
                <a class="sidebar-link" href="../user/index.php">
                    <i data-feather="user-check"></i>
                    <span>User</span>
                </a>
            </li>

            <li class="sidebar-item <?= strpos($currentUrl, 'visi_misi') ? 'active' : '' ?>">
                <a class="sidebar-link" href="../visi_misi/index.php">
                    <i data-feather="target"></i>
                    <span>Visi Misi</span>
                </a>
            </li>

            <li class="sidebar-item <?= strpos($currentUrl, 'artikel') ? 'active' : '' ?>">
                <a class="sidebar-link" href="../artikel/index.php">
                    <i data-feather="file-text"></i>
                    <span>Artikel</span>
                </a>
            </li>

            <li class="sidebar-item <?= strpos($currentUrl, 'fasilitas') ? 'active' : '' ?>">
                <a class="sidebar-link" href="../fasilitas/index.php">
                    <i data-feather="tool"></i>
                    <span>Fasilitas</span>
                </a>
            </li>

            <!-- 🔥 LOGOUT (ICON DIPERBAIKI) -->
            <li class="sidebar-item">
                <a class="sidebar-link" href="../../actions/auth/logout.php">
                    <i data-feather="log-out"></i>
                    <span>Logout</span>
                </a>
            </li>

        </ul>
    </div>
</nav>

<!-- Feather Icons -->
<script src="https://unpkg.com/feather-icons"></script>
<script>
    feather.replace();
</script>