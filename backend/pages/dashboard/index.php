<?php
include "../../partials/header.php";

// Ambil total data
$totalArtikel = mysqli_fetch_assoc(mysqli_query($connect, "SELECT COUNT(*) AS total FROM artikel"))['total'];
$totalContact = mysqli_fetch_assoc(mysqli_query($connect, "SELECT COUNT(*) AS total FROM contact"))['total'];
$totalGallery = mysqli_fetch_assoc(mysqli_query($connect, "SELECT COUNT(*) AS total FROM galleries"))['total'];
$totalGuru = mysqli_fetch_assoc(mysqli_query($connect, "SELECT COUNT(*) AS total FROM guru"))['total'];
$totalFasilitas = mysqli_fetch_assoc(mysqli_query($connect, "SELECT COUNT(*) AS total FROM fasilitas"))['total'];
$totalPencapaian = mysqli_fetch_assoc(mysqli_query($connect, "SELECT COUNT(*) AS total FROM pencapaian"))['total'];
$totalEkskul = mysqli_fetch_assoc(mysqli_query($connect, "SELECT COUNT(*) AS total FROM ekstrakulikuler"))['total'];
?>

<div class="wrapper">
    <?php include "../../partials/sidebar.php"; ?>
    <div class="main">
        <?php include "../../partials/navbar.php"; ?>

        <main class="content">
            <div class="container-fluid p-0">
                <h1 class="h3 mb-3"><strong>Dashboard</strong> Analytics</h1>

                <div class="row">

                    <!-- Bar Chart -->
                    <div class="col-12 col-lg-6 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h5>Total Data (Bar Chart)</h5>
                            </div>
                            <div class="card-body">
                                <canvas id="barChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- Pie Chart (CARD FULL, ISI KECIL) -->
                    <div class="col-12 col-lg-6 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h5>Distribusi Data (Pie Chart)</h5>
                            </div>
                            <div class="card-body d-flex justify-content-center align-items-center">
                                <div style="width:250px; height:250px;">
                                    <canvas id="pieChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Line Chart -->
                    <div class="col-12 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h5>Trend Total Data (Line Chart)</h5>
                            </div>
                            <div class="card-body">
                                <canvas id="lineChart"></canvas>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>

        <?php include "../../partials/footer.php"; ?>
    </div>
</div>

<?php include "../../partials/script.php"; ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const labels = ['Artikel', 'Contact', 'Gallery', 'Guru', 'Fasilitas', 'Pencapaian', 'Ekskul'];
    const totals = [
        <?= $totalArtikel ?>,
        <?= $totalContact ?>,
        <?= $totalGallery ?>,
        <?= $totalGuru ?>,
        <?= $totalFasilitas ?>,
        <?= $totalPencapaian ?>,
        <?= $totalEkskul ?>
    ];

    const colors = ['#0ea5e9', '#059669', '#0284c7', '#f59e0b', '#8b5cf6', '#ec4899', '#f87171'];

    // BAR
    new Chart(document.getElementById('barChart'), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Total',
                data: totals,
                backgroundColor: colors
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // PIE (KECIL DI TENGAH)
    new Chart(document.getElementById('pieChart'), {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                data: totals,
                backgroundColor: colors
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });

    // LINE
    new Chart(document.getElementById('lineChart'), {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Total Data',
                data: totals,
                borderColor: '#059669',
                backgroundColor: 'rgba(5,150,105,0.2)',
                tension: 0.4,
                fill: true,
                pointRadius: 5
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
</script>

<style>
    .card {
        border-radius: 16px;
        box-shadow: 0 12px 28px rgba(16, 185, 129, 0.18);
    }

    .card-header {
        background: linear-gradient(90deg, #059669, #0ea5e9, #0284c7);
        color: #fff;
        font-weight: 600;
        border-radius: 16px 16px 0 0;
        padding: 16px 22px;
    }
</style>