<?php
// Simulasi data kampanye dengan status
$campaigns = [
    ["title" => "Korban Banjir", "image" => "foto/kor.jpg", "description" => "Target Donasi Rp. 15.000.000 Batas Waktu 30 Hari", "end_date" => "2025-01-15", "status" => "active"],
    ["title" => "Pendidikan", "image" => "foto/pen.jpg", "description" => "Target Donasi Rp. 30.000.000 Batas Waktu 20 Hari", "end_date" => "2025-01-10", "status" => "active"],
    ["title" => "Panti Asuhan", "image" => "foto/pan.jpg", "description" => "Target Donasi Rp. 24.000.000 Batas Waktu 15 Hari", "end_date" => "2025-01-05", "status" => "active"],
    ["title" => "Kegiatan Sosial", "image" => "foto/keg.jpg", "description" => "Target Donasi Rp. 60.000.000 Batas Waktu 44 Hari", "end_date" => "2025-02-10", "status" => "active"],
];

// Periksa tanggal akhir kampanye dan ubah statusnya
foreach ($campaigns as $key => $campaign) {
    $endDate = new DateTime($campaign['end_date']);
    $currentDate = new DateTime();

    if ($endDate < $currentDate) {
        $campaigns[$key]['status'] = 'completed';  // Ubah status menjadi selesai jika batas waktu telah lewat
    }
}

// Data statistik
$totalDonations = 1000000; // Total donasi (dalam rupiah)
$totalRecipients = 500; // Total penerima
$totalActiveCampaigns = count($campaigns); // Kampanye aktif
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donasi Darurat</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #add8e6;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        h1 {
            color: #4682b4;
            padding: 20px 0;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);
        }

        .stats {
            display: flex;
            justify-content: center;
            margin: 20px 0;
            gap: 10px;
        }

        .stats div {
            background: white;
            padding: 10px;
            border-radius: 10px;
            border: 2px solid black;
            box-shadow: 5px 5px 0px black;
            font-size: 14px;
        }

        .campaign-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px;
        }

        .campaign {
            background-color: white;
            border: 2px solid black;
            border-radius: 10px;
            padding: 15px;
            width: 200px;
            box-shadow: 5px 5px 0px black;
        }

        .campaign img {
            width: 100%;
            height: 120px;
            object-fit: cover;
            border-radius: 10px;
        }

        .campaign h3 {
            font-size: 16px;
            margin: 10px 0;
            color: #4682b4;
        }

        .campaign p {
            font-size: 12px;
            color: #555;
            margin: 10px 0;
        }

        .campaign button {
            background-color: #4682b4;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        .campaign button:hover {
            background-color: #5a9bd8;
        }

        a {
            text-decoration: none;
        }

        .status-active {
            color: green;
            font-weight: bold;
        }

        .status-completed {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Donasi Darurat</h1>

    <div class="stats">
        <div>Total Donasi: Rp<?php echo number_format($totalDonations, 0, ',', '.'); ?></div>
        <div>Jumlah Penerima: <?php echo $totalRecipients; ?></div>
        <div>Kampanye Aktif: <?php echo $totalActiveCampaigns; ?></div>
    </div>

    <h2 style="color: #4682b4;">Donasi Sekarang</h2>

    <div class="campaign-container">
        <?php foreach ($campaigns as $campaign): ?>
            <div class="campaign">
                <img src="<?php echo $campaign['image']; ?>" alt="<?php echo $campaign['title']; ?>">
                <h3><?php echo $campaign['title']; ?></h3>
                <p><?php echo $campaign['description']; ?></p>

                <?php if ($campaign['status'] == 'active'): ?>
                    <p class="status-active">Status: Aktif</p>
                    <a href="pembayaran.php">
                        <button>Donasi</button>
                    </a>
                <?php else: ?>
                    <p class="status-completed">Status: Selesai</p>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
