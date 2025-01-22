<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Enkripsi password
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];

    // Proses upload foto
    $foto = $_FILES['foto']['name'];
    $foto_tmp = $_FILES['foto']['tmp_name'];
    $foto_path = "uploads/" . $foto;

    // Pindahkan file foto ke folder uploads
    if (move_uploaded_file($foto_tmp, $foto_path)) {
        // Query untuk memasukkan data pengguna ke database
        $sql = "INSERT INTO users (username, password, email, no_hp, alamat, foto) 
                VALUES ('$username', '$password', '$email', '$no_hp', '$alamat', '$foto')";

        if ($conn->query($sql) === TRUE) {
            // Jika berhasil, redirect ke login.php
            header("Location: login.php");
            exit();
        } else {
            echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
        }
    } else {
        echo "<script>alert('Gagal mengupload foto!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #add8e6;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .registration-container {
            background-color: white;
            border: 2px solid black;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 5px 5px 0px black;
            text-align: center;
            width: 100%;
            max-width: 300px;
        }
        .registration-container h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #4682b4;
        }
        .registration-container a {
            color: #4682b4;
            text-decoration: none;
        }
        .registration-container a:hover {
            text-decoration: underline;
        }
        .btn-small {
            width: 150px; /* Atur lebar tombol */
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="registration-container">
            <h1>Donasi Darurat</h1>
            <form method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <input type="text" name="no_hp" class="form-control" placeholder="No HP" required>
                </div>
                <div class="mb-3">
                    <textarea name="alamat" class="form-control" placeholder="Alamat" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <input type="file" name="foto" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary btn-small">Daftar</button>
            </form>
            <div class="mt-3">
                <small><a href="login.php">Sudah punya akun? Login</a></small>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
