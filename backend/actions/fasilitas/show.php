<?php
if (!isset($_GET['id'])) {
    echo "
    <script>    
        alert('Tidak bisa memilih ID ini');
        window.location.href='../../pages/fasilitas/index.php';
        </script>
    ";
}

$id = $_GET['id'];

$qSelect = "SELECT * FROM fasilitas WHERE id='$id'";
$result = mysqli_query($connect, $qSelect) or die(mysqli_error($connect));

$fasilitas = $result->fetch_object();
if (!$fasilitas) {
    die("Data tidak di temukan");
}
