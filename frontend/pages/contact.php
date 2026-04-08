<?php
include '../config/connection.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../../PHPMailer-master/src/Exception.php';
require_once __DIR__ . '/../../PHPMailer-master/src/PHPMailer.php';
require_once __DIR__ . '/../../PHPMailer-master/src/SMTP.php';

/* ================= KIRIM EMAIL ================= */

if (isset($_POST['kirim'])) {

    $nama  = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $pesan = htmlspecialchars($_POST['pesan']);
    $phone = htmlspecialchars($_POST['phone']);

    $mail = new PHPMailer(true);

    try {

        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'tarimatula@gmail.com';
        $mail->Password   = 'bitk wwjx qcwz jswd';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('tarimatula@gmail.com', 'Website Contact');
        $mail->addAddress('tarimatula@gmail.com');

        $mail->Subject = "Pesan dari Website SDN 2 Kancilan";

        $mail->Body = "
        Nama : $nama
        Email : $email
        No HP : $phone
        Pesan : $pesan
        ";

        $mail->send();

        echo "<script>alert('Pesan berhasil dikirim ke Gmail');</script>";
    } catch (Exception $e) {

        echo "<script>alert('Pesan gagal dikirim');</script>";
    }
}

/* ================= DATA CONTACT ================= */

$qContact = "SELECT * FROM contact";
$resultContact = mysqli_query($connect, $qContact);
?>

<main id="main">

    <section id="contact" class="contact section-bg">

        <div class="container">

            <div class="section-title">
                <h2>Contact</h2>
                <p>Silakan hubungi kami melalui kontak berikut atau kirim pesan langsung</p>
            </div>

            <style>
                .contact-item {
                    display: flex;
                    align-items: center;
                    gap: 16px;
                    padding: 16px;
                    border-radius: 14px;
                    text-decoration: none;
                    background: #fff;
                    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
                    transition: 0.3s;
                    height: 100%;
                }

                .contact-item:hover {
                    transform: translateY(-4px);
                    box-shadow: 0 12px 26px rgba(0, 0, 0, 0.18);
                }

                .contact-icon {
                    width: 60px;
                    height: 60px;
                    border-radius: 50%;
                    background: linear-gradient(135deg, #1FA67A, #6ED3B0);
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }

                .contact-icon img {
                    width: 30px;
                }

                .message-card {
                    background: #fff;
                    border-radius: 20px;
                    padding: 35px;
                    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                }

                .form-control {
                    border-radius: 12px;
                    padding: 12px;
                }

                .btn-brand {
                    background: #1FA67A;
                    color: #fff;
                    border: none;
                    padding: 12px;
                    border-radius: 10px;
                    width: 100%;
                    font-weight: 600;
                }
            </style>

            <div class="row">

                <!-- CONTACT CARD -->

                <div class="col-12 mb-4">
                    <div class="row">

                        <?php while ($item = mysqli_fetch_object($resultContact)) {

                            $link = $item->link;
                            $ket  = strtolower($item->keterangan);

                            /* ================= WHATSAPP ================= */

                            if (strpos($ket, 'whatsapp') !== false) {

                                $nomor = "6289514401784";
                                $pesan = urlencode("Assalamu'alaikum saya ingin bertanya tentang SDN 2 Kancilan");

                                $link = "https://wa.me/" . $nomor . "?text=" . $pesan;
                            }

                        ?>

                            <div class="col-lg-3 col-md-6 mb-3">

                                <a href="<?= htmlspecialchars($link) ?>" target="_blank" class="contact-item">

                                    <div class="contact-icon">
                                        <img src="../storages/contact/<?= htmlspecialchars($item->image) ?>">
                                    </div>

                                    <span><?= htmlspecialchars($item->keterangan) ?></span>

                                </a>

                            </div>

                        <?php } ?>

                    </div>
                </div>

                <!-- FORM PESAN -->

                <div class="col-12">

                    <div class="message-card">

                        <h4>Kirim Pesan</h4>
                        <p>Silakan isi form di bawah untuk menghubungi kami</p>

                        <form method="POST">

                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                                </div>

                            </div>

                            <div class="mb-3">
                                <label>Pesan</label>
                                <textarea name="pesan" class="form-control" rows="4" placeholder="Masukan pesan..." required></textarea>
                            </div>

                            <div class="mb-3">
                                <label>No. Telepon</label>
                                <input type="text" name="phone" class="form-control" placeholder="Masukan No.Telepon...">
                            </div>

                            <div class="mt-4">
                                <button type="submit" name="kirim" class="btn-brand">
                                    Kirim Pesan
                                </button>
                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </section>

</main>