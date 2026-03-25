<?php
if (!isset($_GET['id'])) {
    echo "
    <script>    
        alert('Tidak bisa memilih ID ini');
        window.location.href='../../pages/artikel/index.php';
        </script>
    ";
}

$id = $_GET['id'];

$qSelect = "SELECT * FROM artikel WHERE id='$id'";
$result = mysqli_query($connect, $qSelect) or die(mysqli_error($connect));

$artikel = $result->fetch_object();
if (!$artikel) {
    die("Data tidak di temukan");
}
