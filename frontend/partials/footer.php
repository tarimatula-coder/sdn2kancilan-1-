
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