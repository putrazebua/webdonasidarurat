<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Donasi Darurat</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #add8e6;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .header {
            background-color: white;
            border: 3px solid black;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 5px 5px 0px black;
            width: 95%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
        }

        .menu-icon {
            font-size: 24px;
            cursor: pointer;
        }

        .header h1 {
            font-size: 24px;
            color: #4682b4;
            margin: 0 auto; /* Otomatis tempatkan di tengah */
            position: absolute; /* Atur posisi absolut */
            left: 50%; /* Posisikan berdasarkan lebar kontainer */
            transform: translateX(-50%); /* Tengah secara horizontal */
        }

        .dropdown-menu {
            position: absolute;
            top: 60px;
            left: 10px;
            background-color: white;
            border: 2px solid black;
            box-shadow: 5px 5px 0px black;
            border-radius: 10px;
            width: 188px;
            display: none;
            z-index: 1000;
        }

        .dropdown-menu.active {
            display: block;
        }

        .dropdown-menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .dropdown-menu ul li {
            padding: 10px 20px;
            border-bottom: 1px solid #ddd;
        }

        .dropdown-menu ul li:last-child {
            border-bottom: none;
        }

        .dropdown-menu ul li a {
            text-decoration: none;
            color: #4682b4;
        }

        .dropdown-menu ul li a:hover {
            text-decoration: underline;
        }

        .welcome-message {
            margin: 20px 0;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 5px 5px 0px black;
            border: 2px solid black;
            width: 45%;
            text-align: center;
            color: #4682b4;
        }

        .overview {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
            margin: 20px 0;
            width: 90%;
        }

        .overview .card {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 5px 5px 0px black;
            border: 2px solid black;
            text-align: center;
            flex: 1;
            max-width: 200px;
        }

        .overview .card h3 {
            margin: 0 0 10px;
            font-size: 18px;
            color: #4682b4;
        }

        .overview .card p {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
            color: black;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="menu-icon" onclick="toggleMenu()">
            <i class="fa fa-bars"></i>
        </div>
        <h1>Donasi Darurat</h1>
    </header>

    <div class="dropdown-menu" id="menuDropdown">
        <ul>
            <li><a href="kami.php"><i class="fa fa-users"></i> Tentang Kami</a></li>
            <li><a href="pengguna.php"><i class="fa fa-user-check"></i> Kelola Pengguna</a></li>
            <li><a href="h.php"><i class="fa fa-hand-holding-heart"></i> Kelola Kampanye</a></li>
            <li><a href="laporan.php"><i class="fa fa-chart-bar"></i> Laporan Donasi</a></li>
            <li><a href="nontifikasi.php"><i class="fa fa-bell"></i> Notifikasi</a></li>
            <li><a href="logout.php"><i class="fa fa-sign-out-alt"></i> Keluar</a></li>
        </ul>
    </div>

    <div class="welcome-message">
        <h2>Selamat Datang di Dashboard Admin!</h2>
        <p>Semangat dalam mengelola donasi dan kampanye untuk membantu mereka yang membutuhkan. Bersama kita dapat membuat perubahan besar!</p>
    </div>

    <section class="overview">
        <div class="card">
            <h3>Total Donasi</h3>
            <p>Rp 1,200,000,000</p>
        </div>
        <div class="card">
            <h3>Total Pengguna</h3>
            <p>150</p>
        </div>
        <div class="card">
            <h3>Total Kampanye</h3>
            <p>25</p>
        </div>
    </section>

    <script>
        function toggleMenu() {
            const menu = document.getElementById('menuDropdown');
            menu.classList.toggle('active');
        }
    </script>
</body>
</html>
