<?php
$qpencapaian = "SELECT * FROM pencapaian LIMIT 3";
$resultpencapaian = mysqli_query($connect, $qpencapaian);
?>

<section id="pencapaian" class="pencapaian-section">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="pencapaian-title">Prestasi Siswa</h2>
        </div>

        <div class="row g-4">

            <?php while ($item = $resultpencapaian->fetch_object()) : ?>

                <div class="col-md-4">
                    <div class="prestasi-card">

                        <img src="../storages/pencapaian/<?= htmlspecialchars($item->image) ?>"
                            alt="<?= htmlspecialchars($item->nama) ?>">

                        <div class="prestasi-overlay">
                            <h5><?= htmlspecialchars($item->nama) ?></h5>
                            <p><?= nl2br(htmlspecialchars($item->keterangan)); ?></p>
                        </div>

                    </div>
                </div>

            <?php endwhile; ?>

        </div>
    </div>
</section>

<style>
    /* SECTION */
    #pencapaian {
        padding: 80px 20px;
        background: #f9fafb;
    }

    .pencapaian-title {
        font-size: 28px;
        font-weight: 700;
    }

    /* CARD */
    .prestasi-card {
        position: relative;
        border-radius: 16px;
        overflow: hidden;
        height: 390px;

        background: #fff;
        border: 1px solid #e5e7eb;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.06);
    }

    /* IMAGE */
    .prestasi-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* TEXT */
    .prestasi-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        padding: 20px;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.75), transparent);
        color: #fff;
    }

    .prestasi-overlay h5 {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 5px;
    }

    .prestasi-overlay p {
        font-size: 14px;
        margin: 0;
        opacity: 0.9;
    }
</style>