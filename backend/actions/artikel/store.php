<?php
include '../../app.php';

if (isset($_POST['tombol'])) {

    // ===== IMAGE =====
    $imageTmp  = $_FILES['image']['tmp_name'];
    $imageExt  = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $imageNew  = time() . "_image." . $imageExt;

    // ===== FOTO =====
    $fotoTmp   = $_FILES['foto']['tmp_name'];
    $fotoExt   = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
    $fotoNew   = time() . "_foto." . $fotoExt;

    // ===== DATA =====
    $nama       = escapeString($_POST['nama']);
    $tanggal    = escapeString($_POST['tanggal']);
    $keterangan = escapeString($_POST['keterangan']);

    // ===== FOLDER =====
    $folder = "../../../storages/artikel/";

    // ===== UPLOAD =====
    if (
        move_uploaded_file($imageTmp, $folder . $imageNew) &&
        move_uploaded_file($fotoTmp, $folder . $fotoNew)
    ) {

        $query = "INSERT INTO artikel (image, foto, nama, tanggal, keterangan)
                  VALUES ('$imageNew', '$fotoNew', '$nama', '$tanggal', '$keterangan')";

        mysqli_query($connect, $query) or die(mysqli_error($connect));

        echo "<script>
                alert('Data berhasil ditambah');
                window.location.href='../../pages/artikel/index.php';
              </script>";
    } else {
        echo "<script>
                alert('Upload gagal!');
                window.location.href='../../pages/artikel/create.php';
              </script>";
    }
}
