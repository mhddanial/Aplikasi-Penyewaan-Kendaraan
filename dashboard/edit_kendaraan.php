<!-- Nama File : edit_kendaraan.php -->
<!-- Deskripsi : Fungsi untuk memperbarui atau mengedit data kendaraan  -->
<!-- Pembuat :  Muhammad Danial NIM 3312401042 -->
<!-- Tanggal : 21 Desember 2024 -->

<?php
require '../function.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['namaKendaraan'];
    $tipe = $_POST['tipe'];
    $harga = $_POST['harga'];
    $status = $_POST['status'];
    $gambar = $_FILES['gambar']['name'];

    // Validasi jika ada file yang diunggah
    if (!empty($gambar)) {
        $ukuran_gambar = $_FILES['gambar']['size'];
        $tmp_gambar = $_FILES['gambar']['tmp_name'];
        $error_gambar = $_FILES['gambar']['error'];
        $ekstensi_gambar_diperbolehkan = array('jpg', 'jpeg', 'png');
        $x_gambar = explode('.', $gambar);
        $ekstensi_gambar = strtolower(end($x_gambar));
        $path_gambar = "uploads/" . $gambar;

        // Validasi file
        if ($error_gambar === UPLOAD_ERR_OK) {
            if (in_array($ekstensi_gambar, $ekstensi_gambar_diperbolehkan) && $ukuran_gambar <= 2000000) {
                if (move_uploaded_file($tmp_gambar, $path_gambar)) {
                    $sql = "UPDATE kendaraan 
                            SET gambar = '$gambar',
                                nama_kendaraan = '$nama', 
                                tipe_kendaraan = '$tipe', 
                                harga_per_hari = '$harga', 
                                status = '$status'
                            WHERE id = $id";
                } else {
                    echo "<script>alert('Gagal memindahkan file ke folder uploads!'); window.history.back();</script>";
                    exit;
                }
            } else {
                echo "<script>alert('File tidak valid atau ukurannya terlalu besar!'); window.history.back();</script>";
                exit;
            }
        } else {
            echo "<script>alert('Terjadi error saat mengunggah file: $error_gambar!'); window.history.back();</script>";
            exit;
        }
    } else {
        // Jika tidak ada file yang diunggah, update tanpa file gambar
        $sql = "UPDATE kendaraan SET 
                nama_kendaraan = '$nama', 
                tipe_kendaraan = '$tipe', 
                harga_per_hari = '$harga', 
                status = '$status'
                WHERE id = $id";
    }

    $result = mysqli_query($koneksi, $sql);
    if ($result) {
        echo "<script> alert('Data berhasil di update!'); </script>";
        echo "<script type='text/javascript'>
                document.location = 'data_kendaraan.php'; 
            </script>";
    } else {
        echo "<script>alert('Ops, terjadi kesalahan. Silahkan coba lagi.');</script>";
        echo "<script>alert('Gagal menyimpan data ke database: " . mysqli_error($koneksi) . "'); window.history.back();</script>";
    }
}
?>
