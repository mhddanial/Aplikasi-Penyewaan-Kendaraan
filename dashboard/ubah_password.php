<!-- Nama File : ubah_password.php -->
<!-- Deskripsi : Program untuk mengubah kata sandi admin -->
<!-- Pembuat :  Muhammad Danial NIM 3312401042 -->
<!-- Tanggal : 28 Desember 2024 -->

<?php 
require "../function.php";
session_start();

if (!isset($_SESSION['role'])) {
    echo "<script>alert('Sesi tidak valid! Harap login kembali.'); window.location.href = '../login.php';</script>";
    exit;
}

// Ambil data dari form
$oldPassword = trim($_POST['old-password']);
$newPassword = trim($_POST['new-password']);
$confirmPassword = trim($_POST['confirm-password']);

// Validasi input
if (empty($oldPassword) || empty($newPassword) || empty($confirmPassword)) {
    echo "<script>alert('Semua bidang wajib diisi!'); window.history.back();</script>";
    exit;
}

if (strlen($newPassword) < 8) {
    echo "<script>alert('Kata sandi baru harus minimal 8 karakter!'); window.history.back();</script>";
    exit;
}

if ($newPassword !== $confirmPassword) {
    echo "<script>alert('Kata sandi baru tidak cocok!'); window.history.back();</script>";
    exit;
}

// Dapatkan data pengguna dari sesi
$userName = mysqli_real_escape_string($koneksi, $_SESSION['userName']);

// Periksa kata sandi lama
$query = "SELECT password FROM user WHERE user_name = '$userName'";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    echo "<script>alert('Terjadi kesalahan pada database.'); window.history.back();</script>";
    exit;
}

if (mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);
    
    if (password_verify($oldPassword, $data['password'])) {
        // Hash kata sandi baru
        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

        // Update kata sandi baru ke database
        $updateQuery = "UPDATE user SET password = '$hashedPassword' WHERE user_name = '$userName'";
        if (mysqli_query($koneksi, $updateQuery)) {
            echo "<script>alert('Kata sandi berhasil diperbarui! Silahkan login kembali.'); window.location.href = '../logout.php';</script>";
            exit;
        } else {
            echo "<script>alert('Terjadi kesalahan saat memperbarui kata sandi.'); window.history.back();</script>";
            exit;
        }
    } else {
        echo "<script>alert('Kata sandi lama tidak cocok.'); window.history.back();</script>";
        exit;
    }
} else {
    echo "<script>alert('Data pengguna tidak ditemukan.'); window.history.back();</script>";
    exit;
}
