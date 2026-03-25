<?php
include '../../app.php';
include './show.php';

if (isset($_POST['tombol'])) {
    $imageNew = $pencapaian->image;
    $nama = escapeString($_POST['nama']);
    $keterangan = escapeString($_POST['keterangan']);
    $storages = "../../../storages/pencapaian/";

    //cek apakah user mengupload gambar baru
    if (!empty($_FILES['image']['tmp_name'])) {
        $imageOld = $_FILES['image']['tmp_name'];
        $imageNew = time() . '.png';

        // hapus gambar lama jika ada
        if (!empty($pencapaian->image) && file_exists($storages . $pencapaian->image)) {
            unlink($storages . $pencapaian->image);
        }

        // simpan gambar baru
        move_uploaded_file($imageOld, $storages . $imageNew);
    }

    $qUpdate = "UPDATE pencapaian SET image='$imageNew', nama='$nama', keterangan='$keterangan' WHERE id='$id'";

    $result = mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));
    if ($result) {
        echo " 
         <script>    
            alert('Data berhasil diubah');
            window.location.href='../../pages/pencapaian/index.php';
        </script>
            ";
    } else {
        echo "
         <script>    
            alert('Data gagal diubah');
            window.location.href='../../pages/pencapaian/create.php';
         </script>
     ";
    }
}
