<!-- Nama File : edit_pesanan.php -->
<!-- Deskripsi : untuk mengedit data pesanan yang sudah dipesan sebelumnya -->
<!-- Pembuat :  Muhammad Danial NIM 3312401042 
-->
<!-- Tanggal : 25 Desember 2024 -->

<?php 
    session_start();
    if (!isset($_SESSION["role"]) ){
        header("Location: ../login.php");
        exit;
    }

    require "../function.php";
    $userName = $_SESSION['userName']; 
    $query = "SELECT * FROM user WHERE user_name = '$userName'";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pesanan</title>
    <!-- Bootsrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <!-- Google Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet"
        />
    <style>
        body {
        background-color: #f5f5f5;
        font-family: "Poppins", sans-serif;
        }
        #sidebar {
        background-color: #1f2a44 !important;
        height: 100vh;
        color: #fff;
        }
        .sidebar a {
        color: #c4c9d7;
        text-decoration: none;
        padding: 10px 15px;
        text-align: center;
        display: block;
        }
        .sidebar a:hover {
        background-color: #394764;
        color: #fff;
        }
        .sidebar .active {
        background-color: #2a3a5c;
        }
        .card {
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.5);
        }
        .profile-picture {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 50%;
        }

    </style>
    </head>
    <body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar Mobile -->
            <nav class="navbar navbar-dark bg-dark d-md-none" style="background-color: #1f2a44 !important;">
                <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="../index.php">
                    <img src="../asset/easyride.png" alt="Logo" width="30" class="d-inline-block align-text-top">
                    Easyride
                </a>
                </div>
            </nav>

            <!-- Sidebar offcanvas -->
            <div class="offcanvas offcanvas-start text-bg-dark" style="background-color: #1f2a44 !important;" tabindex="-1" id="offcanvasSidebar" aria-labelledby="offcanvasSidebarLabel">
                <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasSidebarLabel">Menu</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                <div class="text-center mt-4">
                <img src="../dashboard/uploads/profil/<?= $data['foto'] ?: 'no_profile.png' ?>" class="profile-picture img-fluid mb-2" alt="Profile Picture" />
                    <p class="fw-bold mt-4">@<?= $_SESSION['userName']; ?></p>
                </div>
                <nav class="nav flex-column mt-4">
                    <a href="index.php?user_name=<?= $_SESSION['userName']; ?>" class="nav-link text-white">Profil</a>
                    <a href="riwayat.php?user_name=<?= $_SESSION['userName']; ?>" class="nav-link active text-white">Riwayat Pesanan</a>
                    <a href="pengaturan.php?user_name=<?= $_SESSION['userName']; ?>" class="nav-link text-white">Pengaturan</a>
                    <a href="../logout.php" class="nav-link text-white mt-5">Ganti Akun</a>
                </nav>
                </div>
            </div>

            <!-- Sidebar untuk desktop -->
            <nav class="col-md-3 col-lg-2 d-none d-md-block text-white sidebar py-3" id="sidebar">
                <div class="d-flex align-items-center mt-3">
                <a class="navbar-brand" href="javascript:history.back()">
                    <i class="fa-solid fa-chevron-left"></i>
                </a>
                <img src="../asset/easyride.png" alt="Logo" width="50" class="d-inline-block align-text-center" />
                <h4>Easyride</h4>
                </div>
                <div class="text-center mt-4">
                <img src="../dashboard/uploads/profil/<?= $data['foto'] ?: 'no_profile.png' ?>" class="profile-picture img-fluid mb-2" alt="Profile Picture" />
                <p class="fw-bold mt-4">@<?= $_SESSION['userName']; ?></p>
                </div>
                <nav class="nav flex-column mt-4">
                <a href="index.php?user_name=<?= $_SESSION['userName']; ?>" class="nav-link text-white">Profil</a>
                <a href="riwayat.php?user_name=<?= $_SESSION['userName']; ?>" class="nav-link active text-white">Riwayat Pesanan</a>
                <a href="pengaturan.php?user_name=<?= $_SESSION['userName']; ?>" class="nav-link text-white">Pengaturan</a>
                <a href="../logout.php" class="nav-link text-white mt-5">Ganti Akun</a>
                </nav>
            </nav>

            <?php 
            $userName = $_SESSION['userName']; 
            $kode = $_GET['kode_pesanan'];
            $sql 	= "SELECT pesanan.*, kendaraan.*, user.* FROM pesanan, kendaraan, user 
                    WHERE pesanan.id_kendaraan=kendaraan.id AND pesanan.user_name=user.user_name and pesanan.kode_pesanan='$kode'";
            $query = mysqli_query($koneksi, $sql);
            $result = mysqli_fetch_array($query);
            $harga	= $result['harga_per_hari'];
            $durasi = $result['durasi'];
            $namaKendaraan = $result['nama_kendaraan'];
            $tipeKendaraan = $result['tipe_kendaraan'];
            $gambar = $result['gambar'];
            $pickup = $result['pickup'];
            $kode   = $result['kode_pesanan'];
            $tglMulai = strtotime($result['tgl_mulai']);
            $tglSewa = $result['tgl_mulai'];
            $tglSelesai = $result['tgl_selesai'];
            $totalKendaraan = $durasi * $harga;
            $totalSewa = $totalKendaraan;
            $jmlHari  = 86400 * 1; // 1 hari dalam detik
            $tgl	  = $tglMulai - $jmlHari;
            $tglHasil = date("Y-m-d", $tgl);

                if (!$query) {
                    die("Query failed: " . mysqli_error($koneksi));
                }
            ?>

            <!-- Main Content -->
            <main class="col-md-12 col-lg-10 px-md-5 py-4">
                <h3 class="mb-4 fw-bold">Detail Pesanan</h3>
                <div class="card p-4">
                    <h5 class="mb-3">Lakukan Pembayaran</h5>
                    <div class="row">
                        <!-- Image Section -->
                        <div class="col-md-6 mb-4">
                            <img src="../dashboard/uploads/<?= $gambar; ?>" alt="<?= $gambar ?>" 
                                class="img-fluid rounded w-100">
                        </div>
                        
                        <!-- Form Section -->
                        <div class="col-md-6">
                            <form action="update_pesanan.php" method="POST" name="editPesanan" enctype="multipart/form-data">
                                <input type="hidden" class="form-control" name="idKendaraan" value="<?= $idKendaraan; ?>" readonly>
                                <div class="row mb-3">
                                    <label for="kode" class="col-sm-4 col-form-label">Kode Pesanan</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="kode" class="form-control" value="<?= $kode; ?>" readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="namaKendaraan" class="col-sm-4 col-form-label">Nama Kendaraan</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="namaKendaraan" class="form-control" value="<?= $namaKendaraan; ?>" readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="tipeKendaraan" class="col-sm-4 col-form-label">Tipe Kendaraan</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="tipeKendaraan" class="form-control" value="<?= $tipeKendaraan; ?>" readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="tglSewa" class="col-sm-4 col-form-label">Tanggal Sewa</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="tglSewa" class="form-control" value="<?= $tglSewa; ?>" readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="tglSelesai" class="col-sm-4 col-form-label">Tanggal Kembali</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="tglSelesai" class="form-control" value="<?= $tglSelesai; ?>" readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="durasi" class="col-sm-4 col-form-label">Durasi</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="durasi" class="form-control" value="<?= $durasi; ?> Hari" readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="pickup" class="col-sm-4 col-form-label">Metode Pickup</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="pickup" value="<?= $pickup; ?>" readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="biayaKendaraan" class="col-sm-4 col-form-label">Biaya Kendaraan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="biayaKendaraan" value="Rp. <?= number_format($totalKendaraan); ?>" readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="total" class="col-sm-4 col-form-label">Total Bayar</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="total" class="form-control" value="Rp. <?= number_format($totalSewa) ?>" readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="bayar" class="col-sm-4 col-form-label">Upload Bukti Bayar</label>
                                    <div class="col-sm-8">
                                        <input type="file" class="form-control" name="bayar" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-12">
                                        <p class="fw-bold">*Silahkan transfer total biaya sewa ke no rekening 12345678 Bank BNI atas nama PT. EASYRIDE maksimal tanggal <?= $tglHasil; ?>.</p>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <button type="submit" name="Submit" class="btn btn-primary">Submit</button>
                                        <a href="batal_pesanan.php?kode=<?=$kode;?>">
                                            <button type="button" name="Cancel" class="btn btn-danger" 
                                            onclick="return confirm('Yakin ingin mmembatalkan pesanan ini?')">Batalkan Pesanan</button>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
