<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include '../../app.php';

// cek login
if (!isset($_SESSION['email'])) {
    header("Location: ../auth/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Dashboard</title>

    <!-- AdminKit CSS -->
    <link href="../../adminkit-3.1.0/adminkit-3.1.0/static/css/app.css" rel="stylesheet">
    <style>
        /* ===== ANIMASI GRADASI HIJAU BIRU ===== */
        @keyframes sidebarGradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        /* ===== SIDEBAR UTAMA ===== */
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg,
                    #0f766e,
                    /* hijau toska */
                    #0ea5e9,
                    /* biru */
                    #1d4ed8,
                    /* biru tua */
                    #22c55e
                    /* hijau */
                ) !important;

            background-size: 400% 400% !important;
            animation: sidebarGradient 16s ease-in-out infinite !important;
        }

        /* ===== HILANGKAN WARNA BAWAAN ADMINKIT ===== */
        .sidebar-content,
        .sidebar-nav,
        .sidebar-item,
        .sidebar-link,
        .sidebar-header,
        .sidebar-cta {
            background: transparent !important;
        }

        /* ===== TEKS & ICON ===== */
        .sidebar,
        .sidebar a,
        .sidebar span,
        .sidebar i {
            color: #ffffff !important;
        }

        /* ===== JUDUL MENU ===== */
        .sidebar-header {
            color: #d1fae5 !important;
            font-weight: 600;
        }

        /* ===== ITEM AKTIF (TANPA HOVER) ===== */
        .sidebar-item.active>.sidebar-link {
            background: rgba(255, 255, 255, 0.25) !important;
            border-left: 4px solid #22c55e;
            border-radius: 6px;
        }

        /* ===== MATIKAN EFEK HOVER ===== */
        .sidebar-link:hover {
            background: transparent !important;
        }
    </style>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <!-- FIX SPASI DASHBOARD -->
    <style>
        /* hilangkan spasi atas konten */
        .content {
            padding-top: 0.5rem !important;
        }

        /* hilangkan margin default body */
        body {
            margin: 0;
        }

        /* pastikan layout full */
        .wrapper {
            min-height: 100vh;
        }

        /* rapikan navbar */
        .navbar {
            margin-bottom: 0 !important;
        }
    </style>
</head>

<body>