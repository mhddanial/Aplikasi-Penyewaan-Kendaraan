<!-- Nama File : export_pdf.php -->
<!-- Deskripsi : Berfungsi untuk merubah dan mengupdate data katasandi akun pengguna -->
<!-- Pembuat : Muhammad Danial NIM 3312401042 -->
<!-- Tanggal : 24 Desember 2024-->

<?php
require 'fpdf/fpdf.php';
include '../function.php';
session_start();

// Verifikasi sesi
if (!isset($_SESSION['userName'])) {
    header("Location: ../login.php");
    exit;
}

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 10, 'Detail Pesanan', 0, 1, 'C');
        $this->Ln(10);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Halaman ' . $this->PageNo(), 0, 0, 'C');
    }
}

// Ambil data dari database
$userName = $_SESSION['userName'];
$kode = $_GET['kode_pesanan'];
$sql = "SELECT pesanan.*, kendaraan.*, user.*,  
        pesanan.status AS status_pesanan FROM pesanan
        INNER JOIN kendaraan ON pesanan.id_kendaraan = kendaraan.id
        INNER JOIN user ON pesanan.user_name = user.user_name
        WHERE pesanan.kode_pesanan = '$kode'";
$query = mysqli_query($koneksi, $sql);

if (!$query || mysqli_num_rows($query) == 0) {
    die("Data pesanan tidak ditemukan.");
}

$result = mysqli_fetch_array($query);
$bayar = $result['bukti_bayar'];
$alamat = $result['alamat'];
$namaKendaraan = $result['nama_kendaraan'];
$tipeKendaraan = $result['tipe_kendaraan'];
$tglSewa = $result['tgl_mulai'];
$tglSelesai = $result['tgl_selesai'];
$durasi = $result['durasi'];
$pickup = $result['pickup'];
$harga = $result['harga_per_hari'];
$status = $result['status_pesanan'];
$totalKendaraan = $durasi * $harga;

// Buat PDF
$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

// Tambahkan detail pesanan ke PDF
  // Tambahkan foto peserta dengan jarak rapi
    if (!empty($bayar) && file_exists('../dashboard/uploads/bayar/' . $bayar)) {
        $pdf->Cell(0, 10, 'Bukti Pembayaran', 0, 1);
        $pdf->Image('../dashboard/uploads/bayar/' . $bayar, 10, $currentY, 100, 100);
} 

$pdf->Cell(0, 10, 'Kode Pesanan : ' . $kode, 0, 1);
$pdf->Cell(0, 10, 'Nama Penyewa : ' . $userName, 0, 1);
$pdf->Cell(0, 10, 'Alamat Penyewa : ' . $alamat, 0, 1);
$pdf->Cell(0, 10, 'Nama Kendaraan : ' . $namaKendaraan, 0, 1);
$pdf->Cell(0, 10, 'Tipe Kendaraan : ' . $tipeKendaraan, 0, 1);
$pdf->Cell(0, 10, 'Tanggal Sewa : ' . $tglSewa, 0, 1);
$pdf->Cell(0, 10, 'Tanggal Kembali : ' . $tglSelesai, 0, 1);
$pdf->Cell(0, 10, 'Durasi : ' . $durasi . ' Hari', 0, 1);
$pdf->Cell(0, 10, 'Metode Pickup : ' . $pickup, 0, 1);
$pdf->Cell(0, 10, 'Harga per Hari : Rp. ' . number_format($harga), 0, 1);
$pdf->Cell(0, 10, 'Total Bayar : Rp. ' . number_format($totalKendaraan), 0, 1);
$pdf->Cell(0, 10, 'Status : ' . $status, 0, 1);

// Outputkan PDF
$pdfOutput = 'detail_pesanan_' . $kode . '.pdf';
$pdf->Output('F', $pdfOutput);
header('Content-Type: application/pdf');
header('Content-Disposition: inline; filename="' . $pdfOutput . '"');
readfile($pdfOutput);
unlink($pdfOutput);
exit;
?>
