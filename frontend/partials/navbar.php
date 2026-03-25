<?php
$qabout = "SELECT * FROM about LIMIT 1";
$resultabout = mysqli_query($connect, $qabout) or die(mysqli_error($connect));
$about = mysqli_fetch_object($resultabout);

$currentPage = basename($_SERVER['PHP_SELF']);
?>

<header id="header">

    <div class="nav-container">

        <!-- LOGO -->
        <div class="logo-area">
            <a href="../index.php">
                <img src="../storages/about/<?= $about->logo ?>" alt="Logo">
            </a>
            <span class="school-name">
                <?= strtoupper($about->name) ?>
            </span>
        </div>

        <!-- MENU -->
        <nav id="navbar" class="navbar">
            <ul>
                <li>
                    <a class="nav-link <?= $currentPage == 'index.php' ? 'active' : '' ?>" href="../index.php#hero-slider">
                        HOME
                    </a>
                </li>

                <li>
                    <a class="nav-link" href="pages/detail/guru.php#guru">
                        GURU
                    </a>
                </li>

                <li>
                    <a class="nav-link" href="pages/detail/Pencapaian.php">
                        PENCAPAIAN
                    </a>
                </li>

                <li>
                    <a class="nav-link" href="../index.php#headmaster">
                        KEPALA SEKOLAH
                    </a>
                </li>

                <li>
                    <a class="nav-link" href="../index.php#ekstrakulikuler">
                        EKSTRAKULIKULER
                    </a>
                </li>

                <li>
                    <a class="nav-link" href="pages/detail/galleri.php">
                        GALERI
                    </a>
                </li>

                <li>
                    <a class="nav-link" href="../index.php#contact">
                        CONTACT
                    </a>
                </li>
            </ul>
        </nav>

    </div>

</header>

<style>
    /* ================= NAVBAR ================= */

    #header {
        background: #1FA67A;
        position: fixed;
        top: 0;
        width: 100%;
        height: 65px;
        display: flex;
        align-items: center;
        z-index: 999;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .nav-container {
        max-width: 1300px;
        margin: auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        padding: 0 25px;
    }

    /* LOGO */

    .logo-area {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .logo-area img {
        height: 40px;
    }

    .school-name {
        color: white;
        font-weight: 600;
        font-size: 16px;
        letter-spacing: 0.5px;
    }

    /* MENU */

    .navbar ul {
        display: flex;
        list-style: none;
        margin: 0;
        padding: 0;
        align-items: center;
    }

    .navbar li {
        margin-left: 35px;
    }

    .navbar a {
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
        color: white;
        letter-spacing: 0.5px;
        transition: 0.3s;
        position: relative;
    }

    /* hover */

    .navbar a:hover {
        color: #E9FFF7;
    }

    /* ACTIVE */

    .navbar a.active {
        color: #ffffff;
    }

    /* underline */

    .navbar a::after {
        content: "";
        position: absolute;
        width: 0;
        height: 2px;
        left: 0;
        bottom: -6px;
        background: #17A673;
        transition: 0.3s;
    }

    .navbar a:hover::after,
    .navbar a.active::after {
        width: 100%;
    }

    /* RESPONSIVE */

    @media screen and (max-width:768px) {

        .navbar ul {
            flex-direction: column;
            background: #1FA67A;
            position: absolute;
            top: 65px;
            right: -100%;
            width: 200px;
            transition: 0.3s;
            padding: 10px 0;
        }

        .navbar ul.show {
            right: 0;
        }

        .navbar li {
            margin: 15px 0;
            text-align: center;
        }

    }

    body {
        padding-top: 65px;
    }
</style>