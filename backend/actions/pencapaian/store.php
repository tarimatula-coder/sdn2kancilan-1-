<?php
include '../../app.php';

if (isset($_POST['tombol'])) {

    $imageOld = $_FILES['image']['tmp_name'];
    $imageNew = time() . ".png";
    $nama = escapeString($_POST['nama']);
    $keterangan = escapeString($_POST['keterangan']);

    $storages = "../../../storages/pencapaian/";
    if (move_uploaded_file($imageOld, $storages . $imageNew)) {
        $qInsert = "INSERT INTO pencapaian(image, nama, keterangan) VALUES('$imageNew', '$nama', '$keterangan')";

        mysqli_query($connect, $qInsert) or die(mysqli_error($connect));
        echo " 
    <script>    
        alert('Data berhasil ditambah');
        window.location.href='../../pages/pencapaian/index.php';
    </script>
            ";
    } else {
        echo "
    <script>    
        alert('Data gagal ditambah');
        window.location.href='../../pages/pencapaian/create.php';
    </script>
    ";
    }
}
