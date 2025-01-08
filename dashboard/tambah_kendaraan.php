<!-- Nama File : tambah_kendaraan.php -->
<!-- Deskripsi : Program untuk menambahkan data kendaraan  -->
<!-- Pembuat :  Muhammad Danial NIM 3312401042 -->
<!-- Tanggal : 28 November 2024 -->

<?php
require '../function.php';

$gambar = $_FILES['gambar']['name'];
$nama = mysqli_real_escape_string($koneksi, $_POST['namaKendaraan']);
$tipe = mysqli_real_escape_string($koneksi, $_POST['tipe']);
$harga = mysqli_real_escape_string($koneksi, $_POST['harga']);
$status = mysqli_real_escape_string($koneksi, $_POST['status']);

// Validasi file gambar
$ukuran_foto = $_FILES['gambar']['size'];
$tmp_gambar = $_FILES['gambar']['tmp_name'];
$error_gambar = $_FILES['gambar']['error'];
$ekstensi_gambar_diperbolehkan = array('jpg', 'jpeg', 'png');
$x_gambar = explode('.', $gambar);
$ekstensi_gambar = strtolower(end($x_gambar));
$path_gambar = "uploads/" . $gambar;

// Validasi file
if ($error_gambar === UPLOAD_ERR_OK) {
    if (in_array($ekstensi_gambar, $ekstensi_gambar_diperbolehkan) && $ukuran_foto <= 2000000) {
        if (move_uploaded_file($tmp_gambar, $path_gambar)) {
            // Simpan data ke database
            $query = "INSERT INTO kendaraan (gambar, nama_kendaraan, tipe_kendaraan, harga_per_hari, status)
                        VALUES ('$gambar', '$nama', '$tipe', '$harga', '$status')";
            if (mysqli_query($koneksi, $query)) {
                echo "<script>alert('Data berhasil ditambahkan!'); window.location='data_kendaraan.php';</script>";
            } else {
                echo "<script>alert('Gagal menyimpan data ke database: " . mysqli_error($koneksi) . "'); window.history.back();</script>";
            }
        } else {
            echo "<script>alert('Gagal memindahkan file ke folder uploads!'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('File gambar tidak valid atau ukurannya terlalu besar!'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Terjadi error saat mengunggah file: $error_gambar!'); window.history.back();</script>";
}
?>
