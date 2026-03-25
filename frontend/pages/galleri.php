<?php
$qgalleri = "SELECT * FROM galleries LIMIT 6";
$resultgalleri = mysqli_query($connect, $qgalleri) or die(mysqli_error($connect));
?>

<section id="galeri" class="galeri">
    <div class="container">

        <!-- JUDUL -->
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="galeri-title">Galeri Kegiatan</h2>
                <p class="galeri-subtitle">
                    Dokumentasi kegiatan dan prestasi sekolah
                </p>
            </div>
        </div>

        <!-- GALERI -->
        <div class="row g-4">
            <?php while ($item = $resultgalleri->fetch_object()) : ?>
                <div class="col-lg-4 col-md-6">

                    <div class="galeri-card">

                        <div class="galeri-img">
                            <img src="../storages/galleri/<?= htmlspecialchars($item->image) ?>" alt="Galeri">

                            <!-- OVERLAY -->
                            <div class="galeri-overlay">
                                <button class="galeri-btn"
                                    onclick="openPreview('../storages/galleri/<?= htmlspecialchars($item->image) ?>')">
                                    <i class="bx bx-expand"></i>
                                </button>
                            </div>

                        </div>

                    </div>

                </div>
            <?php endwhile; ?>
        </div>

    </div>
</section>

<!-- PREVIEW -->
<div id="galeriPreview" class="galeri-preview">
    <span class="galeri-close" onclick="closePreview()">✕</span>
    <img id="previewImage" src="">
</div>

<style>
    /* SECTION */
    .galeri {
        padding: 80px 0;
        background: #ffffff;
    }

    /* TITLE */
    .galeri-title {
        font-weight: 700;
        color: #1e293b;
    }

    .galeri-subtitle {
        color: #64748b;
        max-width: 600px;
        margin: auto;
    }

    /* CARD */
    .galeri-card {
        border-radius: 28px;
        overflow: hidden;
        position: relative;
        background: #fff;
        box-shadow: 0 10px 30px rgba(0, 0, 0, .08);
        transition: .4s;
    }

    .galeri-card:hover {
        transform: translateY(-10px) scale(1.02);
    }

    /* IMAGE */
    .galeri-img {
        position: relative;
        height: 250px;
        overflow: hidden;
    }

    .galeri-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: .5s;
    }

    .galeri-card:hover img {
        transform: scale(1.1);
    }

    /* OVERLAY HITAM TRANSPARAN */
    .galeri-overlay {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: .4s ease;
    }

    .galeri-card:hover .galeri-overlay {
        opacity: 1;
    }

    /* TOMBOL HIJAU */
    .galeri-btn {
        width: 55px;
        height: 55px;
        border-radius: 50%;
        border: none;
        background: #1FA67A;
        color: #fff;
        font-size: 22px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: .3s;
    }

    .galeri-btn:hover {
        transform: scale(1.15);
        background: #178f69;
    }

    /* PREVIEW */
    .galeri-preview {
        position: fixed;
        inset: 0;
        background: rgba(15, 23, 42, .95);
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 9999;
    }

    .galeri-preview img {
        max-width: 90%;
        max-height: 85%;
        border-radius: 14px;
    }

    .galeri-close {
        position: absolute;
        top: 20px;
        right: 30px;
        font-size: 30px;
        color: #fff;
        cursor: pointer;
    }

    /* RESPONSIVE */
    @media(max-width:768px) {
        .galeri-img {
            height: 200px;
        }
    }
</style>

<script>
    function openPreview(img) {
        document.getElementById('previewImage').src = img;
        document.getElementById('galeriPreview').style.display = 'flex';
    }

    function closePreview() {
        document.getElementById('galeriPreview').style.display = 'none';
    }
</script>

<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">