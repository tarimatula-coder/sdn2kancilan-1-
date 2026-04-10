<?php
$qekstrakulikuler = "SELECT * FROM ekstrakulikuler LIMIT 3";
$resultekstrakulikuler = mysqli_query($connect, $qekstrakulikuler);
?>

<section class="ekstrakulikuler" id="ekstrakulikuler" style="
    padding:100px 0 60px; /* 🔥 sama seperti artikel */
    background:#f1f5f9;   /* 🔥 bukan putih */
">

    <div class="container">

        <div class="text-center mb-5">
            <h2 class="title">Ekstrakurikuler</h2>
            <p class="subtitle">Kegiatan seru siswa di luar kelas</p>
        </div>

        <div class="row g-4">

            <?php while ($item = $resultekstrakulikuler->fetch_object()) : ?>

                <div class="col-lg-4 col-md-6">

                    <div class="ekskul-card">

                        <div class="img-box">
                            <img src="../storages/ekstrakulikuler/<?= htmlspecialchars($item->image) ?>"
                                alt="<?= htmlspecialchars($item->nama) ?>">
                        </div>

                        <div class="card-body">

                            <h3><?= htmlspecialchars($item->nama) ?></h3>

                            <p>
                                <?= htmlspecialchars(substr($item->keterangan, 0, 140)) ?>...
                            </p>

                            <div class="btn-wrapper">
                                <a href="./pages/asla/ekstrakulikuler.php?id=<?= $item->id ?>" class="btn-detail">
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


<style>
    .title {
        font-size: 34px;
        font-weight: 700;
        color: #1e293b;
    }

    .subtitle {
        color: #64748b;
        font-size: 16px;
        margin-top: 5px;
    }

    /* CARD */
    .ekskul-card {
        background: #ffffff;
        border-radius: 22px;
        border: 1px solid #e5e7eb;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.06);
        overflow: hidden;
        transition: 0.35s;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .ekskul-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 18px 40px rgba(0, 0, 0, 0.12);
    }

    /* IMAGE */
    .img-box {
        padding: 20px 20px 10px 20px;
    }

    .img-box img {
        width: 100%;
        height: 210px;
        object-fit: cover;
        border-radius: 14px;
    }

    /* BODY */
    .card-body {
        padding: 20px 35px 35px 35px;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
        text-align: center;
    }

    .card-body h3 {
        font-size: 22px;
        font-weight: 700;
        color: #1e293b;
        margin-top: 10px;
        margin-bottom: 15px;
    }

    .card-body p {
        font-size: 15px;
        color: #64748b;
        line-height: 1.7;
        margin-bottom: 28px;
        padding: 0 12px;
        text-align: left;
    }

    /* BUTTON */
    .btn-wrapper {
        margin-top: auto;
        padding: 0 20px 10px 20px;
        display: flex;
        justify-content: center;
    }

    .btn-detail {
        display: inline-block;
        padding: 12px 28px;
        background: #1FA67A;
        color: #fff;
        border-radius: 30px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-detail:hover {
        background: #1FA67A;
        transform: scale(1.05);
    }
</style>