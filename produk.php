<?php
    // Nama file: [produk.php]
    // Deskripsi: [Berfungsi untuk menampilkan produk kendaraan dan user dapat melakukan pencarian untuk menemukan kendaraan sesuai keinginan]
    // Dibuat Oleh: [Muhammad Danial] - [3312401042]
    // Tanggal: 22 Desember 2024
    
    session_start();
    require "function.php";
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>EasyRide | Produk</title>
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
    
        <!-- Hero Section Start -->
        <section class="bsb-hero-1 mt-5 px-5 bsb-overlay img-fluid" style="background-image: url('asset/hero.jpg');">
            <div class="row justify-content-md-center">
            <div class="col-12 col-md-11 col-lg-9 col-xl-7 col-xxl-6 text-center text-white">
                <h3 class="display-4 fw-bold mb-5">Cari Kendaraan Sesuai Kebutuhan Anda</h3>
                <div class="justify-content-sm-center">
                <form action="#listProduk" method="GET">
                    <div class="d-flex">
                        <input type="text" class="form-control" id="searchBar" placeholder="Cari Kendaraan" name="keyword" autocomplete="off" autofocus>
                        <button type="submit" class="btn btn-lg btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </section>
        <!-- Hero Section ENd -->

        <!-- Main Content -->
        <section class="produk" id="listProduk">
        <div class="container mt-5">
            <div class="row m-5">
                <div class="col-lg-3 mb-5">
                    <h3>Kategori</h3>
                    <ul class="list-group">
                        <a href="produk.php#listProduk" class="list-group-item list-group-item-action active" aria-current="true">
                            Semua Kendaraan
                        </a>
                        <a href="produk.php?kategori=Mobil #listProduk" class="list-group-item list-group-item-action">Mobil</a>
                        <a href="produk.php?kategori=Motor #listProduk" class="list-group-item list-group-item-action">Motor</a>
                        <a href="produk.php?kategori=Sepeda #listProduk" class="list-group-item list-group-item-action">Sepeda</a>
                    </ul>
                </div>
                <div class="col-lg-9">
                    <h3 class="text-center">List Kendaraan</h3>
                    <div class="row">
                    <?php 
                        // Mendapatkan produk dengan nama produk / keyword
                            if (isset($_GET['keyword'])) {
                                $keyword = $_GET['keyword'];
                                $queryKendaraan = mysqli_query($koneksi, "SELECT * FROM kendaraan
                                WHERE nama_kendaraan 
                                LIKE '%$keyword%'
                                OR tipe_kendaraan LIKE '%$keyword%'
                                OR harga_per_hari LIKE '%$keyword%'
                                OR status LIKE '%$keyword%'
                                ORDER BY id DESC 
                                ");
                            }
                            // Mendapatkan produk berdasarkan kategori
                            else if (isset($_GET['kategori'])) {
                                $kategori = $_GET['kategori'];
                                $queryKendaraan = mysqli_query($koneksi, "SELECT * FROM kendaraan WHERE tipe_kendaraan = '$kategori'");
                            
                            // Menampilkan semua kendaraan secara default jika tidak ada masukan
                            } else {
                                $queryKendaraan = mysqli_query($koneksi, "SELECT * FROM kendaraan ORDER BY id DESC");
                            }
                        $countData = mysqli_num_rows($queryKendaraan);
                        if ($countData < 1) {
                    ?>
                        <h4 class="text-center mt-5 text-secondary">Kendaraan yang anda cari tidak tersedia</h4>
                        <?php } ?> 
                        

                    <!-- Perulangan untuk menampilkan setiap data kendaraan -->
                    <?php foreach($queryKendaraan as $data) : ?>
                    
                        <div class="col-md-4 mb-3 d-flex">
                            <div class="card w-100">
                                <img src="dashboard/uploads/<?= $data['gambar']; ?> " class="card-img-top" alt="<?= $data['nama_kendaraan']; ?>">
                                <div class="card-body">
                                <h5 class="card-title"><?= $data['nama_kendaraan'] ?></h5>
                                        
                                <p class="card-text">Rp. <?= number_format($data['harga_per_hari']) ?> </p>
                                <a href="detail_produk.php?nama=<?= $data['nama_kendaraan'];?>&id_kendaraan=<?= $data['id']?>" class="btn btn-primary">Cek Detail</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <?php include'footer.php';?>
        </section>
        
        

        <!-- Bootsrap JS -->
        <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
