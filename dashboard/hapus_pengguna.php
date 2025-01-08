<!-- Nama File : hapus_pengguna.php -->
<!-- Deskripsi : Program untuk menghapus akun pengguna yang terdaftar -->
<!-- Pembuat :  Muhammad Danial NIM 3312401042 -->
<!-- Tanggal : 28 November 2024 -->

<?php 
// koneksi ke database
require '../function.php';

$nama = $_GET['userName'];
$result = mysqli_query($koneksi, "DELETE FROM user WHERE user_name = '$nama'");

echo "<script>alert('Data berhasil dihapus')</script>";
header("Location: data_pengguna.php");
?>