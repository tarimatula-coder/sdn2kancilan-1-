<?php
include '../../../config/connection.php';

$current_page = basename($_SERVER['PHP_SELF']);

/* ================= ABOUT ================= */
$qabout = mysqli_query($connect, "SELECT * FROM about");
$aboutHeader = mysqli_fetch_object(mysqli_query($connect, "SELECT * FROM about LIMIT 1"));

/* ================= KEPALA SEKOLAH ================= */
$qKepsek = mysqli_query($connect, "SELECT * FROM guru WHERE jabatan='Kepala Sekolah' LIMIT 1");

/* ================= PAGINATION GURU ================= */
$limit = 6; // jumlah guru per halaman (tidak termasuk kepala sekolah)
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$offset = ($page - 1) * $limit;

// total guru (kecuali kepala sekolah)
$totalResult = mysqli_query($connect, "SELECT COUNT(*) AS total FROM guru WHERE jabatan!='Kepala Sekolah'");
$totalRow = mysqli_fetch_assoc($totalResult);
$totalGuru = $totalRow['total'];
$totalPages = ceil($totalGuru / $limit);

// query guru untuk halaman ini
$qGuru = mysqli_query($connect, "SELECT * FROM guru WHERE jabatan!='Kepala Sekolah' LIMIT $limit OFFSET $offset");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($aboutHeader->name ?? 'Sekolah') ?></title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Montserrat:300,400,500,600,700|Poppins:300,400,500,600,700" rel="stylesheet">

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

        /* ================= GURU ================= */
        #guru {
            padding: 100px 20px 40px;
            max-width: 1400px;
            margin: auto;
        }

        .guru-title {
            text-align: center;
            font-size: 34px;
            font-weight: 700;
            margin-bottom: 60px;
            color: #0f172a;
        }

        .kepsek-wrapper {
            max-width: 350px;
            margin: 0 auto 50px;
            display: flex;
            justify-content: center;
        }

        .guru-grid {
            max-width: 1200px;
            margin: auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
        }

        .guru-card {
            background: #fff;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            transition: .35s;
        }

        .guru-card:hover {
            transform: translateY(-6px);
        }

        .guru-img {
            padding: 18px;
        }

        .guru-img img {
            width: 100%;
            height: 390px;
            aspect-ratio: 16/9;
            object-fit: cover;
            border-radius: 12px;
        }

        .guru-body {
            padding: 10px 20px 25px;
            text-align: center;
        }

        .guru-body h4 {
            margin: 8px 0 5px;
            font-size: 18px;
        }

        .guru-body p {
            margin: 0;
            font-size: 14px;
            color: #64748b;
        }

        /* PAGINATION */
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

        /* FOOTER */
        footer {
            background: #1FA67A;
            color: #ffffff;
            padding: 50px 20px 25px;
            font-family: 'Poppins', sans-serif;
        }

        .footer-grid {
            max-width: 1200px;
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
            color: #ffffff;
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
            color: #ffffff;
            padding-top: 15px;
            background: #1FA67A;
        }

        @media(max-width:900px) {
            .menu {
                display: none;
            }

            .guru-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .footer-grid {
                grid-template-columns: 1fr;
                text-align: center;
            }
        }

        @media(max-width:500px) {
            .guru-grid {
                grid-template-columns: 1fr;
            }

            .kepsek-wrapper {
                grid-template-columns: 1fr;
            }

            .hero-content h1 {
                font-size: 32px;
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
                <a href="/sdn%202%20kancilan(1)/frontend/index.php#home">HOME</a>
                <a class="nav-link <?= ($current_page == 'guru.php') ? 'active' : '' ?>" href="#guru">GURU</a>
                <a href="pencapaian.php#pencapaian">PENCAPAIAN</a>
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
            <?php while ($item = mysqli_fetch_object($qabout)) : ?>
                <div class="hero-slide" style="background-image: url('../../../storages/about/<?= $item->banner ?>');">
                    <div class="hero-overlay"></div>
                    <div class="hero-content">
                        <h1><?= htmlspecialchars($item->name) ?></h1>
                        <p class="hero-desc"><?= htmlspecialchars($item->keterangan) ?></p>
                        <p class="hero-address"><?= htmlspecialchars($item->alamat) ?></p>
                        <div class="hero-btn">
                            <a href="#guru" class="btn-get-started">Lihat Guru</a>
                            <a href="/sdn%202%20kancilan/frontend/index.php#contact" class="btn-outline">Kontak</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </section>

    <!-- GURU -->
    <section id="guru">
        <h2 class="guru-title">Kepala sekolah</h2>

        <!-- Kepala Sekolah -->
        <div class="kepsek-wrapper">
            <?php while ($k = mysqli_fetch_object($qKepsek)): ?>
                <div class="guru-card">
                    <div class="guru-img">
                        <img src="../../../storages/guru/<?= htmlspecialchars($k->image) ?>">
                    </div>
                    <div class="guru-body">
                        <h4><?= htmlspecialchars($k->nama) ?></h4>
                        <p><?= htmlspecialchars($k->jabatan) ?></p>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <h2 class="guru-title">Tenaga Pendidikan</h2>
        <!-- Guru lainnya -->
        <div class="guru-grid">
            <?php while ($g = mysqli_fetch_object($qGuru)): ?>
                <div class="guru-card">
                    <div class="guru-img">
                        <img src="../../../storages/guru/<?= htmlspecialchars($g->image) ?>">
                    </div>
                    <div class="guru-body">
                        <h4><?= htmlspecialchars($g->nama) ?></h4>
                        <p><?= htmlspecialchars($g->jabatan) ?></p>
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

    <!-- HERO SLIDER JS -->
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