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
        .sidebar a {
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
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1)!important;
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
          <li class="nav-item mb-2"><a href="index.php" class="active text-white"><i class="fa-solid fa-grip me-2"></i>Dashboard</a>
          <li class="nav-item mb-2"><a href="data_kendaraan.php"><i class="fa-solid fa-car me-2"></i>Data Kendaraan</a></li>
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
              <li class="nav-item mb-2"><a href="#" class="active text-white"><i class="fa-solid fa-grip me-2"></i>Dashboard</a>
              <!-- Menu -->
              <li class="nav-item mb-2">
                <a href="data_kendaraan.php">
                  <i class="fa-solid fa-car me-2"></i>Data Kendaraan
                </a>
              </li>
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
            <h3>Hai Admin</h3>
              <p>Selamat datang di Dashboard anda</p>
          </div>
          <div class="row">
          <div class="col-md-4 mb-3">
            <div class="card p-2 shadow-sm border-0 text-center">
              <div class="card-body">
                <h5 class="card-title text-secondary fw-bold">Menunggu Pembayaran</h5>
                <h3 class="fw-bold text-primary fw-bold">
                  <?php 
                  require '../function.php';
                    $query = mysqli_query($koneksi, "SELECT COUNT(*) AS total_data FROM pesanan WHERE status='Menunggu Pembayaran'"); 
                    $data = mysqli_fetch_assoc($query);
                    echo $data["total_data"];
                  ?>
                </h3>
                <p class="text-muted">Pesanan belum dibayar</p>
                <a href="pesanan_bayar.php" class="text-decoration-none">
                  Lihat Data
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="card p-2 shadow-sm border-0 text-center">
              <div class="card-body">
                <h5 class="card-title text-secondary fw-bold">Menunggu Konfirmasi</h5>
                <h3 class="fw-bold text-primary">
                  <?php 
                    $query = mysqli_query($koneksi, "SELECT COUNT(*) AS total_data FROM pesanan WHERE status='Menunggu Konfirmasi'"); 
                    $data = mysqli_fetch_assoc($query);
                    echo $data["total_data"];
                  ?>
                </h3>
                <p class="text-muted">Pesanan yang belum dikonfirmasi</p>
                <a href="pesanan_konfir.php" class="text-decoration-none">
                  Lihat Data
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="card p-2 shadow-sm border-0 text-center">
              <div class="card-body">
                <h5 class="card-title text-secondary fw-bold">Belum Dikembalikan</h5>
                <h3 class="fw-bold text-primary">
                  <?php 
                    $query = mysqli_query($koneksi, "SELECT COUNT(*) AS total_data FROM pesanan WHERE status='Sudah Dibayar'"); 
                    $data = mysqli_fetch_assoc($query);
                    echo $data["total_data"];
                  ?>
                </h3>
                <p class="text-muted">Kendaraan yang belum dikembalikan</p>
                <a href="pengembalian.php" class="text-decoration-none">
                  Lihat Data
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="card p-2 shadow-sm border-0 text-center">
              <div class="card-body">
                <h5 class="card-title text-secondary fw-bold">Jumlah Kendaraan</h5>
                <h3 class="fw-bold text-primary">
                  <?php 
                    $query = mysqli_query($koneksi, "SELECT COUNT(*) AS total_data FROM kendaraan"); 
                    $data = mysqli_fetch_assoc($query);
                    echo $data["total_data"];
                  ?>
                </h3>
                <p class="text-muted">Total kendaraan yang tersedia</p>
                <a href="data_kendaraan.php" class="text-decoration-none">
                Lihat Data
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="card p-2 shadow-sm border-0 text-center">
              <div class="card-body">
                <h5 class="card-title text-secondary fw-bold">Total Pesanan</h5>
                <h3 class="fw-bold text-primary">
                  <?php 
                    $query = mysqli_query($koneksi, "SELECT COUNT(*) AS total_data FROM pesanan"); 
                    $data = mysqli_fetch_assoc($query);
                    echo $data["total_data"];
                  ?>
                </h3>
                <p class="text-muted">Total Pesanan yang masuk</p>
                <a href="data_pesanan.php" class="text-decoration-none">
                Lihat Data
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="card p-2 shadow-sm border-0 text-center">
              <div class="card-body">
                <h5 class="card-title text-secondary fw-bold">Data Pengguna</h5>
                <h3 class="fw-bold text-primary">
                  <?php 
                    $query = mysqli_query($koneksi, "SELECT COUNT(*) AS total_data FROM user WHERE role = 'user'"); 
                    $data = mysqli_fetch_assoc($query);
                    echo $data["total_data"];
                  ?>
                </h3>
                <p class="text-muted">Total pengguna terdaftar</p>
                <a href="data_pengguna.php" class="text-decoration-none">
                  Lihat Data
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="card p-2 shadow-sm border-0 text-center">
              <div class="card-body">
                <h5 class="card-title text-secondary fw-bold">Data Masukan</h5>
                <h3 class="fw-bold text-primary">
                  <?php 
                    $query = mysqli_query($koneksi, "SELECT COUNT(*) AS total_data FROM masukan"); 
                    $data = mysqli_fetch_assoc($query);
                    echo $data["total_data"];
                  ?>
                </h3>
                <p class="text-muted">Total masukan diterima</p>
                <a href="masukan.php" class="text-decoration-none">
                  Lihat Data
                </a>
              </div>
            </div>
          </div>
        </div>

        </main>
      </div>
  </div>
<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>