<?php
include '../../../config/connection.php';

$current_page = basename($_SERVER['PHP_SELF']);

/* ABOUT (UNTUK NAVBAR & FOOTER) */
$qabout = mysqli_query($connect, "SELECT * FROM about LIMIT 1");
$aboutHeader = mysqli_fetch_object($qabout);

/* DETAIL EKSTRAKULIKULER */
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$query = mysqli_query($connect, "SELECT * FROM ekstrakulikuler WHERE id = $id");
$data = mysqli_fetch_object($query);

if (!$data) {
    echo "Data tidak ditemukan";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($data->nama) ?></title>

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


        /* ================= CONTENT ================= */
        .container {
            max-width: 1000px;
            margin: 120px auto 50px;
            padding: 20px;
        }

        /* FLEX TANPA CARD */
        .detail-wrapper {
            display: flex;
            gap: 30px;
            align-items: flex-start;
        }

        /* GAMBAR */
        .detail-img {
            flex: 1;
        }

        .detail-img img {
            width: 100%;
            height: 320px;
            object-fit: cover;
            border-radius: 12px;
        }

        /* TEXT */
        .detail-text {
            flex: 1.5;
        }

        .detail-text h1 {
            font-size: 28px;
            margin: 0;
        }

        .detail-text p {
            margin-top: 15px;
            line-height: 1.8;
        }

        /* BUTTON */
        .btn-back {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 25px;
            background: #1FA67A;
            color: #fff;
            border-radius: 25px;
            text-decoration: none;
        }

        /* ================= FOOTER ================= */
        footer {
            background: #1FA67A;
            color: #fff;
            padding: 40px 20px;
        }

        .footer-grid {
            max-width: 1100px;
            margin: auto;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 30px;
        }

        .footer-title {
            font-weight: 600;
            margin-bottom: 10px;
        }

        .footer-text {
            font-size: 14px;
        }

        .footer-bottom {
            text-align: center;
            margin-top: 20px;
        }

        /* RESPONSIVE */
        @media(max-width:768px) {
            .detail-wrapper {
                flex-direction: column;
            }

            .footer-grid {
                grid-template-columns: 1fr;
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
                <a href="/sdn%202%20kancilan(1)/frontend/index.php#home" class="active">HOME</a>
                <a href="/sdn%202%20kancilan(1)/frontend/pages/detail/guru.php">GURU</a>
                <a href="/sdn%202%20kancilan(1)/frontend/pages/detail/pencapaian.php">PENCAPAIAN</a>
                <a href="/sdn%202%20kancilan(1)/frontend/index.php#ekstrakulikuler">EKSTRAKULIKULER</a>
                <a href="/sdn%202%20kancilan(1)/frontend/index.php#fasilitas">FASILITAS</a>
                <a href="/sdn%202%20kancilan(1)/frontend/pages/detail/galleri.php">GALERI</a>
                <a href="/sdn%202%20kancilan(1)/frontend/index.php#contact">CONTACT</a>
                <a href="https://arsip.siap-ppdb.com/2024/jateng/#/">PPDB</a>
            </nav>


        </div>

    </header>

    <!-- CONTENT -->
    <div class="container">

        <div class="detail-wrapper">

            <!-- GAMBAR -->
            <div class="detail-img">
                <img src="../../../storages/ekstrakulikuler/<?= htmlspecialchars($data->image) ?>">
            </div>

            <!-- TEXT -->
            <div class="detail-text">
                <h1><?= htmlspecialchars($data->nama) ?></h1>

                <p><?= nl2br(htmlspecialchars($data->keterangan)) ?></p>
            </div>

        </div>

    </div>

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


</body>

</html>