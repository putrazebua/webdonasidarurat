<?php
include 'config.php';
session_start();

// Pastikan pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Arahkan ke halaman login jika belum login
    exit();
}

// Ambil data pengguna berdasarkan session
$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "<script>alert('Data pengguna tidak ditemukan!');</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
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
        .profile-container {
            background-color: white;
            border: 2px solid black;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 5px 5px 0px black;
            text-align: center;
            width: 350px;
        }
        .profile-container h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #4682b4;
        }
        .profile-container img {
            border-radius: 50%;
            margin-bottom: 15px;
            width: 150px; /* Ukuran foto diperbesar */
            height: 150px; /* Ukuran foto diperbesar */
            object-fit: cover; /* Memastikan foto tetap proporsional */
        }
        .profile-container p {
            font-size: 14px;
            margin: 5px 0;
        }
        .profile-container a {
            display: inline-block;
            margin-top: 15px;
            background-color: #4682b4;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }
        .profile-container a:hover {
            background-color: #5a9bd8;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <h1>Profil Pengguna</h1>
        <img src="uploads/<?php echo $user['foto']; ?>" alt="Foto Profil" class="img-thumbnail">
        <p><strong>Username:</strong> <?php echo $user['username']; ?></p>
        <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
        <p><strong>Alamat:</strong> <?php echo $user['alamat']; ?></p>
        <p><strong>No HP:</strong> <?php echo $user['no_hp']; ?></p>
        <a href="login.php">Logout</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
