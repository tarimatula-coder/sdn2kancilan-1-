<?php
include '../../app.php';
include './show.php'; // pastikan ada fungsi escapeString di show.php

if (isset($_POST['tombol'])) {
    $name = escapeString($_POST['name']);
    $email = escapeString($_POST['email']);
    $level = escapeString($_POST['level']);
    $password = escapeString($_POST['password']);

    // hash password sebelum update
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // query update
    $qUpdate = "UPDATE user 
                SET name='$name', email='$email', level='$level', password='$hashedPassword' 
                WHERE id='$id'";

    $result = mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));

    if ($result) {
        echo "<script>
                alert('Data berhasil diubah');
                window.location.href='../../pages/user/index.php';
              </script>";
    } else {
        echo "<script>
                alert('Data gagal diubah');
                window.location.href='../../pages/user/edit.php';
              </script>";
    }
}
