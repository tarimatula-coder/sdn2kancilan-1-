<?php
include '../../app.php';
include './show.php';

if (isset($_POST['tombol'])) {
    $imageNew = $artikel->image;
    $nama = escapeString($_POST['nama']);
    $tanggal = escapeString($_POST['tanggal']);
    $keterangan = escapeString($_POST['keterangan']);
    $storages = "../../../storages/artikel/";

    //cek apakah user mengupload gambar baru
    if (!empty($_FILES['image']['tmp_name'])) {
        $imageOld = $_FILES['image']['tmp_name'];
        $imageNew = time() . '.png';

        // hapus gambar lama jika ada
        if (!empty($artikel->image) && file_exists($storages . $artikel->image)) {
            unlink($storages . $artikel->image);
        }

        // simpan gambar baru
        move_uploaded_file($imageOld, $storages . $imageNew);
    }

    $qUpdate = "UPDATE artikel SET image='$imageNew', nama='$nama', tanggal='$tanggal', keterangan='$keterangan' WHERE id='$id'";

    $result = mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));
    if ($result) {
        echo " 
         <script>    
            alert('Data berhasil diubah');
            window.location.href='../../pages/artikel/index.php';
        </script>
            ";
    } else {
        echo "
         <script>    
            alert('Data gagal diubah');
            window.location.href='../../pages/artikel/create.php';
         </script>
     ";
    }
}
