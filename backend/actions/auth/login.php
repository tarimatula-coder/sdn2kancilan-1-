
<?php
session_start();
include '../../app.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $password = $_POST['password'];

    $qSelect = "SELECT * FROM user WHERE email='$email'";
    $result = mysqli_query($connect, $qSelect);

    if (!$result) {
        die("Query error: " . mysqli_error($connect));
    }

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_object($result);

        if (password_verify($password, $row->password)) {

            // ✅ simpan session
            $_SESSION['email'] = $row->email;
            $_SESSION['name']  = $row->name;
            $_SESSION['role']  = $row->level;

            // ✅ redirect tanpa script
            header("Location: ../../pages/dashboard/index.php");
            exit;

        } else {
            header("Location: ../../pages/auth/login.php?error=password");
            exit;
        }

    } else {
        header("Location: ../../pages/auth/login.php?error=email");
        exit;
    }
}
