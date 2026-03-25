<?php
include '../../app.php';

if (isset($_POST['tombol'])) {

    $imageOld = $_FILES['image']['tmp_name'];
    $imageNew = time() . ".png";
    $nama = escapeString($_POST['nama']);
    $tanggal = escapeString($_POST['tanggal']);
    $deskripsi = escapeString($_POST['deskripsi']);

    $storages = "../../../storages/artikel/";
    if (move_uploaded_file($imageOld, $storages . $imageNew)) {
        $qInsert = "INSERT INTO artikel(image, nama, tanggal, deskripsi) VALUES('$imageNew', '$nama', '$tanggal', '$deskripsi')";

        mysqli_query($connect, $qInsert) or die(mysqli_error($connect));
        echo " 
    <script>    
        alert('Data berhasil ditambah');
        window.location.href='../../pages/artikel/index.php';
    </script>
            ";
    } else {
        echo "
    <script>    
        alert('Data gagal ditambah');
        window.location.href='../../pages/artikel/create.php';
    </script>
    ";
    }
}
