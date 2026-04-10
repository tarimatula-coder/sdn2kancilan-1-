<?php
include '../../../config/connection.php';

$current_page = basename($_SERVER['PHP_SELF']);

/* ================= ABOUT (NAVBAR & FOOTER) ================= */
$qabout = mysqli_query($connect, "SELECT * FROM about LIMIT 1");
$aboutHeader = mysqli_fetch_object($qabout);

/* ================= AMBIL DATA ARTIKEL ================= */
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$query = mysqli_query($connect, "SELECT * FROM artikel WHERE id = $id");
$data1 = mysqli_fetch_object($query);

if (!$data1) {
    die("Data tidak ditemukan");
}

/* ================= AMBIL DATA SELANJUTNYA ================= */
$queryNext = mysqli_query($connect, "SELECT * FROM artikel WHERE id > $id ORDER BY id ASC LIMIT 1");
$data2 = mysqli_fetch_object($queryNext);

/* ================= FORMAT TANGGAL ================= */
$bulan = [
    1 => 'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
];

$timestamp = strtotime($data1->tanggal);

$tanggalFix = "Kancilan, " .
    date('d', $timestamp) . " " .
    $bulan[(int)date('m', $timestamp)] . " " .
    date('Y', $timestamp);

/* ================= GABUNG ISI ================= */
$isiGabung = $data1->keterangan . "\n" . ($data2->keterangan ?? '');
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($data1->nama) ?></title>

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

        /* ================= ARTIKEL ================= */
        .container {
            max-width: 900px;
            margin: 120px auto 50px;
            background: #fff;
            padding: 40px;
            font-family: 'Times New Roman', serif;
        }

        /* HEADER KORAN */
        .header-koran {
            position: relative;
            border-top: 3px solid black;
            border-bottom: 2px solid black;
            padding: 20px 0;
            margin-bottom: 20px;
        }

        .tanggal-kiri {
            position: absolute;
            left: 0;
            top: 10px;
            font-size: 14px;
        }

        .judul-wrapper {
            text-align: center;
        }

        .judul {
            font-size: 36px;
            font-weight: bold;
        }

        .subjudul {
            font-size: 14px;
        }

        .judul-artikel {
            font-size: 20px;
            font-weight: bold;
        }

        /* KOLOM */
        .isi-artikel {
            column-count: 2;
            column-gap: 30px;
            text-align: justify;
        }

        /* GAMBAR */
        .img-kanan {
            float: right;
            width: 55%;
            margin: 0 0 10px 20px;
        }

        .img-kiri {
            float: left;
            width: 40%;
            margin: 10px 20px 10px 0;
        }

        .img-kanan img,
        .img-kiri img {
            width: 100%;
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

        .footer-bottom {
            text-align: center;
            margin-top: 20px;
        }

        /* RESPONSIVE */
        @media(max-width:768px) {
            .isi-artikel {
                column-count: 1;
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

    <!-- ARTIKEL -->
    <div class="container">

        <div class="header-koran">
            <div class="tanggal-kiri">
                <b><?= $tanggalFix ?></b>
            </div>

            <div class="judul-wrapper">
                <h1 class="judul">SD NEGERI 2 KANCILAN</h1>
                <p class="subjudul">Edisi Artikel Sekolah</p>
            </div>
        </div>

        <h2 class="judul-artikel"><?= htmlspecialchars($data1->nama) ?></h2>

        <div class="isi-artikel">
            <?php
            $isi = nl2br(htmlspecialchars($isiGabung));
            $paragraf = explode("<br />", $isi);
            $total = count($paragraf);

            foreach ($paragraf as $i => $p) {

                if ($i == 0 && !empty($data1->image)) {
                    echo '<div class="img-kanan">
                        <img src="../../../storages/artikel/' . $data1->image . '">
                      </div>';
                }

                if ($i == floor($total / 2) && !empty($data1->foto)) {
                    echo '<div class="img-kiri">
                        <img src="../../../storages/artikel/' . $data1->foto . '">
                      </div>';
                }

                if (trim($p) != '') {
                    echo "<p>$p</p>";
                }
            }
            ?>
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