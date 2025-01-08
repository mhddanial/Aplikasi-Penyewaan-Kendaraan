<!-- Nama File : hapus_masukan.php -->
<!-- Deskripsi : Program untuk menghapus data saran dan masukan pengguna -->
<!-- Pembuat :  Muhammad Danial NIM 3312401042 -->
<!-- Tanggal : 28 Desember 2024 -->

<?php 
// koneksi ke database
require '../function.php';

$nama = $_GET['userName'];
$result = mysqli_query($koneksi, "DELETE FROM masukan WHERE user_name = '$nama'");

echo "<script>alert('Data berhasil dihapus')
        window.history.back();
</script>";
?>