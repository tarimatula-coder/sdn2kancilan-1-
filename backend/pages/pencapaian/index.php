<?php
include '../../partials/header.php';
?>

<div class="wrapper">

    <?php include '../../partials/sidebar.php'; ?>

    <div class="main">

        <?php include '../../partials/navbar.php'; ?>

        <main class="content">
            <div class="container-fluid p-0">

                <div class="row">
                    <div class="col-12">

                        <div class="card shadow-sm">

                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h5 class="mb-0 fw-bold">Tabel Pencapaian</h5>

                                <a href="./create.php" class="btn btn-primary btn-sm">
                                    Tambah
                                </a>
                            </div>

                            <div class="card-body">

                                <div class="table-responsive">

                                    <table id="datatable"
                                        class="table table-bordered table-hover align-middle text-center w-100">

                                        <thead class="table-dark">
                                            <tr>
                                                <th width="5%">No</th>
                                                <th width="20%">Gambar</th>
                                                <th>Nama</th>
                                                <th>Keterangan</th>
                                                <th width="25%">Selengkapnya</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php
                                            $no = 1;
                                            $result = mysqli_query($connect, "SELECT * FROM pencapaian");
                                            while ($item = mysqli_fetch_object($result)):
                                            ?>

                                                <tr>

                                                    <td><?= $no++ ?></td>

                                                    <td>
                                                        <img src="../../../storages/pencapaian/<?= $item->image ?>"
                                                            class="img-thumbnail"
                                                            style="width:90px;height:90px;object-fit:cover;">
                                                    </td>

                                                    <td>
                                                        <a href="<?= $item->nama ?>" target="_blank"
                                                            class="text-primary fw-semibold">
                                                            <?= $item->nama ?>
                                                        </a>
                                                    </td>

                                                    <td>
                                                        <div style="text-align:left;">
                                                            <?= nl2br($item->keterangan); ?>
                                                        </div>
                                                    </td>

                                                    <td class="action-column">

                                                        <div class="action-buttons">

                                                            <a href="./edit.php?id=<?= $item->id ?>"
                                                                class="btn btn-warning btn-sm">
                                                                <i class="ti ti-edit"></i> Edit
                                                            </a>

                                                            <a href="../../actions/pencapaian/destroy.php?id=<?= $item->id ?>"
                                                                onclick="return confirm('Yakin hapus data ini?')"
                                                                class="btn btn-danger btn-sm">
                                                                <i class="ti ti-trash"></i> Hapus
                                                            </a>

                                                        </div>

                                                    </td>

                                                </tr>

                                            <?php endwhile; ?>

                                        </tbody>

                                    </table>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <!-- CARD PREVIEW PENCAPAIAN -->
                <div class="row mt-4">
                    <div class="col-12">

                        <div class="card shadow-sm">

                            <div class="card-header">
                                <h5 class="mb-0 fw-bold">Preview Card Pencapaian</h5>
                            </div>

                            <div class="card-body">

                                <div class="row g-4">

                                    <?php
                                    $resultCard = mysqli_query($connect, "SELECT * FROM pencapaian LIMIT 3");
                                    while ($card = mysqli_fetch_object($resultCard)):
                                    ?>

                                        <div class="col-md-4">

                                            <div class="pencapaian-card">

                                                <div class="card-img">
                                                    <img src="../../../storages/pencapaian/<?= $card->image ?>">
                                                </div>

                                                <div class="card-content">

                                                    <h4><?= $card->nama ?></h4>

                                                    <p>
                                                        <?= substr(strip_tags($card->keterangan), 0, 120) ?>...
                                                    </p>

                                                    <a href="<?= $card->nama ?>" target="_blank" class="btn-detail">
                                                        Lihat Detail →
                                                    </a>

                                                </div>

                                                <div class="wave"></div>

                                            </div>

                                        </div>

                                    <?php endwhile; ?>

                                </div>

                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </main>

        <?php include '../../partials/footer.php'; ?>

    </div>
</div>

<?php include '../../partials/script.php'; ?>


<style>
    td div {
        white-space: pre-line;
        line-height: 1.3;
    }

    /* CARD UTAMA */
    .card {
        border: none;
        border-radius: 16px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
    }

    /* HEADER CARD */
    .card-header {
        background: linear-gradient(120deg, #a7f3d0, #bfdbfe);
        color: #1e293b;
        border-radius: 16px 16px 0 0;
    }


    /* =========================
CARD PREVIEW PENCAPAIAN
========================= */

    .pencapaian-card {
        position: relative;
        background: #fff;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        transition: .35s;
        height: 100%;
    }

    .pencapaian-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 35px rgba(0, 0, 0, 0.12);
    }

    .card-img img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 16px 16px 0 0;
    }

    .card-content {
        padding: 22px;
        text-align: center;
        position: relative;
        z-index: 2;
    }

    .card-content h4 {
        font-weight: 700;
        color: #334155;
        margin-bottom: 10px;
    }

    .card-content p {
        font-size: 14px;
        color: #64748b;
        margin-bottom: 18px;
    }

    .btn-detail {
        text-decoration: none;
        font-weight: 600;
        color: #2563eb;
        font-size: 14px;
    }

    .btn-detail:hover {
        color: #1d4ed8;
    }

    /* WAVE SOFT */
    .wave {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 120px;
        background: linear-gradient(120deg,
                #fde68a,
                #bfdbfe,
                #fbcfe8);
        border-radius: 50% 50% 0 0;
        opacity: .35;
        filter: blur(10px);
    }

    /* ACTION BUTTON */
    .action-buttons {
        display: flex;
        justify-content: center;
        gap: 10px;
    }
</style>