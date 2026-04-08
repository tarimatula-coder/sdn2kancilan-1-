<?php
/* artikel */
$qartikel = "SELECT * FROM artikel";
$resultartikel = mysqli_query($connect, $qartikel);
?>

<section class="artikel" id="artikel" style="
    padding:100px 0 60px;
    background:#f1f5f9;
">

    <div class="container">

        <div class="text-center mb-5">
            <h2 class="title">Berita</h2>
            <p class="subtitle">Informasi dan kegiatan terbaru sekolah</p>
        </div>

        <div class="row g-4">

            <?php while ($item = $resultartikel->fetch_object()) : ?>

                <?php
                $bulanIndo = [
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

                $tgl = strtotime($item->tanggal);
                $tanggalIndo = date('d', $tgl) . ' ' . $bulanIndo[(int)date('m', $tgl)] . ' ' . date('Y', $tgl);
                ?>

                <div class="col-lg-4 col-md-6">

                    <div class="ekskul-card">

                        <!-- IMAGE + BADGE -->
                        <div class="img-box" style="position:relative;">

                            <img src="../storages/artikel/<?= htmlspecialchars($item->image) ?>">

                            <!-- 🔥 BADGE TANGGAL -->
                            <div style="
                                position:absolute;
                                top:30px;
                                left:30px;
                                background:#1FA67A;
                                color:#fff;
                                font-size:12px;
                                font-weight:600;
                                padding:6px 12px;
                                border-radius:20px;
                            ">
                                <?= $tanggalIndo ?>
                            </div>

                        </div>

                        <div class="card-body">

                            <h3><?= htmlspecialchars($item->nama) ?></h3>

                            <p>
                                <?= htmlspecialchars(substr($item->keterangan, 0, 140)) ?>...
                            </p>

                            <div class="btn-wrapper">
                                <a href="./pages/asla/artikel.php?id=<?= $item->id ?>" class="btn-detail">
                                    Selengkapnya
                                </a>
                            </div>

                        </div>

                    </div>

                </div>

            <?php endwhile; ?>

        </div>

    </div>

</section>