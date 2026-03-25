<?php
include '../../app.php';
include './show.php';
$storages = "../../../storages/artikel/";

// hapus gambar lama jika ada
if (!empty($artikel->image) && file_exists($storages . $artikel->image)) {
    unlink($storages . $artikel->image);
}

// Hapus data
$qDelete = "DELETE FROM artikel WHERE id = '$artikel->id'";
$result = mysqli_query($connect, $qDelete) or die(mysqli_error($connect));

// cek apakah data berhasil di hapus atau tidak
if ($result) {
    echo " 
         <script>    
            alert('Data berhasil dihapus');
            window.location.href='../../pages/artikel/index.php';
        </script>
            ";
} else {
    echo "
         <script>    
            alert('Data gagal dihapus');
            window.location.href='../../pages/artikel/index.php';
         </script>
     ";
}
