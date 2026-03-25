<?php

// TOTAL GURU
$qGuru = mysqli_query($connect, "SELECT COUNT(*) as total FROM guru");
$dataGuru = mysqli_fetch_assoc($qGuru);

// TOTAL EKSTRAKURIKULER
$qEkskul = mysqli_query($connect, "SELECT COUNT(*) as total FROM ekstrakulikuler");
$dataEkskul = mysqli_fetch_assoc($qEkskul);

// TOTAL PENCAPAIAN
$qPencapaian = mysqli_query($connect, "SELECT COUNT(*) as total FROM pencapaian");
$dataPencapaian = mysqli_fetch_assoc($qPencapaian);
?>

<section class="keunggulan">

    <div class="container">

        <div class="grid-keunggulan">

            <!-- TOTAL GURU -->
            <div class="item">
                <div class="icon">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <h2><?= $dataGuru['total']; ?></h2>
                <h3>Total Guru</h3>
                <p>Jumlah tenaga pendidik profesional yang mengajar di sekolah.</p>
            </div>

            <!-- TOTAL EKSTRAKURIKULER -->
            <div class="item">
                <div class="icon">
                    <i class="fas fa-futbol"></i>
                </div>
                <h2><?= $dataEkskul['total']; ?></h2>
                <h3>Ekstrakurikuler</h3>
                <p>Berbagai kegiatan ekstrakurikuler untuk mengembangkan bakat siswa.</p>
            </div>

            <!-- TOTAL PENCAPAIAN -->
            <div class="item">
                <div class="icon">
                    <i class="fas fa-trophy"></i>
                </div>
                <h2><?= $dataPencapaian['total']; ?></h2>
                <h3>Pencapaian</h3>
                <p>Prestasi yang diraih siswa di tingkat regional maupun nasional.</p>
            </div>

        </div>
    </div>

</section>

<style>
    .keunggulan {
        padding: 80px 20px;
        background: #f5f5f5;
        background-image: url("https://www.transparenttextures.com/patterns/topography.png");
        display: flex;
        justify-content: center;
    }

    .container {
        max-width: 1100px;
        width: 100%;
        margin: auto;
    }

    .grid-keunggulan {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 40px;
        text-align: center;
        justify-content: center;
    }

    .item {
        padding: 30px;
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        transition: 0.3s;
    }

    .item:hover {
        transform: translateY(-10px);
    }

    .icon {
        width: 100px;
        height: 100px;
        margin: auto;
        background: #f1f1f1;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 40px;
        margin-bottom: 20px;
    }

    .item h2 {
        font-size: 42px;
        font-weight: 700;
        color: #2c3e50;
    }

    .item h3 {
        font-size: 20px;
        margin: 10px 0;
    }

    .item p {
        font-size: 14px;
        color: #666;
        line-height: 1.6;
    }

    @media(max-width:992px) {
        .grid-keunggulan {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media(max-width:600px) {
        .grid-keunggulan {
            grid-template-columns: 1fr;
        }
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">