    <?php 
    // Nama file: [detail_produk.php]
    // Deskripsi: [Berfungsi untuk menampilkan data halaman detail produk untuk mengecek ketersediaan melalui inputan tanggal sewa ]
    // Dibuat Oleh: [Muhammad Danial] - [3312401042]
    // Tanggal: 23 Desember 2024
    
    session_start();
    require "function.php";
    

    if (!isset($_SESSION["role"])) {
        header("Location: login.php");
        exit;
    // Set logika tanggal
    } else {
        $tglnow   = date('Y-m-d');
        $tglmulai = strtotime($tglnow);
        $jmlhari  = 86400 * 1;
        $tglplus  = $tglmulai + $jmlhari;
        $now      = date("Y-m-d", $tglplus);

        // Kirim data ketika tombol pesan diklik
        if(isset($_POST['pesan'])){
            $harga = $_POST['harga'];
            $tglSewa = $_POST['tglSewa'];
            $tglKembali = $_POST['tglKembali'];
            $idKendaraan = $_POST['idKendaraan'];
            $pickup = $_POST['pickup'];

        // Cek tanggal kendaraan apakah ada yang sewa atau tidak
        $sql	= "SELECT kode_pesanan FROM cek_pesanan WHERE tgl_pesanan between '$tglSewa' AND '$tglKembali' AND id_kendaraan='$idKendaraan' AND status NOT IN ('Dibatalkan', 'Selesai')";
        $query 	= mysqli_query($koneksi, $sql);
        if (mysqli_num_rows($query) > 0){
                echo " <script> alert ('Kendaraan tidak tersedia di tanggal yang anda pilih, silahkan pilih tanggal lain!'); 
                </script> ";
        }else{
            echo "<script type='text/javascript'> document.location = 'detail_sewa.php?id_kendaraan=$idKendaraan&harga=$harga&mulai=$tglSewa&selesai=$tglKembali&pickup=$pickup'; </script>";
        }
    }
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Easyride | Produk</title>
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
        <nav class="navbar navbar-expand-lg fixed-top bg-body-tertiary shadow-lg">
        <div class="container-fluid fw-bold">
            <a class="navbar-brand" href="#">
            <img src="asset/easyride.png" alt="Logo" width="50" class="d-inline-block align-text-center" />
            easyRide
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
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
                        <a class="nav-link" aria-current="page" href="index.php#home">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#tentang">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="produk.php">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#hubungiKami">Hubungi Kami</a>
                    </li>
                </ul>
                <ul class="nav align-items-center">
                    <?php if (!isset($_SESSION["role"])) { ?>
                        <li class="nav-item">
                            <a href="login.php"><button class="btn btn-primary" type="submit">Masuk / Daftar</button></a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item dropdown pe-3">
                                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                                <button
                                    class="btn btn-primary dropdown-toggle w-100"
                                    type="button"
                                    id="userMenu"
                                >
                                Hai, <?php echo htmlspecialchars($_SESSION['userName']); ?>
                            </button>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="user/index.php?user_name=<?= ($_SESSION['userName']) ?>">Profil Saya</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="user/riwayat.php?user_name=<?= ($_SESSION['userName']) ?>">Riwayat Pesanan</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="logout.php">
                                        <span>Keluar</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

        <?php 
        // Ambil data produk berdasarkan produk yang diklik
        $nama = htmlspecialchars($_GET['nama']);
        $idKendaraan = $_GET['id_kendaraan'];
        $queryProduk = mysqli_query($koneksi, "SELECT * FROM kendaraan WHERE nama_kendaraan = '$nama'");
        $produk = mysqli_fetch_array($queryProduk);
        ?>

        <script type="text/javascript">
        function valid()
{
            if(document.sewa.tglKembali.value < document.sewa.tglSewa.value){
                alert("Tanggal kembali harus sebelum dari tanggal mulai sewa!");
                return false;
            }
            if(document.sewa.tglSewa.value < document.sewa.now.value){
                alert("Tanggal sewa minimal H-1!");
                return false;
            }

        return true;
        }
        </script>
        
        <!-- Detail Produk -->
        <div class="container-fluid py-5 mt-5">
             <a href="javascript:history.back()" class="btn btn-primary mx-3 mb-3">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <div class="container">
                <div class="row justify-content-center">
                <h2 class="text-center fw-bold mb-4">Detail Kendaraan</h2>
                    <div class="col-lg-10">
                        <div class="card shadow-lg border-0">
                            <div class="row g-0">
                            <?php foreach($queryProduk as $data) : ?>
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
                            <?php endforeach; ?>
                                        <form method="POST" name="sewa" onSubmit="return valid();">
                                        <input type="hidden" class="form-control" name="idKendaraan"  value="<?= $data['id'];?>"required>
                                        <input type="hidden" class="form-control" name="harga"  value="<?= $data['harga_per_hari'];?>"required>
                                            <div class="mb-3">
                                                <label for="tglSewa" class="form-label">Tanggal Sewa</label>
                                                <input type="date" name="tglSewa" class="form-control" placeholder="Masukkan tanggal sewa" required>
                                                <input type="hidden" name="now" class="form-control" value="<?= $now;?>">
                                            </div>
                                            <div class="mb-4">
                                                <label for="tglKembali" class="form-label">Tanggal Kembali</label>
                                                <input type="date" name="tglKembali" class="form-control" placeholder="Masukkan tanggal kembali" required>
                                            </div>
                                            <div class="mb-4">
                                            <label for="pickup">Metode Pickup</label><br/>
                                                <select class="form-control" name="pickup" required>
                                                    <option value="">== Pilih Metode Pickup ==</option>
                                                    <option value="Ambil Sendiri">Ambil Sendiri</option>
                                                    <option value="Pickup Sesuai Alamat">Pickup Sesuai Alamat</option>
                                                </select>
                                            </div>
                                                <button type="submit" class="btn btn-primary" name="pesan">
                                                    <i class="fas fa-paper-plane"></i> Pesan Sekarang
                                                </button>
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
        
        <!-- Produk terkait -->
        <div class="container-fluid py-3" style="background-color: #1f2a44 ;">
            <div class="container">
                <h3 class="text-center text-white mb-3">Produk Terkait</h3>
                <div class="row">
                    <?php 
                    $queryProdukTerkait = mysqli_query($koneksi, "SELECT * FROM kendaraan WHERE tipe_kendaraan = '$produk[tipe_kendaraan]' 
                    AND nama_kendaraan != '$produk[nama_kendaraan]'
                    LIMIT 4");
                    foreach($queryProdukTerkait as $data) :
                    ?>
                    <div class="col-md-6 col-lg-3 mb-3">
                        <a href="detail_produk.php?nama=<?= $data['nama_kendaraan']; ?>">
                            <img src="dashboard/uploads/<?= $data['gambar'];?>" alt="<?= $data['nama_kendaraan'];?>" class="img-fluid img-thumbnail produk-terkait">
                        </a>
                    </div>
                    <?php endforeach ; ?>
                </div>
            </div>
        </div>

        <!-- Bootsrap JS -->
        <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
<?php } ?>