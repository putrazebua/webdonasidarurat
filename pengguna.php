<?php
include 'config.php';
session_start();

// Cek apakah admin sudah login
if (!isset($_SESSION['username']) || $_SESSION['username'] != "ADMIN") {
    header("Location: login.php");
    exit();
}

// Query untuk mengambil data pengguna dari database
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
        .admin-container {
            background-color: white;
            border: 2px solid black;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 5px 5px 0px black;
            text-align: center;
            width: 80%;
            max-width: 900px;
        }
        .admin-container h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #4682b4;
        }
        .admin-container table {
            width: 100%;
            border-collapse: collapse;
        }
        .admin-container th, .admin-container td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        .admin-container th {
            background-color: #4682b4;
            color: white;
        }
        .admin-container td img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
        .admin-container a {
            color: #4682b4;
            text-decoration: none;
        }
        .admin-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <h2>Daftar Pengguna</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>Alamat</th>
                    <th>Foto</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    $no = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$no}</td>
                                <td>{$row['username']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['no_hp']}</td>
                                <td>{$row['alamat']}</td>
                                <td><img src='uploads/{$row['foto']}' alt='Foto Pengguna'></td>
                              </tr>";
                        $no++;
                    }
                } else {
                    echo "<tr><td colspan='6'>Tidak ada data pengguna.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
