<?php
include '../../../config/connection.php';

$current_page = basename($_SERVER['PHP_SELF']);
/* ================= ABOUT ================= */
$qabout = mysqli_query($connect, "SELECT * FROM about");
$aboutHeader = mysqli_fetch_object(
    mysqli_query($connect, "SELECT * FROM about LIMIT 1")
);

/* ================= PAGINATION GALERI ================= */
$limit = 6; // jumlah gambar per halaman
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$offset = ($page - 1) * $limit;

// total galeri
$totalGaleriResult = mysqli_query($connect, "SELECT COUNT(*) as total FROM galleries");
$totalGaleriRow = mysqli_fetch_assoc($totalGaleriResult);
$totalGaleri = $totalGaleriRow['total'];
$totalPages = ceil($totalGaleri / $limit);

// query galeri untuk halaman ini
$qgalleri = mysqli_query($connect, "SELECT * FROM galleries LIMIT $limit OFFSET $offset");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>SDN 2 Kancilan</title>

    <!-- Google Fonts & Boxicons -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Montserrat:300,400,500,600,700|Poppins:300,400,500,600,700" rel="stylesheet">
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

        /* HERO SLIDER */
        .hero-slider {
            position: relative;
            width: 100%;
            height: 100vh;
            overflow: hidden;
            margin-top: 80px;
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
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #fff;
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
            padding: 20px;
        }

        .hero-content h1 {
            font-size: 48px;
            margin-bottom: 10px;
        }

        .hero-content p {
            font-size: 20px;
            margin-bottom: 25px;
        }

        .hero-btn {
            display: inline-block;
            padding: 12px 28px;
            background: #fff;
            color: #065f46;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            margin: 5px;
        }

        /* GALERI */
        .galeri {
            padding: 90px 20px;
            background: linear-gradient(135deg, #eef2ff, #f8fafc, #fdf4ff);
        }

        .container {
            max-width: 1100px;
            margin: auto;
        }

        .text-center {
            text-align: center;
            margin-bottom: 50px;
        }

        .galeri-title {
            font-size: 32px;
            font-weight: 700;
            color: #1e293b;
        }

        .galeri-subtitle {
            color: #64748b;
            max-width: 600px;
            margin: auto;
        }

        .galeri-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
        }

        .galeri-card {
            border-radius: 28px;
            overflow: hidden;
            position: relative;
            background: #fff;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .08);
            transition: .4s;
        }

        .galeri-card:hover {
            transform: translateY(-10px) scale(1.02);
        }

        .galeri-img {
            height: 250px;
            overflow: hidden;
        }

        .galeri-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: .5s;
        }

        .galeri-card:hover img {
            transform: scale(1.1);
        }

        .galeri-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, .35);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: .4s;
        }

        .galeri-card:hover .galeri-overlay {
            opacity: 1;
        }

        .galeri-btn {
            width: 55px;
            height: 55px;
            border-radius: 50%;
            border: none;
            background: #1FA67A;
            color: #fff;
            font-size: 22px;
            cursor: pointer;
        }

        .galeri-preview {
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, .95);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }

        .galeri-preview img {
            max-width: 90%;
            max-height: 85%;
            border-radius: 14px;
        }

        .galeri-close {
            position: absolute;
            top: 20px;
            right: 30px;
            font-size: 30px;
            color: #fff;
            cursor: pointer;
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
    <!-- NAVBAR -->
    <header class="navbar">
        <div class="nav-container">
            <div class="logo">
                <?php $aboutHeaderFirst = mysqli_fetch_object(mysqli_query($connect, "SELECT * FROM about LIMIT 1")); ?>
                <img src="../../../storages/about/<?= htmlspecialchars($aboutHeaderFirst->logo) ?>">
                <span><?= htmlspecialchars($aboutHeaderFirst->name) ?></span>
            </div>
            <nav class="menu">
                <a href="/index.php#home">HOME</a>
                <a href="guru.php#guru">GURU</a>
                <a href="pencapaian.php#pencapaian">PENCAPAIAN</a>
                <a href="ekstrakulikuler.php#ekstrakulikuler">EKSTRAKULIKULER</a>
                <a href="fasilitas.php#fasilitas">FASILITAS</a>
                <a class="nav-link <?= ($current_page == 'galleri.php') ? 'active' : '' ?>" href="#galeri">GALERI</a>
                <a href="/index.php#contact">CONTACT</a>
                <a href="https://arsip.siap-ppdb.com/2024/jateng/#/">PPDB</a>
            </nav>
        </div>
    </header>

    <!-- HERO SLIDER -->
    <section class="hero-slider" id="home">
        <div class="hero-wrapper">
            <?php
            mysqli_data_seek($qabout, 0);
            while ($item = mysqli_fetch_object($qabout)):
            ?>
                <div class="hero-slide" style="background-image:url('../../../storages/about/<?= $item->banner ?>');">
                    <div class="hero-overlay"></div>
                    <div class="hero-content">
                        <h1><?= htmlspecialchars($item->name) ?></h1>
                        <p><?= htmlspecialchars($item->keterangan) ?></p>
                        <a href="#galeri" class="hero-btn">Lihat Galeri</a>
                        <a href="/sdn%202%20kancilan/frontend/index.php#contact" class="hero-btn">Kontak</a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </section>

    <!-- GALERI -->
    <section id="galeri" class="galeri">
        <div class="container">
            <div class="text-center">
                <h2 class="galeri-title">Galeri Kegiatan</h2>
                <p class="galeri-subtitle">Dokumentasi kegiatan sekolah</p>
            </div>

            <div class="galeri-grid">
                <?php while ($g = mysqli_fetch_object($qgalleri)): ?>
                    <div class="galeri-card">
                        <div class="galeri-img">
                            <img src="../../../storages/galleri/<?= $g->image ?>">
                            <div class="galeri-overlay">
                                <button class="galeri-btn" onclick="openPreview('../../../storages/galleri/<?= $g->image ?>')">
                                    <i class="bx bx-expand"></i>
                                </button>
                            </div>
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

    <div id="galeriPreview" class="galeri-preview">
        <span class="galeri-close" onclick="closePreview()">✕</span>
        <img id="previewImage">
    </div>

    <script>
        // HERO SLIDER
        const wrapper = document.querySelector('.hero-wrapper');
        const slides = document.querySelectorAll('.hero-slide');
        let index = 0;

        function nextSlide() {
            index++;
            if (index >= slides.length) index = 0;
            wrapper.style.transform = `translateX(-${index * 100}%)`;
        }

        setInterval(nextSlide, 5000);

        // GALERI PREVIEW
        function openPreview(img) {
            document.getElementById('previewImage').src = img;
            document.getElementById('galeriPreview').style.display = 'flex';
        }

        function closePreview() {
            document.getElementById('galeriPreview').style.display = 'none';
        }
    </script>
</body>

</html>