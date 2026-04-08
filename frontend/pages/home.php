<?php
$qabout = "SELECT * FROM about";
$resultabout = mysqli_query($connect, $qabout) or die(mysqli_error($connect));
?>

<section class="hero-slider" id="hero-slider">

    <div class="hero-wrapper">

        <?php while ($item = $resultabout->fetch_object()) : ?>
            <div class="hero-slide"
                style="background-image: url('../storages/about/<?= $item->banner ?>');">

                <div class="hero-overlay"></div>

                <div class="hero-content">
                    <h1><?= $item->name ?></h1>
                    <p class="hero-desc"><?= $item->keterangan ?></p>
                    <p class="hero-address"><?= $item->alamat ?></p>

                    <div class="hero-btn">
                        <a href="#headmaster" class="btn-get-started">Sambutan Kepala Sekolah</a>
                        <a href="#contact" class="btn-outline">Kontak</a>
                    </div>
                </div>

            </div>
        <?php endwhile; ?>

    </div>

</section>

<style>
    /* RESET */
    body {
        margin: 0;
        padding: 0;
    }

    /* HERO SLIDER */
    .hero-slider {
        position: relative;
        width: 100%;
        height: 100vh;
        overflow: hidden;
        margin: 0;
        padding: 0;
    }

    /* WRAPPER */
    .hero-wrapper {
        display: flex;
        height: 100%;
        transition: transform 1s ease;
    }

    /* SLIDE */
    .hero-slide {
        min-width: 100%;
        height: 100%;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        position: relative;
    }

    /* OVERLAY */
    .hero-overlay {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.55);
    }

    /* CONTENT */
    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 900px;
        padding: 20px;
        color: #ffffff;
    }

    /* TEXT */
    .hero-content h1 {
        font-size: 48px;
        font-weight: 700;
        margin-bottom: 16px;
    }

    .hero-desc {
        font-size: 20px;
        margin-bottom: 10px;
    }

    .hero-address {
        font-size: 18px;
        margin-bottom: 32px;
    }

    /* BUTTON */
    .hero-btn {
        display: flex;
        justify-content: center;
        gap: 16px;
        flex-wrap: wrap;
    }

    .btn-get-started {
        padding: 12px 30px;
        background: #ffffff;
        color: #065f46;
        font-weight: 600;
        border-radius: 30px;
        text-decoration: none;
    }

    .btn-outline {
        padding: 12px 30px;
        border: 2px solid #ffffff;
        color: #ffffff;
        font-weight: 600;
        border-radius: 30px;
        text-decoration: none;
    }

    /* RESPONSIVE */
    @media (max-width:768px) {

        .hero-content h1 {
            font-size: 32px;
        }

        .hero-desc {
            font-size: 16px;
        }

        .hero-address {
            font-size: 15px;
        }

    }
</style>

<script>
    const wrapper = document.querySelector('.hero-wrapper');
    const slides = document.querySelectorAll('.hero-slide');

    let index = 0;

    function nextSlide() {

        index++;

        if (index >= slides.length) {
            index = 0;
        }

        wrapper.style.transform = `translateX(-${index * 100}%)`;

    }

    setInterval(nextSlide, 5000);
</script>