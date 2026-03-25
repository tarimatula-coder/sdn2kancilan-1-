<?php
$qvisi = "SELECT * FROM visi_misi WHERE category='visi'";
$qmisi = "SELECT * FROM visi_misi WHERE category='misi'";

$resultVisi = mysqli_query($connect, $qvisi);
$resultMisi = mysqli_query($connect, $qmisi);
?>

<section id="visi-misi" class="visi-misi">

    <div class="container">

        <div class="row">
            <div class="col-12 text-center mb-4">
                <h1>Visi & Misi</h1>
                <p class="mx-auto" style="max-width:600px;">
                    Visi dan Misi sebagai arah dan tujuan pendidikan sekolah
                </p>
            </div>
        </div>

        <div class="accordion" id="accordionVisiMisi">

            <!-- VISI -->

            <div class="accordion-item">

                <h2 class="accordion-header" id="headingVisi">

                    <button class="accordion-button" type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapseVisi"
                        aria-expanded="true"
                        aria-controls="collapseVisi">

                        Visi

                    </button>

                </h2>

                <div id="collapseVisi"
                    class="accordion-collapse collapse show"
                    aria-labelledby="headingVisi"
                    data-bs-parent="#accordionVisiMisi">

                    <div class="accordion-body">

                        <ol>

                            <?php if (mysqli_num_rows($resultVisi) > 0) : ?>

                                <?php while ($v = mysqli_fetch_object($resultVisi)) : ?>

                                    <?php
                                    $visiItems = explode("\n", $v->text);

                                    foreach ($visiItems as $item) {

                                        if (trim($item) != "") {

                                            echo "<li>" . htmlspecialchars($item) . "</li>";
                                        }
                                    }
                                    ?>

                                <?php endwhile; ?>

                            <?php else : ?>

                                <li>Visi belum tersedia.</li>

                            <?php endif; ?>

                        </ol>

                    </div>

                </div>

            </div>

            <!-- MISI -->

            <div class="accordion-item">

                <h2 class="accordion-header" id="headingMisi">

                    <button class="accordion-button collapsed" type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapseMisi"
                        aria-expanded="false"
                        aria-controls="collapseMisi">

                        Misi

                    </button>

                </h2>

                <div id="collapseMisi"
                    class="accordion-collapse collapse"
                    aria-labelledby="headingMisi"
                    data-bs-parent="#accordionVisiMisi">

                    <div class="accordion-body">

                        <ol>

                            <?php if (mysqli_num_rows($resultMisi) > 0) : ?>

                                <?php while ($m = mysqli_fetch_object($resultMisi)) : ?>

                                    <?php
                                    $misiItems = explode("\n", $m->text);

                                    foreach ($misiItems as $item) {

                                        if (trim($item) != "") {

                                            echo "<li>" . htmlspecialchars($item) . "</li>";
                                        }
                                    }
                                    ?>

                                <?php endwhile; ?>

                            <?php else : ?>

                                <li>Misi belum tersedia.</li>

                            <?php endif; ?>

                        </ol>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- BOOTSTRAP -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<style>
    .visi-misi {
        padding: 60px 0;
        background: #f8f9fa;
    }

    .accordion-item {
        border: none;
        border-radius: 16px;
        margin-bottom: 16px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
    }

    .accordion-button {
        font-weight: 600;
        font-size: 16px;
        padding: 18px 24px;
    }

    /* WARNA HIJAU SESUAI NAVBAR */

    .accordion-button:not(.collapsed) {
        background: linear-gradient(90deg, #1FA67A, #188f68);
        color: #ffffff;
    }

    .accordion-button:focus {
        box-shadow: none;
        border: none;
    }

    .accordion-body {
        padding: 25px 30px;
        font-size: 15px;
        line-height: 1.8;
        color: #374151;
    }

    ol li {
        margin-bottom: 12px;
        white-space: pre-line;
    }
</style>