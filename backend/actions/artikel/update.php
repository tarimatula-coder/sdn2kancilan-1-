<?php
include '../../app.php';
include './show.php';

if (isset($_POST['tombol'])) {

    // ===== DATA =====
    $nama       = escapeString($_POST['nama']);
    $tanggal    = escapeString($_POST['tanggal']);
    $keterangan = escapeString($_POST['keterangan']);

    $storages = "../../../storages/artikel/";

    // ===== IMAGE =====
    $imageNew = $artikel->image;

    if (!empty($_FILES['image']['tmp_name'])) {

        $imageTmp = $_FILES['image']['tmp_name'];
        $imageExt = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $imageNew = time() . "_image." . $imageExt;

        // hapus lama
        if (!empty($artikel->image) && file_exists($storages . $artikel->image)) {
            unlink($storages . $artikel->image);
        }

        // upload baru
        move_uploaded_file($imageTmp, $storages . $imageNew);
    }

    // ===== FOTO =====
    $fotoNew = $artikel->foto;

    if (!empty($_FILES['foto']['tmp_name'])) {

        $fotoTmp = $_FILES['foto']['tmp_name'];
        $fotoExt = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
        $fotoNew = time() . "_foto." . $fotoExt;

        // hapus lama
        if (!empty($artikel->foto) && file_exists($storages . $artikel->foto)) {
            unlink($storages . $artikel->foto);
        }

        // upload baru
        move_uploaded_file($fotoTmp, $storages . $fotoNew);
    }

    // ===== UPDATE DB =====
    $query = "UPDATE artikel 
              SET image='$imageNew',
                  foto='$fotoNew',
                  nama='$nama',
                  tanggal='$tanggal',
                  keterangan='$keterangan'
              WHERE id='$id'";

    $result = mysqli_query($connect, $query) or die(mysqli_error($connect));

    if ($result) {
        echo "<script>
                alert('Data berhasil diubah');
                window.location.href='../../pages/artikel/index.php';
              </script>";
    } else {
        echo "<script>
                alert('Data gagal diubah');
                window.location.href='../../pages/artikel/create.php';
              </script>";
    }
}
