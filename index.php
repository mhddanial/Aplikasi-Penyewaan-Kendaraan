<?php 
    // Nama file: [index.php]
    // Deskripsi: [Halaman beranda yang berisi penjelasan singkat aplikasi dan produk yang ditawarkan ]
    // Dibuat Oleh: [Lidya Nur Raudhatul JPR] - NIM [3312401046] [Muhammad Arthur Putra G] - NIM[3312401051] [Muhammad Danial] - [3312401042]
    // Tanggal: 07 November 2024 

  session_start();
  require "function.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Easyride</title>
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
  </head>
  <style>
    body {
  color: #f5f5f5;
  font-family: "Poppins";
  color: #181717;
}

.card {
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  border-radius: 10px;
}
.card-img-top {
  max-height: 150px;
  object-fit: cover;
}

/* Navbar item hover */
@media screen and (min-width: 992px) {
  .navbar {
    padding: 0;
  }
  .navbar .navbar-nav .nav-link {
    padding: 1em 1em;
  }
  .navbar .navbar-nav .nav-item {
    margin: 0 1em;
  }
  .navbar .navbar-nav .nav-item {
    position: relative;
  }
  .navbar .navbar-nav .nav-item::after {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    margin: 0 auto;
    content: "";
    background-color: #007aff;
    color: #181717;
    width: 0%;
    height: 3px;
    transition: all 0.3s;
  }
  .navbar .navbar-nav .nav-item:hover::after {
    width: 100%;
  }
}

.carousel-inner {
  height: 42em; /* Set the height of the carousel */
}

