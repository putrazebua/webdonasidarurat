<?php
$servername = "localhost";
$username = "root";
$password = ""; // Ganti dengan password MySQL Anda
$dbname = "donasi";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari tabel campaigns
$result = $conn->query("SELECT * FROM campaign ORDER BY id DESC LIMIT 5");

if (!$result) {
    die("Error pada query: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Donasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background: linear-gradient(to bottom, #f8f9fa, #e9ecef);
        }

        .header {
            background: linear-gradient(90deg, #007BFF, #0056b3);
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header h1 {
            margin: 0;
            font-size: 1.8rem;
        }

        .login-btn {
            background-color: white;
            color: #007BFF;
            padding: 0.5rem 1rem;
            text-decoration: none;
            border-radius: 20px;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .login-btn:hover {
            background-color: #e9ecef;
            color: #0056b3;
        }

        .content {
            padding: 2rem;
            text-align: center;
        }

        .greeting-donation {
            text-align: center;
            padding: 3rem 2rem;
            background: white;
            border-radius: 15px;
            margin: 1rem auto;
            max-width: 600px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .greeting {
            font-size: 1.8rem;
            font-weight: bold;
            margin-bottom: 1.5rem;
            color: #333;
        }

        .donation-btn {
            background: linear-gradient(90deg, #007BFF, #0056b3);
            color: white;
            padding: 1rem 2.5rem;
            text-decoration: none;
            border-radius: 30px;
            font-size: 1.2rem;
            font-weight: bold;
            transition: transform 0.3s ease,background 0.3s ease;
            display: inline-block;
        }

        .donation-btn:hover {
            transform: scale(1.1);
            background: linear-gradient(90deg, #0056b3, #003f7f);
        }

        .statistics {
            text-align: center;
            padding: 2.5rem 2rem;
            background-color: white;
            border-radius: 15px;
            margin: 1rem auto;
            max-width: 900px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .statistics h2 {
            margin-bottom: 2rem;
            font-size: 1.8rem;
            color: #333;
        }

        .stats-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .stat {
            text-align: center;
            margin: 1rem;
            flex: 1;
            max-width: 200px;
        }

        .stat .number {
            font-size: 2.2rem;
            color: #007BFF;
            font-weight: bold;
        }

        .stat .label {
            font-size: 1.1rem;
            color: #555;
        }

        .footer {
            background: linear-gradient(90deg, #007BFF, #0056b3);
            padding: 1rem;
            display: flex;
            justify-content: space-around;
            align-items: center;
            color: white;
            box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.1);
        }

        .footer .nav-link {
            color: white;
            text-decoration: none;
            font-weight: bold;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0 15px;
            transition: color 0.3s ease;
        }

        .footer .nav-link:hover {
            color: #e9ecef;
        }

        .footer .nav-link i {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <header class="header">
        <h1>Donasi Darurat</h1>
        <a href="login.php" class="login-btn">Login</a>
    </header>

    <main class="content">
        <section class="greeting-donation">
            <div class="greeting">Selamat Datang, Ayo Berkontribusi untuk Sesama!</div>
            <a href="hh.php" class="donation-btn">Donasi Sekarang</a>
        </section>

        <section class="statistics">
            <h2>Statistik Donasi Kami</h2>
            <div class="stats-container">
                <div class="stat">
                    <div class="number">1,200+</div>
                    <div class="label">Donatur Bergabung</div>
                </div>
                <div class="stat">
                    <div class="number">Rp 750 Juta</div>
                    <div class="label">Donasi Terkumpul</div>
                </div>
                <div class="stat">
                    <div class="number">300+</div>
                    <div class="label">Proyek Terselesaikan</div>
                </div>
            </div>
        </section>
        <section class="statistics">
    <h2>Dana Galang</h2>
    <div class="stats-container">
        <?php while ($row = $result->fetch_assoc()) { ?>
        <div class="stat">
            <div class="number">Rp <?php echo number_format($row['target_dana']); ?></div>
            <div class="label"><?php echo htmlspecialchars($row['title']); ?></div>
            <p><?php echo htmlspecialchars($row['deskripsi']); ?></p>
            <p><strong>Sisa Waktu:</strong> <?php echo $row['remaining_time']; ?> hari</p>
            <!-- Gambar dengan ukuran tetap -->
            <img src="<?php echo htmlspecialchars($row['gambar']); ?>" alt="Gambar" style="width: 150px; height: 150px; object-fit: cover;">
        </div>
        <?php } ?>
    </div>
</section>

    </main>

    <footer class="footer">
        <a href="index.php" class="nav-link">
            <i class="bi bi-house-door"></i>
            Home
        </a>
        <a href="galang.php" class="nav-link">
            <i class="bi bi-megaphone"></i>
            Galang Dana
        </a>
        <a href="chat.php" class="nav-link">
            <i class="bi bi-chat-dots"></i>
            Chat
        </a>
        <a href="profil.php" class="nav-link">
            <i class="bi bi-person-circle"></i>
            Profil
        </a>
    </footer>
</body>
</html>
