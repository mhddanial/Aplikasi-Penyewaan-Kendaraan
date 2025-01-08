<!-- Nama File : hapus_kendaraan.php -->
<!-- Deskripsi : Program untuk menghapus data kendaraan -->
<!-- Pembuat :  Muhammad Danial NIM 3312401042 -->
<!-- Tanggal : 28 November 2024 -->

<?php 
// koneksi ke database
require '../function.php';

$id = $_GET['id'];
$result = mysqli_query($koneksi, "DELETE FROM kendaraan WHERE id = '$id'");

echo "<script type='text/javascript'>
alert('Data berhasil dihapus.'); 
document.location = 'data_kendaraan.php'; 
</script>";
?>