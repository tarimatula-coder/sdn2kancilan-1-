<?php
include '../../partials/header.php';

$role = $_SESSION['role'] ?? 'pengguna';
$result = mysqli_query($connect, "SELECT * FROM about") or die(mysqli_error($connect));
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
                                <h5 class="mb-0 fw-bold">Tabel About</h5>
                                <?php if (in_array($role, ['admin', 'editor'])): ?>
                                    <a href="./create.php" class="btn btn-primary btn-sm">Tambah</a>
                                <?php endif; ?>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-bordered table-hover align-middle text-center w-100">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>Logo</th>
                                                <th>Banner</th>
                                                <th>Nama</th>
                                                <th>Keterangan</th>
                                                <th>Alamat</th>
                                                <?php if (in_array($role, ['admin', 'editor'])): ?>
                                                    <th>Aksi</th>
                                                <?php endif; ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            while ($item = mysqli_fetch_object($result)): ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>

                                                    <!-- 🔥 GAMBAR SUDAH SAMA -->
                                                    <td>
                                                        <img src="../../../storages/about/<?= $item->logo ?>" class="table-img">
                                                    </td>

                                                    <td>
                                                        <img src="../../../storages/about/<?= $item->banner ?>" class="table-img">
                                                    </td>

                                                    <td><?= htmlspecialchars($item->name) ?></td>
                                                    <td style="text-align:left;">
                                                        <?= nl2br(htmlspecialchars($item->keterangan)) ?>
                                                    </td>
                                                    <td><?= htmlspecialchars($item->alamat) ?></td>

                                                    <?php if (in_array($role, ['admin', 'editor'])): ?>
                                                        <td>
                                                            <div class="d-flex justify-content-center gap-2">
                                                                <a href="./edit.php?id=<?= $item->id ?>" class="btn btn-warning btn-sm">
                                                                    Edit
                                                                </a>
                                                                <?php if ($role == 'admin'): ?>
                                                                    <a href="../../actions/about/destroy.php?id=<?= $item->id ?>"
                                                                        onclick="return confirm('Yakin hapus data ini?')"
                                                                        class="btn btn-danger btn-sm">
                                                                        Hapus
                                                                    </a>
                                                                <?php endif; ?>
                                                            </div>
                                                        </td>
                                                    <?php endif; ?>

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
    /* 🔥 SAMA SEPERTI ARTIKEL */
    .table-img {
        width: 100px;
        height: auto;
        object-fit: cover;
        border-radius: 8px;
    }

    /* CARD STYLE */
    .card {
        background: linear-gradient(120deg, #ecfdf5, #dbeafe, #e0f2fe, #f0fdfa);
        background-size: 300% 300%;
        border: none;
        border-radius: 16px;
        box-shadow: 0 12px 28px rgba(16, 185, 129, 0.18);
        animation: gradientMove 9s ease infinite;
    }

    .card-header {
        background: linear-gradient(90deg, #059669, #0ea5e9, #0284c7);
        background-size: 200% 200%;
        color: #fff;
        border-radius: 16px 16px 0 0;
        padding: 16px 22px;
        animation: gradientMove 6s ease infinite;
    }

    .card-header h5 {
        font-weight: 600;
        color: #fff;
    }

    td {
        vertical-align: middle;
    }

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
</style>