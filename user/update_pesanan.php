<!-- Nama File : update_pesanan.php -->
<!-- Deskripsi : Program untuk mengirimkan data bukti pembayaran yang dikirm oleh pengguna sebagai syarat pesanan -->
<!-- Pembuat : Muhammad Danial NIM 3312401042 -->
<!-- Tanggal : 26 Desember 2024 -->

<?php
session_start(); 
require "../function.php";

// Tangkap data bayar dari form
$userName = $_SESSION['userName'];
$bayar = $_FILES["bayar"]["name"];
$buktiBayar = $bayar;
$kode = $_POST['kode'];
$status = "Menunggu Konfirmasi";

         // Validasi file gambar
        $ukuran_gambar = $_FILES['bayar']['size'];
        $tmp_gambar = $_FILES['bayar']['tmp_name'];
        $error_gambar = $_FILES['bayar']['error'];
        $ekstensi_gambar_diperbolehkan = array('jpg', 'jpeg', 'png');
        $x_gambar = explode('.', $bayar);
        $ekstensi_gambar = strtolower(end($x_gambar));
        $path_gambar = "../dashboard/uploads/bayar/" . $buktiBayar;

    // Validasi file
    if ($error_gambar === UPLOAD_ERR_OK) {
        if (in_array($ekstensi_gambar, $ekstensi_gambar_diperbolehkan) && $ukuran_gambar <= 2000000) {
            if (move_uploaded_file($tmp_gambar, $path_gambar)) {
                // Simpan data ke database
                $sql = "UPDATE pesanan SET bukti_bayar='$buktiBayar', status='$status' WHERE kode_pesanan='$kode'";
                $queryCek = "UPDATE cek_pesanan SET status = '$status' WHERE kode_pesanan='$kode'";
                $query2	= mysqli_query($koneksi, $queryCek);
                $lastInsertId = mysqli_query($koneksi, $sql);
                if ($lastInsertId) {
                    echo "<script> alert('Bukti Pembayaran berhasil di kirim !!'); </script>";
                    echo "<script type='text/javascript'>
                            document.location = 'riwayat.php?user_name=$userName'; 
                            </script>";
                } else {
                    echo "<script>alert('Ops, terjadi kesalahan. Silahkan coba lagi.');</script>";
                    echo "<script>alert('Gagal menyimpan data ke database: " . mysqli_error($koneksi) . "'); window.history.back();</script>";
                }
            } else {
                echo "<script>alert('Gagal memindahkan file ke folder uploads!'); window.history.back();</script>";
            }
        } else {
            echo "<script>alert('File bayar tidak valid atau ukurannya terlalu besar!'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Terjadi error saat mengunggah file: $error_gambar!'); window.history.back();</script>";
    }
?>