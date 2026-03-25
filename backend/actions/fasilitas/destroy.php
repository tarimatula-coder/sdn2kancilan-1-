<?php
include '../../app.php';
include './show.php';
$storages = "../../../storages/fasilitas/";

// hapus gambar lama jika ada
if (!empty($fasilitas->image) && file_exists($storages . $fasilitas->image)) {
    unlink($storages . $fasilitas->image);
}

// Hapus data
$qDelete = "DELETE FROM fasilitas WHERE id = '$fasilitas->id'";
$result = mysqli_query($connect, $qDelete) or die(mysqli_error($connect));

// cek apakah data berhasil di hapus atau tidak
if ($result) {
    echo " 
         <script>    
            alert('Data berhasil dihapus');
            window.location.href='../../pages/fasilitas/index.php';
        </script>
            ";
} else {
    echo "
         <script>    
            alert('Data gagal dihapus');
            window.location.href='../../pages/fasilitas/index.php';
         </script>
     ";
}
