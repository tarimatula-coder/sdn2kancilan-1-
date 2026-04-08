<?php
include '../../app.php';

if (isset($_POST['tombol'])) {
    $name = escapeString($_POST['name']);
    $email = escapeString($_POST['email']);
    $level = isset($_POST['level']) ? mysqli_real_escape_string($connect, $_POST['level']) : '';
    $password = $_POST['password']; 

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $qInsert = "INSERT INTO user (name, email, level, password) VALUES('$name','$email', '$level','$hashedPassword')";

    if (mysqli_query($connect, $qInsert)) {
        echo " 
        <script>    
            alert('Data berhasil ditambah');
            window.location.href='../../pages/user/index.php';
        </script>
        ";
    } else {
        echo "
        <script>    
            alert('Data gagal ditambah');
            window.location.href='../../pages/user/create.php';
        </script>
        ";
    }
}
