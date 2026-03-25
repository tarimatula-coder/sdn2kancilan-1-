<?php
$qheadmaster = "SELECT * FROM headmaster LIMIT 1";
$resultheadmaster = mysqli_query($connect, $qheadmaster) or die(mysqli_error($connect));
?>

<section id="headmaster" class="headmaster-section">
    <div class="container">
        <?php while ($item = $resultheadmaster->fetch_object()) : ?>
            <div class="row align-items-center g-5">

                <!-- TEXT -->
                <div class="col-lg-6">
                    <h4 class="headmaster-title">SAMBUTAN KEPALA SEKOLAH</h4>
                    <div class="headmaster-text">
                        <?= $item->keterangan ?>
                    </div>
                </div>

                <!-- CARD FOTO -->
                <div class="col-lg-6 text-center">
                    <div class="headmaster-card">

                        <!-- FRAME -->
                        <div class="frame-soft"></div>

                        <!-- FOTO -->
                        <div class="photo-box">
                            <img src="../storages/headmaster/<?= $item->image ?>" alt="<?= $item->name ?>">
                        </div>

                        <!-- NAMA BADGE -->
                        <div class="name-badge">
                            <?= $item->name ?>
                        </div>

                    </div>
                </div>

            </div>
        <?php endwhile; ?>
    </div>
</section>

<style>
    /* SECTION */
    .headmaster-section {
        background: #f8fafc;
        padding: 80px 0;
    }

    .headmaster-title {
        font-weight: 700;
        margin-bottom: 18px;
        color: #1FA67A;
        /* hijau tua soft */
    }

    /* INNER CARD - KETERANGAN */
    .headmaster-text {
        background: rgba(255, 255, 255, 0.95);
        /* hitam semi transparan */
        padding: 26px;
        border-radius: 20px;
        border: 1px solid rgba(0, 0, 0, 0.3);
        /* border hitam transparan */
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        /* shadow lembut */
        line-height: 1.8;
        color: #000000;
        /* teks hitam */
        font-size: 15px;
        transition: 0.3s ease;
    }

    /* CARD FOTO */
    .headmaster-card {
        position: relative;
        width: 300px;
        margin: auto;
    }

    .frame-soft {
        position: absolute;
        width: 100%;
        height: 100%;
        border: 5px solid rgba(27, 94, 32, 0.4);
        border-radius: 24px;
        transform: translate(25px, -20px);
        z-index: 1;
    }

    .photo-box {
        position: relative;
        height: 390px;
        background: rgba(255, 255, 255, 0.1);
        /* tembus pandang */
        border-radius: 30px;
        overflow: hidden;
        z-index: 2;
        box-shadow: 0 18px 40px rgba(27, 94, 32, 0.12);
        transition: .35s ease;
    }

    .photo-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* NAME BADGE / BUTTON - hijau tua soft */
    .name-badge {
        position: absolute;
        bottom: -18px;
        left: 50%;
        transform: translateX(-50%);
        background: #1FA67A;
        /* hijau tua soft */
        padding: 12px 30px;
        width: 200px;
        border-radius: 999px;
        font-weight: 600;
        font-size: 14px;
        color: #ffffff;
        box-shadow: 0 8px 20px rgba(20, 90, 22, 0.25);
        /* shadow lembut hijau */
        z-index: 3;
        border: 2px solid #1FA67A;
        /* aksen hijau tua */
        transition: 0.3s ease;
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {
        .headmaster-card {
            width: 230px;
        }

        .photo-box {
            height: 300px;
        }

        .headmaster-title,
        .headmaster-text {
            text-align: center;
        }
    }
</style>