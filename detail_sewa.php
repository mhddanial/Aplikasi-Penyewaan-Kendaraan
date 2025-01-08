<?php 
    // Nama file: [detail_sewa.php]
    // Deskripsi: [Halaman untuk menampilkan data produk yang tersedia dan siap untuk dipesan ]
    // Dibuat Oleh: [Muhammad Danial] - [3312401042]
    // Tanggal: 23 Desember 2024

session_start();
require "function.php";

if (!isset($_SESSION["role"])) {
    header("Location: ../login.php");
    exit;

} else {
    // Tangkap data buat dari form buat pesanan
    if (isset($_POST['buatPesanan'])) {
        // Validasi semua data
        $tglSewa = $_POST['tglSewa'] ?? null; 
        $tglKembali = $_POST['tglKembali'] ?? null;
        $durasi = $_POST['durasi'] ?? 0;
        $pickup = $_POST['pickup'] ?? '';
        $idKendaraan = $_POST['idKendaraan'] ?? '';
        $userName = $_POST['userName'] ?? '';
        $status = "Menunggu Pembayaran";
        $tgl = date('Y-m-d');

        // Cek apakah semua data terisi pada form pemesanan
        if ($tglSewa && $tglKembali && $durasi > 0 && $idKendaraan && $userName) {
            // Tambahkan data ke tabel pesanan
            $sql = "INSERT INTO pesanan (id_kendaraan, tgl_mulai, tgl_selesai, durasi, status, user_name, pickup, tgl_pesanan)
                    VALUES ('$idKendaraan', '$tglSewa', '$tglKembali', '$durasi', '$status', '$userName', '$pickup', '$tgl')";
            $query = mysqli_query($koneksi, $sql);

            if ($query) {
                // Ambil kode pesanan (ID yang baru saja dimasukkan)
                $kode = mysqli_insert_id($koneksi);

                // Loop to insert dates into `cek_pesanan`
                for ($cek = 0; $cek < $durasi; $cek++) {
                    $tglMulai = strtotime($tglSewa);
                    $jmlHari = 86400 * $cek; // 1 hari dalam detik
                    $tglHasil = date("Y-m-d", $tglMulai + $jmlHari);
                
                    // Periksa apakah data sudah ada
                    $checkQuery = "SELECT * FROM cek_pesanan WHERE id_kendaraan='$idKendaraan' AND tgl_pesanan='$tglHasil'";
                    $checkResult = mysqli_query($koneksi, $checkQuery);
                
                    if (mysqli_num_rows($checkResult) == 0) {
                        // Jika tidak ada, masukkan data baru
                        $queryInsert = "INSERT INTO cek_pesanan (kode_pesanan, id_kendaraan, tgl_pesanan, status)
                                        VALUES ('$kode', '$idKendaraan', '$tglHasil', '$status')";
                        mysqli_query($koneksi, $queryInsert);
                    }
                }                
                echo "<script> alert('Kendaraan berhasil disewa. Silahkan Lakukan pembayaran '); </script>";
                echo "<script type='text/javascript'> 
                        document.location = 'produk.php'; 
                        </script>";
            } else {
                echo "<script> alert('Ooops, terjadi kesalahan. Silahkan coba lagi.'); </script>";
            }
        } else {
            echo "<script> alert('Data tidak lengkap. Silakan lengkapi formulir.'); </script>";
        }
    }
}
?>


    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Easyride | Detail Sewa</title>
         <!-- Logo -->
        <link href="asset/easyride.png" rel="icon" type="image/png"/>
        <!-- Boostrap CSS -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <!-- Manual CSS -->
        <link rel="stylesheet" href="styles.css" />
        <!-- Heroes Component -->
        <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/heroes/hero-1/assets/css/hero-1.css">
        <!-- Font awesome icon -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
        <!-- Google fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet"
        />
        <style>
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .card-img-top {
            max-height: 150px;
            object-fit: cover;
        }
        .produk-terkait {
            height: 75%;
            width: 100%;
            object-fit: cover;
            object-position: center;
        }
        

        </style>
    </head>
    <body id="home">
        <!-- Navbar Start-->
        <nav class="navbar navbar-expand-lg fixed-top mb-5 bg-body-tertiary shadow-lg">
        <div class="container-fluid fw-bold">
            <a class="navbar-brand" href="#">
            <img src="asset/easyride.png" alt="Logo" width="50" class="d-inline-block align-text-center" />
            easyRide
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <a class="navbar-brand" href="#">
                <img src="asset/easyride.png" alt="Logo" width="30" class="d-inline-block align-text-center" />
                easyRide
                </a>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="produk.php">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php #hubungiKami">Hubungi Kami</a>
                </li>
                </ul>
                <?php if ( !isset($_SESSION["role"])) {?>
                <ul class="nav align-items-center">
                    <li class="nav-item">
                    <a href="login.php"><button class="btn btn-primary" type="submit">Masuk</button></a>
                    </li>
                </ul>
                <?php } else {?>
                    <ul class="nav align-items-center">
                        <li class="nav-item dropdown pe-3">
                            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                            <span class="d-none d-md-block dropdown-toggle ps-2">
                            <?php echo "Hai, " . htmlspecialchars($_SESSION["userName"]); ?>
                            </span>
                            </a><!-- End User Profile item -->

                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                                <li>
                                <?php if (isset($_SESSION['userName'])): ?>
                                    <a class="dropdown-item d-flex align-items-center" href="user/index.php?user_name=<?= ($_SESSION['userName']) ?>">Profil Saya</a>
                                <?php endif; ?>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                <?php if (isset($_SESSION['userName'])): ?>
                                    <a class="dropdown-item d-flex align-items-center" href="user/riwayat.php?user_name=<?= ($_SESSION['userName']) ?>">Riwayat Pesanan</a>
                                <?php endif; ?>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="logout.php">
                                    <span>Keluar</span>
                                    </a>
                                </li>
                            </ul><!-- End Profile Dropdown Items -->
                        </li><!-- End Profile Nav -->
                    </ul>
                <?php } ?>
            </div>
            </div>
        </div>
        </nav>
        <!-- Navbar End -->

        <?php 
        // Ambil data produk berdasarkan produk yang diklik
        $userName = $_SESSION['userName']; 
        $idKendaraan = $_GET['id_kendaraan'];
        $harga	= $_GET['harga'];
        $mulai = $_GET['mulai'];
        $selesai = $_GET['selesai'];
        $pickup = $_GET['pickup'];
        $start = new DateTime($mulai);
        $finish = new DateTime($selesai);
        $int = $start->diff($finish);
        $dur = $int->days;
        $durasi = $dur+1;

        // Ambil data kendaraan
        $queryProduk = mysqli_query($koneksi, "SELECT * FROM kendaraan WHERE id = '$idKendaraan'");
        $data = mysqli_fetch_array($queryProduk);
        $gambar = $data['gambar'];
        $totalKendaraan = $durasi * $harga;
        $totalSewa = $totalKendaraan;
        ?>
        <!-- Detail Produk -->
        <div class="container-fluid py-5 mt-5">
            <a href="javascript:history.back()" class="btn btn-primary mx-3 mb-3">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <div class="container">     
                <div class="row justify-content-center">
                <h2 class="text-center fw-bold mb-4">Detail Sewa</h2>
                    <div class="col-lg-10">
                        <div class="card shadow-lg border-0">
                            <div class="row g-0">
                                <!-- Product Image -->
                                <div class="col-md-6">
                                    <img src="dashboard/uploads/<?= $data['gambar'];?>" alt="<?= $data['nama_kendaraan'];?>" 
                                    class="img-fluid rounded-start w-100 px-3 py-4">
                                </div>
                                <!-- Product Details -->
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <h2 class="card-title"><?= $data['nama_kendaraan'] ?></h2>
                                        <h4 class="card-subtitle text-muted mb-4">Rp. <?= number_format($data['harga_per_hari']) ?> / hari</h4>
                                        <div class="d-flex align-items-center mb-4">
                                            <span class="badge bg-primary me-3 fs-6">Stok: <?= $data['status'] ?></span>
                                        </div>
                                        <form method="POST" name="sewa">
                                            <input type="hidden" class="form-control" name="idKendaraan"  value="<?= $idKendaraan;?>" readonly>
                                            <input type="hidden" class="form-control" name="userName"  value="<?= $userName;?>" readonly>
                                                <div class="mb-3">
                                                    <label for="tanggalSewa" class="form-label">Tanggal Sewa</label>
                                                    <input type="date" name="tglSewa" class="form-control" value="<?=$mulai; ?>" readonly>
                                                </div>
                                                <div class="mb-4">
                                                    <label for="tanggalKembali" class="form-label">Tanggal Kembali</label>
                                                    <input type="date" name="tglKembali" class="form-control" value="<?=$selesai;?>" readonly>
                                                </div>
                                                <div class="mb-4">
                                                    <label for="durasi" class="form-label">Durasi</label>
                                                    <input type="text" name="durasi" class="form-control" value="<?=$durasi;?> Hari" readonly>
                                                </div>
                                                <div class="mb-4">
                                                    <label for="pickup">Metode Pickup</label>
                                                    <input type="text" class="form-control" name="pickup" value="<?=$pickup;?>" readonly>
                                                </div>
                                                <div class="mb-4">
                                                    <label for="biayaKendaraan">Biaya Kendaraan (<?= $durasi;?> Hari)</label>
                                                    <input type="text" class="form-control" name="biayaKendaraan" value="Rp. <?=number_format($totalKendaraan);?>" readonly>
                                                </div>
                                                <div class="mb-4">
                                                    <label for="total" class="form-label">Total Biaya</label>
                                                    <input type="text" name="total" class="form-control" value="Rp. <?=number_format($totalSewa)?>" readonly>
                                                </div>
                                                <div class="d-flex">
                                                    <button type="submit" name="buatPesanan" class="btn btn-primary w-100">Buat Pesanan</button>
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
        <!-- Bootsrap JS -->
        <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
