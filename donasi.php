<?php
// Data kampanye
$campaigns = [
    ["title" => "Korban Banjir", "image" => "foto/kor.jpg", "description" => "Target Donasi Rp. 15.000.000 Batas Waktu 30 Hari"],
    ["title" => "Pendidikan", "image" => "foto/pen.jpg", "description" => "Target Donasi Rp. 30.000.000 Batas Waktu 20 Hari"],
    ["title" => "Panti Asuhan", "image" => "foto/pan.jpg", "description" => "Target Donasi Rp. 24.000.000 Batas Waktu 15 Hari"],
    ["title" => "Kegiatan Sosial", "image" => "foto/keg.jpg", "description" => "Target Donasi Rp. 60.000.000 Batas Waktu 44 Hari"],
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donasi Darurat</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #add8e6;
        }
        h1 {
            text-align: center;
            color: #4682b4;
            margin-top: 20px;
        }
        .summary-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 10px;
        }
        .summary-box {
            background-color: white;
            border: 2px solid black;
            border-radius: 5px;
            box-shadow: 3px 3px 0px black;
            padding: 10px;
            text-align: center;
            font-size: 14px;
        }
        .campaign-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
            margin: 20px auto;
            max-width: 1200px;
        }
        .campaign {
            background-color: white;
            border: 2px solid black;
            border-radius: 10px;
            box-shadow: 3px 3px 0px black;
            padding: 10px;
            width: 250px;
            text-align: center;
        }
        .campaign img {
            width: 100%;
            height: 150px; /* Tetapkan tinggi gambar */
            object-fit: cover; /* Memastikan gambar tetap rapi */
            border-radius: 10px;
        }
        .campaign h3 {
            color: #4682b4;
            margin: 10px 0;
        }
        .campaign p {
            font-size: 14px;
            color: #333333;
            margin: 10px 0;
        }
        .campaign button {
            background-color: #4682b4;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }
        .campaign button:hover {
            background-color: #315f82;
        }
    </style>
</head>
<body>
    <h1>Donasi Darurat</h1>
    <div class="summary-container">
        <div class="summary-box">Total Donasi: Rp1.000.000</div>
        <div class="summary-box">Jumlah Penerima: 500</div>
        <div class="summary-box">Kampanye Aktif: 4</div>
    </div>
    <h2 style="text-align: center; color: #4682b4;">Donasi Sekarang</h2>
    <div class="campaign-container">
        <?php foreach ($campaigns as $campaign): ?>
            <div class="campaign">
                <img src="<?php echo $campaign['image']; ?>" alt="<?php echo $campaign['title']; ?>">
                <h3><?php echo $campaign['title']; ?></h3>
                <p><?php echo $campaign['description']; ?></p>
                <a href="pembayaran.php?campaign_title=<?php echo urlencode($campaign['title']); ?>">
                    <button>Donasi</button>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
