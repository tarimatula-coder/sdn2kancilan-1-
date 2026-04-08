<?php
session_start();

// Kalau sudah login, langsung ke dashboard
if (isset($_SESSION['email'])) {
    header("Location: ../dashboard/index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login SD 2 Kancilan</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

        /* Reset & Global */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Container Login */
        .container {
            background: #ffffff;
            border-radius: 15px;
            width: 100%;
            max-width: 400px;
            padding: 2.5rem 2rem;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            text-align: center;
            transition: 0.3s ease;
        }

        .container:hover {
            transform: translateY(-5px);
        }

        h2 {
            color: #007BFF;
            margin-bottom: 1.5rem;
        }

        /* Form Inputs */
        .input-group {
            margin-bottom: 1rem;
            text-align: left;
        }

        .input-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #333;
        }

        .input-group input,
        .input-group select {
            width: 100%;
            padding: 0.7rem;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 0.95rem;
            outline: none;
            transition: 0.2s;
        }

        .input-group input:focus,
        .input-group select:focus {
            border-color: #007BFF;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        /* Button */
        .btn {
            width: 100%;
            padding: 0.8rem;
            background: #007BFF;
            border: none;
            border-radius: 8px;
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 0.5rem;
        }

        .btn:hover {
            background: #0056b3;
        }

        /* Responsif kecil */
        @media (max-width: 450px) {
            .container {
                padding: 2rem 1.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Login SD 2 Kancilan</h2>
        <form action="../../actions/auth/login.php" method="POST">
            <div class="input-group">
                <label>Login Sebagai</label>
                <select name="role" id="role" required>
                    <option value="">-- Pilih Role --</option>
                    <option value="admin">Admin</option>
                    <option value="editor">Editor</option>
                    <option value="pengguna">Pengguna</option>
                </select>
            </div>

            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="Masukkan Email" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Masukkan Password" required>
            </div>

            <button type="submit" class="btn">Masuk</button>
        </form>
    </div>
</body>

</html>