.carousel-item img {
  object-fit: cover; /* Ensure images cover the area, maintaining aspect ratio */
  width: 100%; /* Make images fill the container width */
  height: 100%; /* Make images fill the container height */
}

  </style>
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
                      <a class="nav-link active" aria-current="page" href="#home">Beranda</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#tentang">Tentang</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="produk.php">Produk</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#hubungiKami">Hubungi Kami</a>
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
    <section class="bsb-hero-1 px-5 mt-5 bsb-overlay img-fluid" style="background-image: url('asset/hero.jpg'); height: 46rem">
        <div class="row justify-content-md-center">
          <div class="col-12 col-md-11 col-lg-9 col-xl-7 col-xxl-6 text-center text-white">
            <h2 class="display-3 fw-bold mb-3">Selamat datang di easyride</h2>
            <p class="lead mb-5">Sewa berbagai jenis kendaraan sesuai kebutuhan anda dengan cepat, aman, nyaman, dan terpercaya kapan saja dan dimana saja!</p>
            <div class="d-grid d-sm-flex justify-content-sm-center">
              <a href="produk.php"><button type="button" class="btn bsb-btn-xl btn-primary gap-3">Sewa Sekarang</button></a>
            </div>
          </div>
        </div>
    </section>
    <!-- Hero Section End -->
    
    <div class="container mt-5">
    <!-- Tentang Section Start -->
    <section id="tentang" class="py-4 py-md-5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-10 text-center">
            <h2 class="fw-bold text-shadow-head mb-4">Tentang Aplikasi</h2>
          </div>
        </div>
        <div class="row align-items-center">
          <!-- Bagian Tulisan -->
          <div class="col-md-7 mb-4 mb-md-0">
            <p class=" fs-5 text-center" style="line-height: 2;">
              <strong>EasyRide</strong> adalah aplikasi penyewaan kendaraan berbasis website yang dibuat oleh 5 Mahasiswa Semester 1 Prodi Informatika dalam Project Based Learning. 
              Aplikasi penyewaan kendaraan kami hadir untuk memudahkan Anda dalam mencari dan memesan kendaraan yang sesuai dengan kebutuhan Anda. 
              Kami menyediakan berbagai pilihan kendaraan, mulai dari mobil keluarga, mobil mewah, motor, dan juga sepeda, sehingga Anda dapat menghemat waktu dan juga biaya untuk mendatangi tempat secara langsung.
            </p>
          </div>
          <!-- Bagian Gambar -->
          <div class="col-md-5">
            <img src="asset/logo_tentang.png" alt="Tentang EasyRide" class="img-fluid w-200">
          </div>
        </div>
      </div>
    </section>
      <!-- Product -->
      <section id="produk">
        <h2 class="my-5 fw-bold text-center">Produk Kami</h2>
        <div class="row justify-content-center">
          <?php
            $kendaraan = mysqli_query($koneksi, "SELECT * FROM kendaraan LIMIT 6");
            foreach($kendaraan as $data) :
          ?>
            <div class="col-md-4 mb-3 d-flex">
              <div class="card w-100">
                <img src="dashboard/uploads/<?= $data['gambar']; ?> " class="card-img-top" alt="<?= $data['nama_kendaraan']; ?>">
                <div class="card-body">
                  <h5 class="card-title"><?= $data['nama_kendaraan']; ?></h5>
                  <p class="card-text"><?= "Rp. ". number_format($data['harga_per_hari']); ?></p>
                  <a href="detail_produk.php?nama=<?= $data['nama_kendaraan']; ?>" class="justify-content-center">
                    <button class="btn btn-primary">Cek</button>
                  </a>
                </div>
              </div>
            </div>
          <?php endforeach ; ?>
        </div>
        <div class="d-flex justify-content-center m-3">
          <a href="produk.php"class="justify-content-center">
            <button class="btn btn-primary">Lihat Selengkapnya</button>
          </a>
        </div>
      </section>
      <!-- Product end -->

      <!-- Section Hubungi Kami -->
      <section id="hubungiKami" class="text-center mb-5">
        <h3 class="my-5 fw-bold">Hubungi Kami</h3>
        <div class="row">
          <div class="col-lg-5 mb-3">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7978.111949800007!2d104.04575292893264!3d1.1200667108316316!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d98921856ddfab%3A0xf9d9fc65ca00c9d!2sPoliteknik%20Negeri%20Batam!5e0!3m2!1sid!2sid!4v1730603178955!5m2!1sid!2sid"
              class="img-fluid w-100 h-100"
              style="border: 0"
              allowfullscreen="yes"
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
          </div>
          <div class="col-lg-7">
            <form method="POST">
              <div class="row">
                <div class="col-md-9">
                  <div class="row mb-3">
                    <div class="col-md-6">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="namaPengguna" placeholder="Masukkan nama pengguna" required/>
                        <label for="namaPengguna">Nama pengguna</label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email" placeholder="name@example.com" required/>
                        <label for="email">Alamat Email</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-floating mb-4">
                    <input type="text" class="form-control" name="subjek" placeholder="Masukkan subjek" required/>
                    <label for="subjek">Subjek</label>
                  </div>
                  <div class="form-floating mb-4">
                    <textarea class="form-control" name="pesan" placeholder="Masukkan pesan disini" id="floatingTextarea" style="height: 100px" required></textarea>
                    <label for="pesan">Pesan</label>
                  </div>
                  <div class="text-center text-md-start">
                    <button type="submit" name="kirim" class="btn btn-primary mb-5 mb-md-0">Kirim</button>
                  </div>
                </div>
                <div class="col-md-3">
                  <ul class="list-unstyled">
                    <li class="pb-2">
                      <i class="fas fa-map-marker-alt fa-2x text-primary"></i>
                      <p><small>Batam, Kepulauan Riau</small></p>
                    </li>
                    <li class="pb-2">
                      <i class="fas fa-phone fa-2x text-primary"></i>
                      <p><small> 0778 3421 222</small></p>
                    </li>
                    <li class="pb-2">
                      <i class="fas fa-envelope fa-2x text-primary"></i>
                      <p><small>easyride@gmail.com</small></p>
                    </li>
                  </ul>
                </div>
              </div>
            </form>
          </div>
        </div>
      </section>
    </div>
    <!-- Hubungi Kami End -->

    <!-- Footer -->
    <?php include'footer.php' ?>

    <!-- Bootsrap JS -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
