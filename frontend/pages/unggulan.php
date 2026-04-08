<?php

/* ABOUT */
$qabout = mysqli_query($connect, "SELECT * FROM about LIMIT 1");
$aboutHeader = mysqli_fetch_object($qabout);

/* TOTAL GURU */
$qGuru = mysqli_query($connect, "SELECT COUNT(*) as total FROM guru");
$dataGuru = mysqli_fetch_assoc($qGuru);

/* TOTAL EKSTRAKURIKULER */
$qEkskul = mysqli_query($connect, "SELECT COUNT(*) as total FROM ekstrakulikuler");
$dataEkskul = mysqli_fetch_assoc($qEkskul);

/* TOTAL PENCAPAIAN */
$qPencapaian = mysqli_query($connect, "SELECT COUNT(*) as total FROM pencapaian");
$dataPencapaian = mysqli_fetch_assoc($qPencapaian);

/* TOTAL GALERI */
$qGaleri = mysqli_query($connect, "SELECT COUNT(*) as total FROM galleries");
$dataGaleri = mysqli_fetch_assoc($qGaleri);

/* TOTAL ARTIKEL */
$qArtikel = mysqli_query($connect, "SELECT COUNT(*) as total FROM artikel");
$dataArtikel = mysqli_fetch_assoc($qArtikel);

/* TOTAL FASILITAS */
$qFasilitas = mysqli_query($connect, "SELECT COUNT(*) as total FROM fasilitas");
$dataFasilitas = mysqli_fetch_assoc($qFasilitas);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($aboutHeader->name ?? 'Sekolah') ?></title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: #f1f5f9;
        }

        .keunggulan {
            padding: 80px 20px;
            background: #f5f5f5;
            background-image: url("https://www.transparenttextures.com/patterns/topography.png");
            display: flex;
            justify-content: center;
        }

        .container {
            max-width: 1200px;
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

        @media(max-width:1200px) {
            .grid-keunggulan {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media(max-width:768px) {
            .grid-keunggulan {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <section class="keunggulan" id="keunggulan">
        <div class="container">
            <div class="grid-keunggulan">
                <div class="item">
                    <div class="icon"><i class="fas fa-chalkboard-teacher"></i></div>
                    <h2><?= $dataGuru['total']; ?></h2>
                    <h3>Total Guru</h3>
                </div>

                <div class="item">
                    <div class="icon"><i class="fas fa-futbol"></i></div>
                    <h2><?= $dataEkskul['total']; ?></h2>
                    <h3>Total Ekstrakurikuler</h3>
                </div>

                <div class="item">
                    <div class="icon"><i class="fas fa-trophy"></i></div>
                    <h2><?= $dataPencapaian['total']; ?></h2>
                    <h3>Total Pencapaian</h3>
                </div>

                <div class="item">
                    <div class="icon"><i class="fas fa-image"></i></div>
                    <h2><?= $dataGaleri['total']; ?></h2>
                    <h3>Total Galeri</h3>
                </div>

                <div class="item">
                    <div class="icon"><i class="fas fa-newspaper"></i></div>
                    <h2><?= $dataArtikel['total']; ?></h2>
                    <h3>Total Artikel</h3>
                </div>

                <div class="item">
                    <div class="icon"><i class="fas fa-building"></i></div>
                    <h2><?= $dataFasilitas['total']; ?></h2>
                    <h3>Total Fasilitas</h3>
                </div>
            </div>
        </div>
    </section>

</body>

</html>