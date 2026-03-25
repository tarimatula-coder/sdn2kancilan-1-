<?php
include '../../../config/connection.php';

/* ABOUT */
$qabout = mysqli_query($connect, "SELECT * FROM about LIMIT 1");
$aboutHeader = mysqli_fetch_object($qabout);

/* GALERI */
$qgalleri = mysqli_query($connect, "SELECT * FROM galleries");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($aboutHeader->name) ?></title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: #f1f5f9;
        }

        /* ================= NAVBAR ================= */

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
            align-items: center;
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
            gap: 40px;
        }

        .menu a {
            text-decoration: none;
            color: #ffffff;
            font-size: 15px;
            font-weight: 600;
            transition: .3s;
        }

        .menu a:hover {
            color: #eafff7;
        }

        .menu a.active {
            color: #ffffff;
            border-bottom: 3px solid #ffffff;
            padding-bottom: 6px;
        }

        /* ================= HERO ================= */

        .hero {
            height: 100vh;
            background: url('../../../storages/about/<?= $aboutHeader->banner ?>') center/cover no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            position: relative;
            margin-top: 80px;
        }

        .hero::before {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
        }

        .hero-content {
            position: relative;
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
        }

        /* ================= GALERI ================= */

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

        /* ================= PREVIEW ================= */

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

        /* ================= FOOTER ================= */

        .footer-modern {
            background: #1FA67A;
            color: #ffffff;
            padding: 55px 20px 25px;
            margin-top: 80px;
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

        .footer-text {
            font-size: 14px;
            line-height: 1.7;
        }

        .footer-menu-title {
            text-align: center;
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
            color: #eafff7;
        }

        .footer-bottom {
            text-align: center;
            margin-top: 30px;
            font-size: 13px;
            color: #ffffff;
            border-top: 1px solid rgba(255, 255, 255, 0.3);
            padding-top: 15px;
        }
    </style>
</head>

<body>

    <header class="navbar">

        <div class="nav-container">

            <div class="logo">
                <img src="../../../storages/about/<?= htmlspecialchars($aboutHeader->logo) ?>">
                <span><?= htmlspecialchars($aboutHeader->name) ?></span>
            </div>

            <nav class="menu">
                <a href="#home" class="active">HOME</a>
                <a href="../detail/guru.php">GURU</a>
                <a href="../detail/pencapaian.php">PENCAPAIAN</a>
                <a href="pages/headmaster.php">KEPALA SEKOLAH</a>
                <a href="pages/ekstrakulikuler.php">EKSTRAKULIKULER</a>
                <a href="#galeri">GALERI</a>
                <a href="pages/contact.php">CONTACT</a>
            </nav>
        </div>
    </header>

    <section class="hero" id="home">

        <div class="hero-content">

            <h1><?= htmlspecialchars($aboutHeader->name) ?></h1>
            <p><?= htmlspecialchars($aboutHeader->keterangan) ?></p>

            <a href="#galeri" class="hero-btn">Lihat Galeri</a>

        </div>

    </section>

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

                                <button class="galeri-btn"
                                    onclick="openPreview('../../../storages/galleri/<?= $g->image ?>')">

                                    <i class="bx bx-expand"></i>

                                </button>

                            </div>

                        </div>

                    </div>

                <?php endwhile; ?>

            </div>

        </div>

    </section>

    <?php
    // Ambil data tentang sekolah
    $qabout = "SELECT * FROM about LIMIT 1";
    $resultabout = mysqli_query($connect, $qabout) or die(mysqli_error($connect));
    $aboutHeader = mysqli_fetch_object($resultabout);
    ?>

    <footer>
        <div class="footer-grid">

            <!-- Tentang Sekolah -->
            <div>
                <div class="footer-title"><?= htmlspecialchars($aboutHeader->name) ?></div>
                <div class="footer-text"><?= htmlspecialchars($aboutHeader->keterangan) ?></div>
            </div>

            <!-- Menu -->
            <div class="footer-menu">

                <div class="footer-title footer-menu-title">Menu</div>

                <div class="footer-menu-grid">

                    <div class="menu-col">
                        <a href="#hero-slider">Home</a>
                        <a href="#headmaster">Kepala Sekolah</a>
                        <a href="#ekstrakulikuler">Ekstrakulikuler</a>
                        <a href="#pencapaian">Prestasi</a>
                    </div>

                    <div class="menu-col">
                        <a href="#galeriPreview">Galeri</a>
                        <a href="#visi-misi">Visi Misi</a>
                        <a href="guru.php">Guru</a>
                        <a href="#contact">Kontak</a>
                    </div>

                </div>

            </div>

            <!-- MAP -->
            <div class="map-responsive">
                <iframe src="https://maps.google.com/maps?width=600&height=400&hl=en&q=sd%202%20kancilan&t=&z=15&ie=UTF8&iwloc=B&output=embed" allowfullscreen="" loading="lazy"></iframe>
            </div>

        </div>

        <div class="footer-bottom">
            © <?= date('Y') ?> <?= htmlspecialchars($aboutHeader->name) ?>
        </div>

    </footer>

    <style>
        /* FOOTER */

        footer {
            background: #1FA67A;
            /* sama dengan navbar */
            color: #ffffff;
            font-family: 'Poppins', sans-serif;
            padding: 50px 20px 25px;
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

        .menu-col {
            text-align: left;
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

        /* FOOTER BOTTOM */

        .footer-bottom {
            text-align: center;
            margin-top: 30px;
            font-size: 13px;
            color: #ffffff;
            border-top: none;
            padding-top: 15px;
            background: #1FA67A;
            /* sama dengan navbar */
        }

        /* RESPONSIVE */

        @media(max-width:768px) {

            .footer-grid {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .footer-menu-grid {
                grid-template-columns: 1fr 1fr;
                padding-left: 20px;
            }

            .menu-col {
                text-align: left;
            }

        }
    </style>

    <div id="galeriPreview" class="galeri-preview">

        <span class="galeri-close" onclick="closePreview()">✕</span>

        <img id="previewImage">

    </div>

    <script>
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