<?php
// File untuk menyimpan data kampanye
$data_file = 'campaigns.json';

// Jika file data kampanye belum ada, buat file default
if (!file_exists($data_file)) {
    $default_campaigns = [
        ["title" => "Korban Banjir", "image" => "foto/kor.jpg", "description" => "Target Donasi Rp. 15.000.000 Batas Waktu 30 Hari"],
        ["title" => "Pendidikan", "image" => "foto/pen.jpg", "description" => "Target Donasi Rp. 30.000.000 Batas Waktu 20 Hari"],
        ["title" => "Panti Asuhan", "image" => "foto/pan.jpg", "description" => "Target Donasi Rp. 24.000.000 Batas Waktu 15 Hari"],
        ["title" => "Kegiatan Sosial", "image" => "foto/keg.jpg", "description" => "Target Donasi Rp. 60.000.000 Batas Waktu 44 Hari"],
    ];
    file_put_contents($data_file, json_encode($default_campaigns, JSON_PRETTY_PRINT));
}

// Baca data kampanye dari file
$campaigns = json_decode(file_get_contents($data_file), true);

// Proses formulir jika dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $image_path = null;

    // Periksa apakah ada file yang diunggah
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = 'uploads/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        $file_tmp = $_FILES['image']['tmp_name'];
        $file_name = basename($_FILES['image']['name']);
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $allowed_exts = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($file_ext, $allowed_exts)) {
            $image_path = $upload_dir . uniqid() . '.' . $file_ext;
            move_uploaded_file($file_tmp, $image_path);
        } else {
            echo "<script>alert('Hanya file gambar (JPG, JPEG, PNG, GIF) yang diperbolehkan.');</script>";
        }
    }

    if ($image_path) {
        $new_campaign = [
            "title" => $_POST['title'],
            "image" => $image_path,
            "description" => $_POST['description']
        ];

        // Ganti kampanye pertama yang ada
        array_shift($campaigns);
        array_push($campaigns, $new_campaign);

        // Simpan perubahan ke file
        file_put_contents($data_file, json_encode($campaigns, JSON_PRETTY_PRINT));

        // Redirect untuk mencegah submit ulang
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengelola Kampanye</title>
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
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
        }
        .campaign h3 {
            color: #4682b4;
            margin: 10px 0;
        }
        .form-container {
            margin: 20px auto;
            max-width: 230px;
            background-color: white;
            padding: 20px;
            border: 2px solid black;
            border-radius: 10px;
            box-shadow: 3px 3px 0px black;
        }
        .form-container label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-container input, .form-container textarea {
            width: 80%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-container button {
            background-color: #4682b4;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            width: 35%;
        }
        .form-container button:hover {
            background-color: #315f82;
        }
    </style>
</head>
<body>
    <h1>Pengelola Kampanye</h1>

    <div class="campaign-container">
        <?php foreach ($campaigns as $campaign): ?>
            <div class="campaign">
                <img src="<?php echo $campaign['image']; ?>" alt="<?php echo $campaign['title']; ?>">
                <h3><?php echo $campaign['title']; ?></h3>
                <p><?php echo $campaign['description']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="form-container">
        <h2>Tambah Kampanye</h2>
        <form method="POST" enctype="multipart/form-data">
            <label for="title">Judul Kampanye</label>
            <input type="text" id="title" name="title" required>

            <label for="image">Unggah Gambar</label>
            <input type="file" id="image" name="image" accept="image/*" required>

            <label for="description">Deskripsi</label>
            <textarea id="description" name="description" rows="4" required></textarea>

            <button type="submit">Simpan</button>
        </form>
    </div>
</body>
</html>
