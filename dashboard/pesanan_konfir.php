<!-- Nama File : pesanan_konfir.php -->
<!-- Deskripsi : Halaman untuk menampilkan dan mengedit data pesanan dengan status Menunggu Pembayaran -->
<!-- Pembuat :  Muhammad Danial NIM 3312401042 -->
<!-- Tanggal : 26 Desember 2024 -->

<?php 
    session_start();
    if (!isset($_SESSION["role"]) ){
        header("Location: ../login.php");
        exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"
    />
    <style>
        body {
        background-color: #f5f5f5;
        padding-top: 80px;
        font-family: "Poppins", sans-serif; 
        }
        .sidebar {
        background-color: #1f2a44;
        height: 100vh;
        color: #fff;
        }
        .sidebar a{
        color: #c4c9d7;
        text-decoration: none;
        padding: 10px 15px;
        display: block;
        }
        .sidebar a:hover {
        background-color: #394764;
        color: #fff;
        }
        .sidebar .active {
        background-color: #2a3a5c;
        }
        .header {
        background-color: #2a3a5c;
        color: #fff;
        padding: 15px;
        }
        .card {
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.5);
        }

</style>
</head>
<body>

</head>
<body>
    <div class="container-fluid">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg fixed-top mb-5 bg-body-tertiary shadow-lg">
            <div class="container-fluid fw-bold">
            <a class="navbar-brand" href="#">
                <img src="../asset/easyride.png" alt="Logo" width="50" class="d-inline-block align-text-center" />
                easyRide
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarOffcanvas" aria-controls="sidebarOffcanvas">
                <span class="navbar-toggler-icon"></span>
            </button>
            </div>
        </nav>
        <!-- Offcanvas Mobile -->
        <div class="offcanvas offcanvas-start sidebar" tabindex="-1" id="sidebarOffcanvas" aria-labelledby="sidebarOffcanvasLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarOffcanvasLabel">Dashboard Admin</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav">
            <li class="nav-item mb-2"><a href="index.php"><i class="fa-solid fa-grip me-2"></i>Dashboard</a>
            <li class="nav-item mb-2"><a href="data_kendaraan.php"><i class="fa-solid fa-car me-2"></i>Data Kendaraan</a></li>
            <li class="nav-item mb-2"><a href="data_pengguna.php"><i class="fa-solid fa-users me-2"></i>Data Pengguna</a></li>
            <li class="nav-item mb-2"><a class="dropdown dropdown-toggle"data-bs-toggle="collapse" data-bs-target="#pesanan" aria-expanded="false" aria-controls="pesanan">
                <i class="fa-solid fa-bag-shopping me-2"></i>Data Pesanan</a></li>
                <div class="sub-menu collapse group-dividers mb-2" id="pesanan">
                    <hr class="border-3 opacity-50">
                    <li class="nav-item mb-2 ms-4"><a href="data_pesanan.php">Semua</a></li>
                    <li class="nav-item mb-2 ms-4"><a href="pesanan_bayar.php">Menunggu Pembayaran</a></li>
                    <li class="nav-item mb-2 ms-4"><a href="pesanan_konfir.php" class="active text-white">Menunggu Konfirmasi</a></li>
                    <li class="nav-item mb-2 ms-4"><a href="pengembalian.php">Pengembalian</a></li>
                </div>
            <li class="nav-item mb-2"><a href="masukan.php"><i class="fa-solid fa-phone me-2"></i>Masukan</a></li>
            <li class="nav-item mb-2"><a href="#"><i class="fa-solid fa-gears me-2"></i>Pengaturan</a></li>
            <li class="nav-item mb-2"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket me-2"></i>Keluar</a></li>
            </ul>
        </div>
        </div>
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block sidebar">
            <div class="d-flex flex-column pt-4 px-2">
                <ul class="navbar-nav">
                <li class="nav-item mb-2"><a href="index.php"><i class="fa-solid fa-grip me-2"></i>Dashboard</a>
                <!-- Menu -->
                <li class="nav-item mb-2"><a href="data_kendaraan.php"><i class="fa-solid fa-car me-2"></i>Data Kendaraan</a></li>
                <li class="nav-item mb-2"><a href="data_pengguna.php"><i class="fa-solid fa-users me-2"></i>Data Pengguna</a></li>
                <li class="nav-item mb-2"><a href="" class="dropdown dropdown-toggle"data-bs-toggle="collapse" data-bs-target="#pesanan" aria-expanded="false" aria-controls="pesanan">
                    <i class="fa-solid fa-bag-shopping me-2"></i>Data Pesanan</a></li>
                    <div class="sub-menu collapse group-dividers mb-2" id="pesanan">
                    <hr class="border-3 opacity-50">
                    <li class="nav-item mb-2 ms-4"><a href="data_pesanan.php">Semua</a></li>
                    <li class="nav-item mb-2 ms-4"><a href="pesanan_bayar.php">Menunggu Pembayaran</a></li>
                    <li class="nav-item mb-2 ms-4"><a href="pesanan_konfir.php" class="active text-white">Menunggu Konfirmasi</a></li>
                    <li class="nav-item mb-2 ms-4"><a href="pengembalian.php">Pengembalian</a></li>
                    </div>
                <li class="nav-item mb-2"><a href="masukan.php"><i class="fa-solid fa-phone me-2"></i>Masukan</a></li>
                <li class="nav-item mb-2"><a href="#"><i class="fa-solid fa-gears me-2"></i>Pengaturan</a></li>
                <li class="nav-item mb-2"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket me-2"></i>Keluar</a></li></li>
                </ul>
            </div>
            </nav>
            <!-- Main Content -->
            <main class="col-md-10 ms-sm-auto px-md-4">
                <div class="header mb-4 p-4">
                    <h3><i class="fa-solid fa-bag-shopping me-2"></i>Menunggu Konfirmasi</h3>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card p-3">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered align-middle text-center"> 
                                    <thead> 
                                        <tr> 
                                            <th scope="col">NO</th> 
                                            <th scope="col">KODE PESANAN</th> 
                                            <th scope="col">NAMA KENDARAAN</th> 
                                            <th scope="col">TGL. MULAI</th> 
                                            <th scope="col">TGL. SELESAI</th> 
                                            <th scope="col">TOTAL</th> 
                                            <th scope="col">PENYEWA</th>
                                            <th scope="col">STATUS</th>
                                            <th scope="col">AKSI</th>  
                                        </tr> 
                                    </thead> 
                                    <tbody class="table-group-divider">         
                                    <tr>
                                    <?php
                                        require '../function.php';
                                        $sqlSewa =  "SELECT 
                                                        pesanan.*, 
                                                        kendaraan.nama_kendaraan, kendaraan.harga_per_hari, kendaraan.status AS status_kendaraan,
                                                        user.*,
                                                        pesanan.status AS status
                                                    FROM 
                                                        pesanan
                                                    JOIN 
                                                        kendaraan ON pesanan.id_kendaraan = kendaraan.id
                                                    JOIN 
                                                        user ON pesanan.user_name = user.user_name
                                                    WHERE 
                                                        pesanan.id_kendaraan = kendaraan.id 
                                                    AND user.user_name=pesanan.user_name AND pesanan.status ='Menunggu Konfirmasi'
                                                    ORDER BY pesanan.kode_pesanan DESC";
                                        $querySewa = mysqli_query($koneksi, $sqlSewa);
                                        // $query = mysqli_query($koneksi, "SELECT pesanan.*, kendaraan.*, user.*
                                        // FROM pesanan, kendaraan, user WHERE pesanan.id_kendaraan=kendaraan.id 
                                        // AND user.user_name=pesanan.user_name AND status='Menunggu Konfirmasi'
                                        // ORDER BY pesanan.kode_pesanan DESC");

                                        if (!$querySewa) {
                                            die("Query failed: " . mysqli_error($koneksi));
                                        }
                                        // cek data
                                        if (mysqli_num_rows($querySewa) > 0) {
                                            $no = 1;
                                            while ($data = mysqli_fetch_assoc($querySewa)) {
                                                $biayaKendaraan= $data['durasi'] * $data['harga_per_hari'];
                                                $total = $biayaKendaraan;
                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['kode_pesanan'];?></td>
                                            <td><?php echo $data['nama_kendaraan']; ?></td>
                                            <td><?php echo $data['tgl_mulai']; ?></td>
                                            <td><?php echo $data['tgl_selesai']; ?></td>
                                            <td><?php echo "Rp. ".number_format($total); ?></td>   
                                            <td><?php echo $data['user_name']; ?></td>
                                            <td><?php echo $data['status']; ?></td>     
                                            <td>
                                                <!-- Tombol lihat -->
                                                <button 
                                                    class="btn btn-warning btn-sm me-1 btn-lihat" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#lihatDataModal" 
                                                    data-id="<?php echo $data['kode_pesanan']; ?>"
                                                    data-nama="<?php echo $data['nama_kendaraan']; ?>"
                                                    data-tgl_mulai="<?php echo $data['tgl_mulai']; ?>"
                                                    data-tgl_selesai="<?php echo $data['tgl_selesai']; ?>"
                                                    data-harga="<?php echo "Rp. " . number_format($data['harga_per_hari']); ?>"
                                                    data-total="<?php echo "Rp. " . number_format($total); ?>"
                                                    data-penyewa="<?php echo $data['user_name']; ?>"
                                                    data-no_telepon="<?php echo $data['no_telepon']; ?>"
                                                    data-pickup="<?php echo $data['pickup']; ?>"
                                                    data-alamat="<?php echo $data['alamat']; ?>"
                                                    data-status="<?php echo $data['status']; ?>"
                                                    data-bukti="<?php echo $data['bukti_bayar']; ?>">
                                                    <i class="fas fa-edit me-2"></i>Edit
                                                </button> 
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        }  else { ?>
                                            <tr><td colspan="11">Tidak Ada data</td></tr>
                                        <?php }?>
                                    </tbody> 
                                </table> 
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <!-- Modal Lihat Data -->
            <div class="modal fade" id="lihatDataModal" tabindex="-1" aria-labelledby="lihatDataLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="lihatDataLabel">Detail Pesanan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST">
                                <div class="row g-3">
                                    <!-- Kolom Kiri -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="modalKodePesanan" class="form-label">Kode Pesanan</label>
                                            <input type="text" id="modalKodePesanan" class="form-control" name="kode" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="modalNamaKendaraan" class="form-label">Nama Kendaraan</label>
                                            <input type="text" id="modalNamaKendaraan" class="form-control" name="namaKendaraan" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="modalTglMulai" class="form-label">Tanggal Mulai</label>
                                            <input type="text" id="modalTglMulai" class="form-control" name="tglMulai" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="modalTglSelesai" class="form-label">Tanggal Selesai</label>
                                            <input type="text" id="modalTglSelesai" class="form-control" name="tglSelesai" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="modalHarga" class="form-label">Harga / Hari</label>
                                            <input type="text" id="modalHarga" class="form-control" name="harga" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="modalTotal" class="form-label">Total</label>
                                            <input type="text" id="modalTotal" class="form-control" name="total" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="modalStatus" class="form-label">Status saat ini</label>
                                            <input type="text" id="modalStatus" class="form-control" name="status" readonly>
                                        </div>
                                    </div>
                                    <!-- Kolom Kanan -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="modalPenyewa" class="form-label">Penyewa</label>
                                            <input type="text" id="modalPenyewa" class="form-control" name="penyewa" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="modalNoTelepon" class="form-label">No Telepon</label>
                                            <input type="text" id="modalNoTelepon" class="form-control" name="noTelepon" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="modalPickup" class="form-label">Metode Pickup</label>
                                            <input type="text" id="modalPickup" class="form-control" name="pickup" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="modalAlamat" class="form-label">alamat</label>
                                            <textarea id="modalAlamat" class="form-control" name="alamat" readonly></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="modalBuktiGambar" class="form-label">Bukti Pembayaran</label>
                                            <div class="text-center">
                                                <img id="modalBuktiGambar" src="uploads/bayar/" alt="Bukti Pembayaran" name="bukti"
                                                    class="img-fluid border rounded" style="max-height: 300px;">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="modalUpdate" class="form-label fw-bold">Perbarui Status*</label>
                                            <select class="form-control" name="newStatus" id="modalUpdate" required>
                                                <option value=""> == Pilih Status == </option>
                                                <option value="Sudah Dibayar">Sudah Dibayar</option>
                                                <option value="Dibatalkan">Dibatalkan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- Tombol Aksi -->
                                <div class="row mt-3">
                                    <div class="col text-end">
                                        <button type="submit" name="update" class="btn btn-primary">Perbarui</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php 
            // Update data baru
            if(isset($_POST['update'])){
                $status = $_POST['newStatus'];
                $kode = $_POST['kode'];
                $queryPesanan	= "UPDATE pesanan SET status = '$status' WHERE kode_pesanan='$kode'";
                $query1	= mysqli_query($koneksi, $queryPesanan);
                $queryCek	= "UPDATE cek_pesanan SET status = '$status' WHERE kode_pesanan='$kode'";
                $query2	= mysqli_query($koneksi, $queryCek);
                echo "<script type='text/javascript'>
                        alert('Status berhasil diupdate.'); 
                        document.location = 'pesanan_konfir.php'; 
                    </script>";
            } 
            ?>

    <script>
        document.querySelectorAll('.btn-lihat').forEach(button => {
            button.addEventListener('click', function () {
                // Isi data ke modal
                document.getElementById('modalKodePesanan').value = this.dataset.id;
                document.getElementById('modalNamaKendaraan').value = this.dataset.nama;
                document.getElementById('modalTglMulai').value = this.dataset.tgl_mulai;
                document.getElementById('modalTglSelesai').value = this.dataset.tgl_selesai;
                document.getElementById('modalHarga').value = this.dataset.harga;
                document.getElementById('modalTotal').value = this.dataset.total;
                document.getElementById('modalPenyewa').value = this.dataset.penyewa;
                document.getElementById('modalNoTelepon').value = this.dataset.no_telepon;
                document.getElementById('modalPickup').value = this.dataset.pickup;
                document.getElementById('modalAlamat').value = this.dataset.alamat;
                document.getElementById('modalStatus').value = this.dataset.status;
                
                // Atur gambar bukti pembayaran
                const modalBuktiGambar = document.getElementById('modalBuktiGambar');
                if (this.dataset.bukti) {
                    modalBuktiGambar.src = `uploads/bayar/${this.dataset.bukti}`;
                    modalBuktiGambar.alt = 'Bukti Pembayaran';
                } else {
                    modalBuktiGambar.src = '';
                    modalBuktiGambar.alt = 'Tidak ada bukti pembayaran';
                }
            });
        });
    </script>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>