<?php
include_once '../config/connection.php';

/* ABOUT */
$qabout = mysqli_query($connect, "SELECT * FROM about LIMIT 1");
$aboutHeader = mysqli_fetch_object($qabout);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($aboutHeader->name ?? 'Sekolah') ?></title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Montserrat:300,400,500,600,700|Poppins:300,400,500,600,700" rel="stylesheet">
    <style>
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: #1FA67A;
            height: 80px;
            display: flex;
            align-items: center;
            z-index: 999;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        body {
            margin: 0;
            padding-top: 80px;
            font-family: 'Poppins', sans-serif;
            background: #f1f5f9;
        }


        .nav-container {
            width: 1400px;
            margin: auto;
            display: flex;
            justify-content: space-between;
            padding: 0 20px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo img {
            width: 45px;
            height: 45px;
            object-fit: cover;
        }

        .logo span {
            font-weight: 600;
            font-size: 18px;
            color: #fff;
        }

        .menu {
            display: flex;
            gap: 30px;
            align-items: center;
        }

        .menu a {
            text-decoration: none;
            color: #fff;
            font-size: 15px;
            font-weight: 600;

            display: flex;
            align-items: center;
            /* vertikal center */
            justify-content: center;
            /* horizontal center dalam link */
            transition: 0.3s;
        }

        .menu a.active {
            color: #f5d93a !important;
            font-weight: 700;
        }

        .menu a:hover {
            color: #e6fff7;
        }

        /* HAMBURGER */
        .hamburger {
            display: none;
            flex-direction: column;
            cursor: pointer;
            gap: 5px;
        }

        .hamburger div {
            width: 25px;
            height: 3px;
            background: #fff;
        }

        @media(max-width:900px) {
            .nav-container {
                flex-wrap: wrap;
            }

            .menu {
                display: none;
                flex-direction: column;
                width: 100%;
                background: #1FA67A;
            }

            .menu.show {
                display: flex;
            }

            .hamburger {
                display: flex;
            }
        }
    </style>
</head>

<body>
    <!-- JS HAMBURGER -->
    <script>
        const hamburger = document.querySelector('.hamburger');
        const menu = document.querySelector('.menu');

        hamburger.addEventListener('click', () => {
            menu.classList.toggle('show');
        });

        const sections = document.querySelectorAll("section");
        const navLinks = document.querySelectorAll(".nav-link");

        window.addEventListener("scroll", () => {
            let current = "";

            sections.forEach(section => {
                const sectionTop = section.offsetTop - 120;
                const sectionHeight = section.clientHeight;

                if (pageYOffset >= sectionTop && pageYOffset < sectionTop + sectionHeight) {
                    current = section.getAttribute("id");
                }
            });

            navLinks.forEach(link => {
                link.classList.remove("active");

                if (link.getAttribute("href").includes(current)) {
                    link.classList.add("active");
                }
            });
        });
    </script>

</body>

</html>