<?php
include '../../../config/connection.php';

$current_page = basename($_SERVER['PHP_SELF']);

/* ================= ABOUT ================= */
$qabout = mysqli_query($connect, "SELECT * FROM about");
$aboutHeader = mysqli_fetch_object(
    mysqli_query($connect, "SELECT * FROM about LIMIT 1")
);

/* ================= PAGINATION ================= */
$limit = 6;
$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$offset = ($page - 1) * $limit;

$totalResult = mysqli_query($connect, "SELECT COUNT(*) as total FROM fasilitas");
$totalData = mysqli_fetch_assoc($totalResult)['total'];
$totalPages = ceil($totalData / $limit);

$qfasilitas = mysqli_query(
    $connect,
    "SELECT * FROM fasilitas LIMIT $limit OFFSET $offset"
);
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($aboutHeader->name) ?></title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: #f1f5f9;
        }

        /* NAVBAR */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: #1FA67A;
            height: 80px;
            display: flex;
            align-items: center;
            z-index: 999;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .nav-container {
            width: 1400px;
            margin: auto;
            display: flex;
            justify-content: space-between;
            padding: 0 20px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo img {
            width: 45px;
            height: 45px;
            object-fit: cover;
        }

        .logo span {
            font-weight: 600;
            font-size: 18px;
            color: #fff;
        }

        .menu {
            display: flex;
            gap: 30px;
        }

        .menu a {
            text-decoration: none;
            color: #fff;
            font-size: 15px;
            font-weight: 600;
            display: flex;
            align-items: center;
            height: 80px;
            transition: 0.3s;
        }

        .menu a.active {
            color: #f5d93a !important;
            font-weight: 700;
        }

        .menu a:hover {
            color: #e6fff7;
        }

        /* HAMBURGER */
        .hamburger {
            display: none;
            flex-direction: column;
            cursor: pointer;
            gap: 5px;
        }

        .hamburger div {
            width: 25px;
            height: 3px;
            background: #fff;
        }

        @media(max-width:900px) {
            .nav-container {
                flex-wrap: wrap;
            }

            .menu {
                display: none;
                flex-direction: column;
                width: 100%;
                background: #1FA67A;
            }

            .menu.show {
                display: flex;
            }

            .hamburger {
                display: flex;
            }
        }

        /* ================= HERO (HOME ASLI) ================= */
        .hero-slider {
            margin-top: 80px;
            height: 100vh;
            overflow: hidden;
            position: relative;
        }

        .hero-wrapper {
            display: flex;
            height: 100%;
            transition: 1s;
        }

        .hero-slide {
            min-width: 100%;
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, .55);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            color: #fff;
            max-width: 900px;
        }

        .hero-content h1 {
            font-size: 48px;
            margin-bottom: 15px;
        }

        .hero-desc {
            font-size: 20px
        }

        .hero-address {
            font-size: 18px;
            margin-bottom: 25px
        }

        /* ================= FASILITAS ================= */
        .section {
            padding: 100px 0 60px
        }

        .title {
            text-align: center;
            font-size: 34px;
            font-weight: 700
        }

        .subtitle {
            text-align: center;
            color: #64748b
        }

        .row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            max-width: 1300px;
            margin: auto;
        }

        .card {
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0, 0, 0, .06);
        }

        .img-box img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .card-body {
            text-align: center;
            padding: 20px
        }

        /* ================= PAGINATION ================= */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 40px;
            flex-wrap: wrap;
        }

        .pagination a {
            background: #1FA67A;
            color: #fff;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
        }

        .pagination a.active {
            background: #065f46;
        }

        /* FOOTER */
        footer {
            background: #1FA67A;
            color: #fff;
            padding: 50px 20px 25px;
            font-family: Poppins, sans-serif;
        }

        .footer-grid {
            max-width: 1100px;
            margin: auto;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 40px;
        }

        .footer-title {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 12px;
        }

        .footer-menu-title {
            text-align: center;
            margin-bottom: 15px;
        }

        .footer-menu-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px 40px;
            padding-left: 35px;
        }

        .menu-col a {
            display: block;
            font-size: 14px;
            line-height: 1.9;
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            transition: .3s;
        }

        .menu-col a:hover {
            color: #E9FFF7;
        }

        .footer-text {
            font-size: 14px;
            line-height: 1.7;
        }

        .map-responsive iframe {
            width: 100%;
            height: 180px;
            border: none;
            border-radius: 6px;
        }

        .footer-bottom {
            text-align: center;
            margin-top: 30px;
            font-size: 13px;
            color: #fff;
            padding-top: 15px;
            background: #1FA67A;
        }

        @media(max-width:900px) {
            .row {
                grid-template-columns: repeat(2, 1fr);
                max-width: 90%;
            }
        }

        @media(max-width:500px) {
            .row {
                grid-template-columns: 1fr;
                max-width: 95%;
            }
        }

        @media(max-width:768px) {
            .footer-grid {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .footer-menu-grid {
                grid-template-columns: 1fr 1fr;
                padding-left: 20px;
            }
        }
    </style>
</head>

<body>

    <!-- ================= NAVBAR ================= -->
    <header class="navbar">
        <div class="nav-container">

            <div class="logo">
                <img src="../../../storages/about/<?= $aboutHeader->logo ?>">
                <span><?= $aboutHeader->name ?></span>
            </div>

            <nav class="menu">
                <a href="/sdn%202%20kancilan(1)/frontend/index.php#home">HOME</a>
                <a href="guru.php#guru">GURU</a>
                <a href="pencapaian.php#pencapaian">PENCAPAIAN</a>
                <a href="ekstrakulikuler.php#ekstrakulikuler">EKSTRAKULIKULER</a>
                <a class="nav-link <?= ($current_page == 'fasilitas.php') ? 'active' : '' ?>" href="#fasilitas">FASILITAS</a>
                <a href="galleri.php#galeri">GALERI</a>
                <a href="/sdn%202%20kancilan/frontend/index.php#contact">CONTACT</a>
                <a href="https://arsip.siap-ppdb.com/2024/jateng/#/">PPDB</a>
            </nav>

            <div class="hamburger" onclick="toggleMenu()">
                <i class='bx bx-menu'></i>
            </div>

        </div>
    </header>

    <!-- ================= HOME HERO ================= -->
    <section class="hero-slider" id="home">
        <div class="hero-wrapper">

            <?php while ($item = $qabout->fetch_object()): ?>
                <div class="hero-slide"
                    style="background-image:url('../../../storages/about/<?= $item->banner ?>')">

                    <div class="hero-overlay"></div>

                    <div class="hero-content">
                        <h1><?= $item->name ?></h1>
                        <p class="hero-desc"><?= $item->keterangan ?></p>
                        <p class="hero-address"><?= $item->alamat ?></p>
                    </div>

                </div>
            <?php endwhile; ?>

        </div>
    </section>

    <!-- ================= FASILITAS ================= -->
    <section class="section" id="fasilitas">
        <h2 class="title">Fasilitas</h2>
        <p class="subtitle">Fasilitas lengkap untuk mendukung kegiatan belajar</p>

        <div class="row">
            <?php while ($item = $qfasilitas->fetch_object()): ?>
                <div class="card">
                    <div class="img-box">
                        <img src="../../../storages/fasilitas/<?= $item->image ?>">
                    </div>
                    <div class="card-body">
                        <h3><?= $item->nama ?></h3>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <!-- PAGINATION -->
        <div class="pagination">

            <a href="?page=<?= ($page <= 1 ? 1 : $page - 1) ?>">Prev</a>

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="?page=<?= $i ?>" class="<?= ($i == $page) ? 'active' : '' ?>">
                    <?= $i ?>
                </a>
            <?php endfor; ?>

            <a href="?page=<?= ($page >= $totalPages ? $totalPages : $page + 1) ?>">Next</a>

        </div>
    </section>

    <footer>
        <div class="footer-grid">
            <div>
                <div class="footer-title"><?= htmlspecialchars($aboutHeader->name) ?></div>
                <div class="footer-text"><?= htmlspecialchars($aboutHeader->keterangan) ?></div>
            </div>
            <div class="footer-menu">
                <div class="footer-title footer-menu-title">Menu</div>
                <div class="footer-menu-grid">
                    <div class="menu-col">
                        <a href="/sdn%202%20kancilan/frontend/index.php#home">Home</a>
                        <a href="ekstrakulikuler.php#ekstrakulikuler">Ekstrakulikuler</a>
                        <a href="pencapaian.php#pencapaian">Prestasi</a>
                        <a href="galleri.php#galeri">Galeri</a>
                    </div>
                    <div class="menu-col">
                        <a href="guru.php#guru">Guru</a>
                        <a href="fasilitas.php#fasilitas">Fasilitas</a>
                        <a href="/sdn%202%20kancilan/frontend/index.php#contact">Kontak</a>
                        <a href="https://arsip.siap-ppdb.com/2024/jateng/#/">PPDB</a>
                    </div>
                </div>
            </div>
            <div class="map-responsive">
                <iframe src="https://maps.google.com/maps?width=600&height=400&hl=en&q=sd%202%20kancilan&t=&z=15&ie=UTF8&iwloc=B&output=embed" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
        <div class="footer-bottom">© <?= date('Y') ?> <?= htmlspecialchars($aboutHeader->name) ?></div>
    </footer>


    <script>
        function toggleMenu() {
            document.getElementById('menu').classList.toggle('show');
        }

        /* slider auto */
        const wrapper = document.querySelector('.hero-wrapper');
        const slides = document.querySelectorAll('.hero-slide');
        let index = 0;

        setInterval(() => {
            index++;
            if (index >= slides.length) index = 0;
            wrapper.style.transform = `translateX(-${index*100}%)`;
        }, 5000);
    </script>

</body>

</html>