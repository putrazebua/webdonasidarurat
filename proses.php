<?php
$servername = "localhost";
$username = "root";
$password = ""; // Ganti sesuai dengan password MySQL Anda
$dbname = "donasi"; // Nama database

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari formulir
    $nama = htmlspecialchars($_POST['Nama']);
    $email = htmlspecialchars($_POST['Email']);
    $alamat = htmlspecialchars($_POST['Alamat']);
    $title = htmlspecialchars($_POST['Title']);
    $deskripsi = htmlspecialchars($_POST['Deskripsi_Permintaan']);
    $target_dana = htmlspecialchars($_POST['Target_Dana']);
    $remaining_time = htmlspecialchars($_POST['remaining_time']);

    // Upload file gambar
    $gambar = $_FILES['Gambar'];
    $upload_dir = 'uploads/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }
    $gambar_path = $upload_dir . basename($gambar['name']);
    move_uploaded_file($gambar['tmp_name'], $gambar_path);

    // Simpan data ke database
    $stmt = $conn->prepare("INSERT INTO campaign (nama, email, alamat, title, deskripsi, target_dana, remaining_time, gambar) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssiis", $nama, $email, $alamat, $title, $deskripsi, $target_dana, $remaining_time, $gambar_path);
    $stmt->execute();

    // Redirect ke halaman utama
    header("Location: index.php");
    exit;
}
?>
