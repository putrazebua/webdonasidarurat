<?php
session_start();
require 'koneksi.php';

// Ambil notifikasi login pengguna dalam 24 jam terakhir
try {
    $stmt = $pdo->prepare("
        SELECT username, created_at 
        FROM users 
        WHERE created_at >= NOW() - INTERVAL 1 DAY
    ");
    $stmt->execute();
    $recentLogins = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Ambil notifikasi donasi dalam 24 jam terakhir
    $stmt = $pdo->prepare("
        SELECT name, amount, phone, campaign_title, transaction_date 
        FROM pembayaran 
        WHERE transaction_date >= NOW() - INTERVAL 1 DAY
    ");
    $stmt->execute();
    $recentDonations = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Kesalahan: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin - Notifikasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .notification {
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            color: #fff;
            transition: opacity 0.5s ease;
        }
        .notification.login {
            background-color: #4CAF50;
        }
        .notification.donation {
            background-color: #FFC107;
            color: #000;
        }
        .close-btn {
            float: right;
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            margin-left: 10px;
        }
        .close-btn:hover {
            text-decoration: underline;
        }
        .notification .badge {
            font-size: 1.1em;
            font-weight: bold;
        }
        .notification-title {
            font-size: 1.25em;
            font-weight: bold;
        }
    </style>
</head>
<body class="bg-light">

    <div class="container mt-5">
        <h1 class="text-center mb-4">Notifikasi</h1>

        <!-- Notifikasi Login Pengguna -->
        <?php if (!empty($recentLogins)): ?>
            <div id="loginNotifications">
                <h3 class="text-primary">User Baru Login</h3>
                <?php foreach ($recentLogins as $login): ?>
                    <div class="notification login alert alert-success">
                        <a href="#" class="close-btn" onclick="this.parentElement.style.display='none'; return false;">&times;</a>
                        <div class="notification-title"><?= htmlspecialchars($login['username']) ?> baru saja login</div>
                        <p>Login pada: <strong><?= htmlspecialchars($login['created_at']) ?></strong></p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Notifikasi Donasi -->
        <?php if (!empty($recentDonations)): ?>
            <div id="donationNotifications">
                <h3 class="text-warning">Donasi Baru</h3>
                <?php foreach ($recentDonations as $donation): ?>
                    <div class="notification donation alert alert-warning">
                        <a href="#" class="close-btn" onclick="this.parentElement.style.display='none'; return false;">&times;</a>
                        <div class="notification-title"><?= htmlspecialchars($donation['name']) ?> melakukan donasi</div>
                        <p>Jumlah Donasi: <strong>Rp<?= number_format($donation['amount'], 2, ',', '.') ?></strong></p>
                        <p>Untuk Kampanye: <em>"<?= htmlspecialchars($donation['campaign_title']) ?>"</em></p>
                        <p>Donasi dilakukan pada: <strong><?= htmlspecialchars($donation['transaction_date']) ?></strong></p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
