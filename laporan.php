<?php
// Koneksi ke database
try {
    $pdo = new PDO('mysql:host=localhost;dbname=donasi', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}

// Ambil data dari tabel pembayaran
try {
    $stmt = $pdo->query("SELECT name, amount, phone, payment_method, campaign_title, transaction_date FROM pembayaran");
    $donations = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Gagal mengambil data: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Donasi</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #add8e6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: white;
            border: 2px solid black;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 5px 5px 0px black;
            text-align: center;
            width: 80%;
            max-width: 900px;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #4682b4;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #4682b4;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Laporan Donasi</h1>
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Jumlah Donasi (Rp)</th>
                    <th>Nomor HP</th>
                    <th>Metode Pembayaran</th>
                    <th>Kampanye</th>
                    <th>Tanggal Transaksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($donations)): ?>
                    <?php foreach ($donations as $donation): ?>
                        <tr>
                            <td><?= htmlspecialchars($donation['name']) ?></td>
                            <td><?= number_format($donation['amount'], 0, ',', '.') ?></td>
                            <td><?= htmlspecialchars($donation['phone']) ?></td>
                            <td><?= htmlspecialchars($donation['payment_method']) ?></td>
                            <td><?= htmlspecialchars($donation['campaign_title']) ?></td>
                            <td><?= htmlspecialchars($donation['transaction_date']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">Belum ada data donasi.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
