<?php
// Tangkap data kampanye dari URL
$campaignTitle = isset($_GET['campaign_title']) ? htmlspecialchars($_GET['campaign_title']) : '';

// Koneksi ke database
try {
    $pdo = new PDO('mysql:host=localhost;dbname=donasi', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}

// Jika formulir dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $amount = $_POST['amount'];
    $phone = $_POST['phone'];
    $paymentMethod = $_POST['payment_method'];
    $campaignTitle = $_POST['campaign_title']; // Data kampanye dari formulir (readonly)

    // Simpan data ke database
    try {
        $stmt = $pdo->prepare("INSERT INTO pembayaran (name, amount, phone, payment_method, campaign_title, transaction_date) 
                               VALUES (?, ?, ?, ?, ?, NOW())");
        $stmt->execute([$name, $amount, $phone, $paymentMethod, $campaignTitle]);

        // Redirect pengguna ke halaman pembayaran sesuai metode
        switch ($paymentMethod) {
            case 'Dana':
                header('Location: https://link.dana.id/qr/+6282288939973');
                break;
            case 'OVO':
                header('Location: https://www.ovo.id/payment/+6282288939973');
                break;
            case 'GoPay':
                header('Location: https://www.gopay.com/+6282288939973');
                break;
            default:
                echo "Metode pembayaran tidak valid.";
                exit;
        }
        exit;
    } catch (PDOException $e) {
        die("Gagal menyimpan donasi: " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Donasi</title>
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
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 100%;
            max-width: 278px; 
        }

    h1 {
        font-size: 24px;
        color: #4682b4;
        margin-bottom: 20px;
    }

    form {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 15px; 
    }

    .form-group {
        width: 88%; 
    }

    label {
        font-size: 14px;
        color: #333333;
        margin-bottom: 5px;
        display: block;
        text-align: left;
    }

    input, select {
        padding: 10px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 5px;
        width: 100%;
        box-sizing: border-box; 
    }

    button {
        background-color: #4682b4;
        color: white;
        border: none;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        width: 30%; 
        max-width: 300px; 
        text-align: center;
    }

    button:hover {
        background-color: #315f82;
    }

    #account-info {
        margin-top: 10px;
        font-size: 14px;
        color: #333333;
        display: none;
    }
    </style>
</head>
<body>
    <div class="container">
        <h1>Donasi Darurat</h1>
        <form method="POST">
            <div class="form-group">
                <input type="text" id="name" name="name" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input type="text" id="phone" name="phone" placeholder="Nomor HP " required>
            </div>
            <div class="form-group">
                <input type="number" id="amount" name="amount" placeholder="Jumlah Rp" required>
            </div>
            <div class="form-group">
                <input type="text" id="campaign_title" name="campaign_title" value="<?php echo $campaignTitle; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="payment_method">Metode Pembayaran:</label>
                <select id="payment_method" name="payment_method" required onchange="showAccount()">
                    <option value="">E-WALLET</option>
                    <option value="Dana">Dana</option>
                    <option value="OVO">OVO</option>
                    <option value="GoPay">GoPay</option>
                </select>
            </div>
            <button type="submit">Kirim</button>
        </form>
    </div>
</body>
</html>
