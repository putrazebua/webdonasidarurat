<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Penggalangan Dana</title>
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
            background: #fff;
            border: 3px solid black;
            padding: 7px;
            border-radius: 20px;
            box-shadow: 5px 5px 0px black;
            text-align: center;
            max-width: 300px;
            width: 90%;
        }
        h2 {
            font-size: 20px;
            color: #4682b4;
            margin-bottom: 15px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        input, textarea, button {
            width: 80%;
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 2px;
            font-size: 14px;
        }
        textarea {
            resize: none;
        }
        button {
            background-color: #4682b4;
            color: #fff;
            border: none;
            cursor: pointer;
            max-width: 90px;  /* Membatasi lebar tombol */
            padding: 8px 15px; /* Menyesuaikan padding */
            margin-top: 10px;  /* Memberikan jarak atas tombol */
        }
        button:hover {
            background-color: #5a9bd6;
        }
        file-input {
            text-align: left;
            padding: 8px 15px;  /* Menambahkan padding untuk elemen input */
            border: 1px dashed #ccc;
            border-radius: 5px;  /* Menambahkan radius agar lebih estetis */
            cursor: pointer;
            color: #888;
            max-width: 200px;  /* Membatasi lebar agar tidak terlalu panjang */
            margin: 5px auto;   /* Membuat margin agar lebih teratur di tengah */
        }

        .file-input:hover {
            border-color: #4682b4;
            color: #4682b4;
        }
        .file-input input {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Donasi Darurat</h2>
        <form action="proses.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" name="Nama" placeholder="Nama Anda" required>
            </div>
            <div class="form-group">
                <input type="email" name="Email" placeholder="Email Anda" required>
            </div>
            <div class="form-group">
                <input type="text" name="Alamat" placeholder="Alamat Anda" required>
            </div>
            <div class="form-group">
                <input type="text" name="Title" placeholder="Judul" required>
            </div>
            <div class="form-group">
                <textarea name="Deskripsi_Permintaan" placeholder="Deskripsi permintaan dana" required></textarea>
            </div>
            <div class="form-group">
                <input type="number" name="Target_Dana" placeholder="Target Dana" required>
            </div>
            <div class="form-group">
                <input type="number" name="remaining_time" placeholder="Waktu (hari)" required>
            </div>
            <div class="form-group file-input">
                <label for="Gambar">masukkan foto</label>
                <input type="file" id="Gambar" name="Gambar" accept="image/*" required>
            </div>
            <button type="submit">Kirim</button>
        </form>
    </div>
</body>
</html>
