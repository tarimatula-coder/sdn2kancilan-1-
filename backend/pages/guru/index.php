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
                                <h5 class="mb-0 fw-bold">Tabel guru</h5>
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
                                                <th>Jabatan</th>
                                                <th width="25%">Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $result = mysqli_query($connect, "SELECT * FROM guru");
                                            while ($item = mysqli_fetch_object($result)):
                                            ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>

                                                    <td>
                                                        <img src="../../../storages/guru/<?= $item->image ?>"
                                                            class="img-thumbnail"
                                                            style="width:90px; height:90px; object-fit:cover;">
                                                    </td>

                                                    <td>
                                                        <a href="<?= $item->nama ?>" target="_blank"
                                                            class="text-primary fw-semibold">
                                                            <?= $item->nama ?>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="<?= $item->jabatan ?>" target="_blank"
                                                            class="text-primary fw-semibold">
                                                            <?= $item->jabatan ?>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex justify-content-center gap-2">

                                                            <a href="./edit.php?id=<?= $item->id ?>"
                                                                class="btn btn-warning btn-sm d-flex align-items-center gap-1">
                                                                <i class="ti ti-edit"></i>
                                                                Edit
                                                            </a>

                                                            <a href="../../actions/guru/destroy.php?id=<?= $item->id ?>"
                                                                onclick="return confirm('Yakin hapus data ini?')"
                                                                class="btn btn-danger btn-sm d-flex align-items-center gap-1">
                                                                <i class="ti ti-trash"></i>
                                                                Hapus
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

            </div>
        </main>

        <?php include '../../partials/footer.php'; ?>

    </div>
</div>

<?php include '../../partials/script.php'; ?>

<style>
    /* ===== ANIMASI GRADIENT ===== */
    @keyframes gradientMove {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }

    /* ===== CARD ===== */
    .card {
        background: linear-gradient(120deg,
                #ecfdf5,
                /* hijau muda */
                #dbeafe,
                /* biru muda */
                #e0f2fe,
                /* biru soft */
                #f0fdfa
                /* hijau lembut */
            );
        background-size: 300% 300%;
        animation:
            fadeSlideUp 0.8s ease forwards,
            gradientMove 9s ease infinite;

        border: none;
        border-radius: 16px;
        box-shadow: 0 12px 28px rgba(16, 185, 129, 0.18);
    }

    /* ===== HEADER CARD ===== */
    .card-header {
        background: linear-gradient(90deg,
                #059669,
                /* hijau */
                #0ea5e9,
                /* biru */
                #0284c7
                /* biru tua */
            );
        background-size: 200% 200%;
        animation: gradientMove 6s ease infinite;

        color: #ffffff;
        border-radius: 16px 16px 0 0;
        padding: 16px 22px;
    }

    .card-header h5 {
        color: #ffffff;
        font-weight: 600;
    }
</style>