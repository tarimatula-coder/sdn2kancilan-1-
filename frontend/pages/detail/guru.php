```php
<?php
include '../../../config/connection.php';

/* ABOUT */
$qabout = mysqli_query($connect, "SELECT * FROM about LIMIT 1");
$aboutHeader = mysqli_fetch_object($qabout);

/* KEPALA SEKOLAH */
$qKepsek = mysqli_query($connect, "SELECT * FROM guru WHERE jabatan='Kepala Sekolah' LIMIT 1");

/* GURU */
$qGuru = mysqli_query($connect, "SELECT * FROM guru WHERE jabatan!='Kepala Sekolah'");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($aboutHeader->name ?? 'Sekolah') ?></title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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
            color: #e6fff7;
        }

        .menu a.active {
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
            margin-bottom: 20px;
        }

        .hero-btn {
            display: inline-block;
            padding: 12px 28px;
            background: #ffffff;
            color: #1FA67A;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
        }

        /* ================= SECTION GURU ================= */

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

        /* KEPALA SEKOLAH */

        .kepsek-wrapper {
            display: flex;
            justify-content: center;
            margin-bottom: 50px;
        }

        /* GRID GURU */

        .guru-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 28px;
        }

        /* CARD */

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
            height: 240px;
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
            color: #d1fff2;
        }

        .footer-bottom {
            text-align: center;
            margin-top: 30px;
            font-size: 13px;
            color: #e6fff7;
            padding-top: 15px;
        }

        /* ================= RESPONSIVE ================= */

        @media(max-width:1200px) {
            .guru-grid {
                grid-template-columns: repeat(3, 1fr);
            }
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
                <a href="#home" class="active">HOME</a>
                <a href="#guru">GURU</a>
                <a href="../detail/pencapaian.php">PENCAPAIAN</a>
                <a href="pages/headmaster.php">KEPALA SEKOLAH</a>
                <a href="pages/ekstrakulikuler.php">EKSTRAKULIKULER</a>
                <a href="../detail/galleri.php">GALERI</a>
                <a href="pages/contact.php">CONTACT</a>
            </nav>

        </div>

    </header>

    <!-- HERO -->

    <section class="hero" id="home">

        <div class="hero-content">

            <h1><?= htmlspecialchars($aboutHeader->name) ?></h1>

            <p><?= htmlspecialchars($aboutHeader->keterangan) ?></p>

            <a href="#guru" class="hero-btn">Lihat Guru</a>

        </div>

    </section>

    <!-- GURU -->

    <section id="guru">

        <h2 class="guru-title">Tenaga Pendidik</h2>

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

</body>

</html>