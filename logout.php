<?php
session_start();

// Menghapus semua session dan menghancurkan sesi
session_unset();    // Menghapus semua data session
session_destroy();  // Menghancurkan session

// Mengarahkan pengguna ke halaman login setelah logout
header("Location: login.php");
exit();
?>
