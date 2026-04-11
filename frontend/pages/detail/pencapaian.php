<?php
include '../../../config/connection.php';

$current_page = basename($_SERVER['PHP_SELF']);

/* ================= ABOUT ================= */
$qabout = "SELECT * FROM about";
$resultabout = mysqli_query($connect, $qabout) or die(mysqli_error($connect));

/* ================= PAGINATION PENCAPAIAN ================= */
$limit = 6; // jumlah prestasi per halaman
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$offset = ($page - 1) * $limit;

// total prestasi
$totalResult = mysqli_query($connect, "SELECT COUNT(*) AS total FROM pencapaian");
$totalRow = mysqli_fetch_assoc($totalResult);
$totalPrestasi = $totalRow['total'];
$totalPages = ceil($totalPrestasi / $limit);

// query prestasi untuk halaman ini
$qPencapaian = mysqli_query($connect, "SELECT * FROM pencapaian LIMIT $limit OFFSET $offset");

// ambil 1 data untuk judul/footer default
$qaboutHeader = mysqli_query($connect, "SELECT * FROM about LIMIT 1");
$aboutHeader = mysqli_fetch_object($qaboutHeader);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($aboutHeader->name ?? 'Sekolah') ?></title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
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

        /* ================= HERO SLIDER ================= */
        .hero-slider {
            position: relative;
            width: 100%;
            height: 100vh;
            overflow: hidden;
            margin-top: 80px;
            /* offset navbar */
        }

        .hero-wrapper {
            display: flex;
            height: 100%;
            transition: transform 1s ease;
        }

        .hero-slide {
            min-width: 100%;
            height: 100%;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.55);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 900px;
            padding: 20px;
            color: #ffffff;
        }

        .hero-content h1 {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 16px;
        }

        .hero-desc {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .hero-address {
            font-size: 18px;
            margin-bottom: 32px;
        }

        .hero-btn {
            display: flex;
            justify-content: center;
            gap: 16px;
            flex-wrap: wrap;
        }

        .btn-get-started {
            padding: 12px 30px;
            background: #ffffff;
            color: #065f46;
            font-weight: 600;
            border-radius: 30px;
            text-decoration: none;
        }

        .btn-outline {
            padding: 12px 30px;
            border: 2px solid #ffffff;
            color: #ffffff;
            font-weight: 600;
            border-radius: 30px;
            text-decoration: none;
        }

        /* ================= PENCAPAIAN ================= */
        #pencapaian {
            padding: 90px 20px;
            background: #f9fafb;
        }

        .pencapaian-title {
            text-align: center;
            font-size: 34px;
            font-weight: 700;
            margin-bottom: 50px;
        }

        .pencapaian-grid {
            max-width: 1200px;
            margin: auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
        }

        .prestasi-card {
            position: relative;
            border-radius: 16px;
            overflow: hidden;
            height: 390px;
            background: #fff;
            border: 1px solid #e5e7eb;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.06);
        }

        .prestasi-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .prestasi-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 20px;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.75), transparent);
            color: #fff;
        }

        .prestasi-overlay h5 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .prestasi-overlay p {
            font-size: 14px;
            margin: 0;
            opacity: 0.9;
        }

        /* ================= PAGINATION ================= */
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 40px;
            gap: 10px;
            flex-wrap: wrap;
        }

        .pagination a {
            padding: 8px 16px;
            background: #1FA67A;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
        }

        .pagination a.active {
            background: #065f46;
        }

        /* ================= FOOTER ================= */
        footer {
            background: #1FA67A;
            color: #fff;
            font-family: 'Poppins', sans-serif;
            padding: 50px 20px 25px;
        }

        .footer-bottom {
            text-align: center;
            margin-top: 30px;
            font-size: 13px;
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

        @media(max-width:768px) {
            .pencapaian-grid {
                grid-template-columns: 1fr;
            }

            .footer-grid {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .footer-menu-grid {
                grid-template-columns: 1fr 1fr;
                padding-left: 20px;
            }

            .hero-content h1 {
                font-size: 32px;
            }

            .hero-desc {
                font-size: 16px;
            }

            .hero-address {
                font-size: 15px;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <header class="navbar">
        <div class="nav-container">
            <div class="logo">
                <img src="../../../storages/about/<?= htmlspecialchars($aboutHeader->logo) ?>">
                <span><?= htmlspecialchars($aboutHeader->name) ?></span>
            </div>
            <nav class="menu">
                <a href="/sdn%202%20kancilan/frontend/index.php#home">HOME</a>
                <a href="guru.php#guru">GURU</a>
                <a class="nav-link <?= ($current_page == 'pencapaian.php') ? 'active' : '' ?>" href="#pencapaian">PENCAPAIAN</a>
                <a href="ekstrakulikuler.php#ekstrakulikuler">EKSTRAKULIKULER</a>
                <a href="fasilitas.php#fasilitas">FASILITAS</a>
                <a href="galleri.php#galeri">GALERI</a>
                <a href="/sdn%202%20kancilan/frontend/index.php#contact">CONTACT</a>
                <a href="https://arsip.siap-ppdb.com/2024/jateng/#/">PPDB</a>
            </nav>
        </div>
    </header>

    <!-- HERO SLIDER -->
    <section class="hero-slider" id="hero-slider">
        <div class="hero-wrapper">
            <?php while ($item = $resultabout->fetch_object()) : ?>
                <div class="hero-slide" style="background-image: url('../../../storages/about/<?= htmlspecialchars($item->banner) ?>');">
                    <div class="hero-overlay"></div>
                    <div class="hero-content">
                        <h1><?= htmlspecialchars($item->name) ?></h1>
                        <p class="hero-desc"><?= htmlspecialchars($item->keterangan) ?></p>
                        <p class="hero-address"><?= htmlspecialchars($item->alamat) ?></p>
                        <div class="hero-btn">
                            <a href="#pencapaian" class="btn-get-started">Lihat Prestasi</a>
                            <a href="/sdn%202%20kancilan/frontend/index.php#contact" class="btn-outline">Kontak</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </section>

    <!-- PENCAPAIAN -->
    <section id="pencapaian">
        <h2 class="pencapaian-title">Prestasi Siswa</h2>

        <div class="pencapaian-grid">
            <?php while ($p = mysqli_fetch_object($qPencapaian)): ?>
                <div class="prestasi-card">
                    <img src="../../../storages/pencapaian/<?= htmlspecialchars($p->image) ?>">
                    <div class="prestasi-overlay">
                        <h5><?= nl2br(htmlspecialchars($p->nama)) ?></h5>
                        <p><?= nl2br(htmlspecialchars($p->keterangan)) ?></p>
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
        const wrapper = document.querySelector('.hero-wrapper');
        const slides = document.querySelectorAll('.hero-slide');
        let index = 0;

        function nextSlide() {
            index++;
            if (index >= slides.length) index = 0;
            wrapper.style.transform = `translateX(-${index * 100}%)`;
        }

        setInterval(nextSlide, 5000);
    </script>
</body>

</html>