<!-- Nama File : batal_pesanan.php -->
<!-- Deskripsi : Fungsi untuk membatalkan pesanan yang dipesan oleh pengguna -->
<!-- Pembuat :  Muhammad Danial NIM 3312401042 -->
<!-- Tanggal : 25 Desember 2024 -->

<?php
session_start();
require "../function.php";

if (!isset($_SESSION['role'])) {
    header("Location: ../login.php");
    exit;
}

$userName = $_SESSION['userName'];
$kode = $_GET['kode'];

// Update status pesanan menjadi "Dibatalkan"
$status = "Dibatalkan";
$sql = "UPDATE pesanan SET status='$status' WHERE kode_pesanan='$kode'";
$queryCek = "UPDATE cek_pesanan SET status='$status' WHERE kode_pesanan='$kode'";

$query1 = mysqli_query($koneksi, $sql);
$query2 = mysqli_query($koneksi, $queryCek);

if ($query1 && $query2) {
    echo "<script>alert('Pesanan berhasil dibatalkan.');</script>";
    echo "<script>document.location = 'riwayat.php?user_name=$userName';</script>";
} else {
    echo "<script>alert('Gagal membatalkan pesanan: " . mysqli_error($koneksi) . "'); window.history.back();</script>";
}
?>
