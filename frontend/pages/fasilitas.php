<?php
/* fasilitas */
$qfasilitas = "SELECT * FROM fasilitas LIMIT 3";
$resultfasilitas = mysqli_query($connect, $qfasilitas);
?>

<section class="fasilitas" id="fasilitas" style="
    padding:100px 0 60px;
    background:#f1f5f9;
">

    <div class="container">

        <div class="text-center mb-5">
            <h2 class="title">Fasilitas</h2>
            <p class="subtitle">fasilitas yang ada di sekolah</p>
        </div>

        <div class="row g-4">

            <?php while ($item = $resultfasilitas->fetch_object()) : ?>

                <div class="col-lg-4 col-md-6">

                    <!-- 🔥 SAMA CLASS DENGAN ARTIKEL -->
                    <div class="ekskul-card">

                        <div class="img-box">

                            <img src="../storages/fasilitas/<?= htmlspecialchars($item->image) ?>">

                        </div>

                        <div class="card-body">

                            <h3><?= htmlspecialchars($item->nama) ?></h3>

                            <!-- BIAR TINGGI SAMA -->
                            <p style="visibility:hidden;">
                            </p>

                        </div>

                    </div>

                </div>

            <?php endwhile; ?>

        </div>

    </div>

</section>