<!-- Nama File : data_kendaraan.php -->
<!-- Deskripsi : Halaman untuk melihat, menghapus , dan menambah data Kendaraan oleh admin -->
<!-- Pembuat :  Muhammad Danial NIM 3312401042 -->
<!-- Tanggal : 27 November 2024 -->

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
     <!-- Logo -->
    <link href="../asset/easyride.png" rel="icon" type="image/png"/>
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
            <li class="nav-item mb-2"><a href="data_kendaraan.php" class="active text-white"><i class="fa-solid fa-car me-2"></i>Data Kendaraan</a></li>
            <li class="nav-item mb-2"><a href="data_pengguna.php"><i class="fa-solid fa-users me-2"></i>Data Pengguna</a></li>
            <li class="nav-item mb-2"><a class="dropdown dropdown-toggle"data-bs-toggle="collapse" data-bs-target="#pesanan" aria-expanded="false" aria-controls="pesanan">
                <i class="fa-solid fa-bag-shopping me-2"></i>Data Pesanan</a></li>
                <div class="sub-menu collapse group-dividers mb-2" id="pesanan">
                    <hr class="border-3 opacity-50">
                    <li class="nav-item mb-2 ms-4"><a href="data_pesanan.php">Semua</a></li>
                    <li class="nav-item mb-2 ms-4"><a href="pesanan_bayar.php">Menunggu Pembayaran</a></li>
                    <li class="nav-item mb-2 ms-4"><a href="pesanan_konfir.php">Menunggu Konfirmasi</a></li>
                    <li class="nav-item mb-2 ms-4"><a href="pengembalian.php">Pengembalian</a></li>
                </div>
            <li class="nav-item mb-2"><a href="masukan.php"><i class="fa-solid fa-phone me-2"></i>Masukan</a></li>
            <li class="nav-item mb-2"><a href="pengaturan.php"><i class="fa-solid fa-gears me-2"></i>Pengaturan</a></li>
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
                <li class="nav-item mb-2"><a href="data_kendaraan.php" class="active text-white"><i class="fa-solid fa-car me-2"></i>Data Kendaraan</a></li>
                <li class="nav-item mb-2"><a href="data_pengguna.php"><i class="fa-solid fa-users me-2"></i>Data Pengguna</a></li>
                <li class="nav-item mb-2"><a href="" class="dropdown dropdown-toggle"data-bs-toggle="collapse" data-bs-target="#pesanan" aria-expanded="false" aria-controls="pesanan">
                    <i class="fa-solid fa-bag-shopping me-2"></i>Data Pesanan</a></li>
                    <div class="sub-menu collapse group-dividers mb-2" id="pesanan">
                    <hr class="border-3 opacity-50">
                    <li class="nav-item mb-2 ms-4"><a href="data_pesanan.php">Semua</a></li>
                    <li class="nav-item mb-2 ms-4"><a href="pesanan_bayar.php">Menunggu Pembayaran</a></li>
                    <li class="nav-item mb-2 ms-4"><a href="pesanan_konfir.php">Menunggu Konfirmasi</a></li>
                    <li class="nav-item mb-2 ms-4"><a href="pengembalian.php">Pengembalian</a></li>
                    </div>
                <li class="nav-item mb-2"><a href="masukan.php"><i class="fa-solid fa-phone me-2"></i>Masukan</a></li>
                <li class="nav-item mb-2"><a href="pengaturan.php"><i class="fa-solid fa-gears me-2"></i>Pengaturan</a></li>
                <li class="nav-item mb-2"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket me-2"></i>Keluar</a></li></li>
                </ul>
            </div>
            </nav>
            <!-- Main Content -->
            <main class="col-md-10 ms-sm-auto px-md-4">
                <div class="header mb-4 p-4">
                    <h3><i class="fa-solid fa-car me-2"></i>Data Kendaraan</h3>
                </div>
                    <button type="button" class="btn btn-secondary mb-2" data-bs-toggle="modal" data-bs-target="#tambahDataModal">
                        <i class="fas fa-plus-circle me-2"></i>TAMBAH DATA KENDARAAN
                    </button>
                <div class="col-md-12">
                    <div class="card p-3">
                        <form class="d-flex mb-4" method="GET" role="search">
                            <input class="form-control w-50 me-2 " type="search" placeholder="Cari disini.." name="keyword" aria-label="Search" autocomplete="off">
                            <button class="btn btn-secondary" style="background-color: #1f2a44;" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered align-middle text-center"> 
                                <thead> 
                                    <tr> 
                                        <th scope="col">NO</th> 
                                        <th scope="col">GAMBAR</th> 
                                        <th scope="col">NAMA KENDARAAN</th> 
                                        <th scope="col">TIPE</th> 
                                        <th scope="col">HARGA / HARI</th> 
                                        <th scope="col">STATUS</th> 
                                        <th scope="col">TANGGAL DITAMBAH</th> 
                                        <th scope="col">AKSI</th> 
                                    </tr> 
                                </thead> 
                                <tbody class="table-group-divider">         
                                <tr>
                                <?php
                                    require '../function.php';
                                    // Pencarian
                                    if (isset($_GET['keyword'])) {
                                        $keyword = $_GET['keyword'];
                                        $query = mysqli_query($koneksi, "SELECT * FROM kendaraan 
                                        WHERE nama_kendaraan LIKE '%$keyword%'
                                        OR tipe_kendaraan LIKE '%$keyword%'
                                        OR harga_per_hari LIKE '%$keyword%'
                                        OR status LIKE '%$keyword%'
                                        ORDER BY id DESC");
                                    } else {
                                        $query = mysqli_query($koneksi, "SELECT * FROM kendaraan");
                                    }
                                    $countData = mysqli_num_rows($query);
                                    if ($countData < 1) {
                                ?>
                                <?php ?>
                                <tr><td colspan="11">Data yang anda cari tidak ada</td></tr>
                                <?php } ?> 

                                <?php
                                    if (!$query) {
                                        die("Query failed: " . mysqli_error($koneksi));
                                    }
                                    // cek data
                                    if (mysqli_num_rows($query) > 0) {
                                        $no = 1;
                                        while ($data = mysqli_fetch_assoc($query)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><img src="uploads/<?= $data['gambar']; ?>" alt="Gambar Kendaraan" width="100"></td>
                                        <td><?php echo $data['nama_kendaraan']; ?></td>
                                        <td><?php echo $data['tipe_kendaraan']; ?></td>
                                        <td><?php echo "Rp " . number_format($data['harga_per_hari']); ?></td>     
                                        <td><?php echo $data['status']; ?></td>     
                                        <td><?php echo $data['tanggal_di_tambah']; ?></td>
                                        <td>
                                            <!-- Tombol Edit -->
                                            <button 
                                                class="btn btn-warning btn-sm me-1 btn-edit" 
                                                data-id="<?= $data['id'] ?>"
                                                data-gambar = "<?= $data['gambar'] ?>"
                                                data-nama="<?= $data['nama_kendaraan'] ?>"
                                                data-tipe="<?= $data['tipe_kendaraan'] ?>"
                                                data-harga="<?= "Rp " . number_format($data['harga_per_hari']) ?>"
                                                data-status="<?= $data['status'] ?>" >
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                            <!-- Tombol Delete -->
                                            <a href="hapus_kendaraan.php?id=<?= $data['id']; ?>" class="btn btn-danger btn-sm" 
                                                onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                <i class="fas fa-trash-alt me-1"></i>Hapus
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                    } 
                                    ?>
                                </tbody> 
                            </table> 
                        </div>
                    </div>
                </div>
            </main>
            <!-- Modal Tambah Data -->
            <div class="modal fade" id="tambahDataModal" tabindex="-1" aria-labelledby="tambahDataLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tambahDataLabel">Tambah Data Kendaraan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="tambah_kendaraan.php" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Gambar</label>
                                    <input class="form-control" type="file" name="gambar" id="formFile" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Kendaraan</label>
                                    <input type="text" class="form-control" id="namaKendaraan" name="namaKendaraan" autocomplete="off" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tipe" class="form-label">Tipe</label>
                                    <select class="form-select" aria-label="Default select example" name="tipe" required>
                                        <option selected>Pilih tipe kendaraan</option>
                                        <option value="Mobil">Mobil</option>
                                        <option value="Motor">Motor</option>
                                        <option value="Sepeda">Sepeda</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="harga" class="form-label">Harga / hari</label>
                                    <input type="number" class="form-control" id="harga" name="harga" required>
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-control" name="status" id="status" required>
                                        <option value=""> == Pilih Status == </option>
                                        <option value="Sedia">Sedia</option>
                                        <option value="Kosong">Kosong</option>
                                        <option value="Sedang Diperbaiki">Sedang Diperbaiki</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Edit Data -->
            <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Data Kendaraan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <!-- Column for the image -->
                                <div class="col-md-5">
                                    <label class="form-label">Gambar Saat Ini</label><br>
                                    <img id="editGambarPreview" src="" alt="Gambar" class="img-fluid border rounded"><br>
                                <form action="edit_kendaraan.php" method="POST" enctype="multipart/form-data">
                                    <label for="formFile" class="form-label">Ganti gambar</label>
                                    <input class="form-control" type="file" name="gambar" id="editGambar">
                                </div>
                                <!-- Column for the form -->
                                <div class="col-md-7">
                                    <input type="hidden" name="id" id="editId" required>
                                    <input type="hidden" name="gambarLama" id="gambarLama" required>
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama Kendaraan</label>
                                        <input type="text" class="form-control" id="editNama" name="namaKendaraan" autocomplete="off" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tipe" class="form-label">Tipe</label>
                                        <select class="form-select" name="tipe" id="editTipe" required>
                                            <option selected>Pilih tipe kendaraan</option>
                                            <option value="Mobil">Mobil</option>
                                            <option value="Motor">Motor</option>
                                            <option value="Sepeda">Sepeda</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="harga" class="form-label">Harga / hari</label>
                                        <input type="number" class="form-control" id="editHarga" name="harga" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select" name="status" id="editStatus" required>
                                            <option value=""> == Pilih Status == </option>
                                            <option value="Sedia">Sedia</option>
                                            <option value="Kosong">Kosong</option>
                                            <option value="Sedang Diperbaiki">Sedang Diperbaiki</option>
                                        </select>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-2">Simpan</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.btn-edit').forEach(button => {
        button.addEventListener('click', function () {
            // Isi data ke form edit
            document.getElementById('editId').value = this.dataset.id;
            document.getElementById('gambarLama').value = this.dataset.gambarLama;
            document.getElementById('editNama').value = this.dataset.nama;
            document.getElementById('editTipe').value = this.dataset.tipe;
            document.getElementById('editHarga').value = this.dataset.harga.replace(/\D/g, ''); 
            document.getElementById('editStatus').value = this.dataset.status;

            // Preview gambar
            const gambarPath = this.dataset.gambar ? `uploads/${this.dataset.gambar}` : '';
            const gambarPreview = document.getElementById('editGambarPreview');
            gambarPreview.src = gambarPath;
            gambarPreview.style.display = gambarPath ? 'block' : 'none';

            // Tampilkan modal edit
            new bootstrap.Modal(document.getElementById('editModal')).show();
        });
    });

    </script>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>