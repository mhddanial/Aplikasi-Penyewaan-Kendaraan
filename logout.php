<?php
// Nama file: [logout.php]
// Deskripsi: [Berfungsi untuk mengakhiri sesi login sehingga user bisa mengganti akun]
// Dibuat Oleh: [Muhammad Danial] - [3312401042]
// Tanggal: 07 November 2024 

// Mengakhiri session login user
session_start();
$_SESSION = [];
session_unset();
session_destroy();
// redirect ke halaman login
header("Location: login.php");
exit;
?>