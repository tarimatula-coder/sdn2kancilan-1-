
<header class="navbar">

    <div class="nav-container">

        <div class="logo">
            <img src="../storages/about/<?= htmlspecialchars($aboutHeader->logo) ?>">
            <span><?= htmlspecialchars($aboutHeader->name) ?></span>
        </div>

        <?php
        $currentPage = basename($_SERVER['PHP_SELF']);
        ?>

        <nav class="menu">
            <a href="index.php#home">HOME</a>
            <a href="pages/detail/guru.php#guru">GURU</a>
            <a href="pages/detail/pencapaian.php#pencapaian">PENCAPAIAN</a>
            <a href="pages/detail/galleri.php#galleri">GALERI</a>
            <a href="pages/detail/ekstrakulikuler.php#ekstrakulikuler">EKSTRAKULIKULER</a>
            <a href="index.php#contact">CONTACT</a>
            <a href="index.php#contact">PPDB</a>
        </nav>
    </div>

</header>