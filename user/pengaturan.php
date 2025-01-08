<!-- Nama File : pengaturan.php -->
<!-- Deskripsi : Halaman untuk mengganti katasandi akun -->
<!-- Pembuat : Muhammad Arthur Putra Guntur NIM 3312401051
                Muhammad Danial NIM 3312401042  -->
<!-- Tanggal : 21 Nov 2024-->

<?php 
session_start();

if (!isset($_SESSION["role"])) {
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
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Akun</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap"
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
        .offcanvas {
            background-color: #1f2a44 !important;
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
            <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasSidebar" aria-labelledby="offcanvasSidebarLabel">
                <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasSidebarLabel">Menu</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                <div class="text-center mt-4">
                <img src="../dashboard/uploads/profil/<?= $data['foto'] ?: 'no_profile.png' ?>" class="profile-picture img-fluid mb-2" alt="Profile Picture" />
                    <p class="fw-bold mt-4">@<?= $_SESSION['userName']; ?></p>
                </div>
                <nav class="nav flex-column mt-4 text-center">
                    <a href="index.php?user_name=<?= $_SESSION['userName']; ?>" class="nav-link text-white">Profil</a>
                    <a href="riwayat.php?user_name=<?= $_SESSION['userName']; ?>" class="nav-link text-white">Riwayat Pesanan</a>
                    <a href="pengaturan.php?user_name=<?= $_SESSION['userName']; ?>" class="nav-link active text-white">Pengaturan</a>
                    <a href="../logout.php" class="nav-link text-white mt-5">Ganti Akun</a>
                </nav>
                </div>
            </div>

            <!-- Sidebar untuk desktop -->
            <nav class="col-md-3 col-lg-2 d-none d-md-block bg-dark text-white sidebar py-3" id="sidebar">
                <div class="d-flex align-items-center mt-3">
                <a class="navbar-brand" href="../index.php"><i class="fa-solid fa-house"></i></a>
                    <img src="../asset/easyride.png" alt="Logo" width="50" class="d-inline-block align-text-center" />
                    <h4>Easyride</h4>
                </div>
                <div class="text-center mt-4">
                <img src="../dashboard/uploads/profil/<?= $data['foto'] ?: 'no_profile.png' ?>" class="profile-picture img-fluid mb-2" alt="Profile Picture" />
                <p class="fw-bold mt-4">@<?= $_SESSION['userName']; ?></p>
                </div>
                <nav class="nav flex-column mt-4">
                <a href="index.php?user_name=<?= $_SESSION['userName']; ?>" class="nav-link text-white">Profil</a>
                <a href="riwayat.php?user_name=<?= $_SESSION['userName']; ?>" class="nav-link text-white">Riwayat Pesanan</a>
                <a href="pengaturan.php?user_name=<?= $_SESSION['userName']; ?>" class="nav-link active text-white">Pengaturan</a>
                <a href="../logout.php" class="nav-link text-white mt-5">Ganti Akun</a>
                </nav>
            </nav>
            
            <!-- Content -->
            <main class="col-md-12 col-lg-10 px-md-5 py-4">
                <h3 class="mb-4 fw-bold">Pengaturan Akun</h3>
                <div class="card p-4">
                    <p class="text-muted">Ubah kata sandi</p>
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?= htmlspecialchars($error); ?>
                        </div>
                    <?php elseif (isset($success)): ?>
                        <div class="alert alert-success" role="alert">
                            <?= htmlspecialchars($success); ?>
                        </div>
                    <?php endif; ?>
                    <form action="ubah_password.php" method="POST">
                        <div class="mb-3">
                            <label for="old-password" class="form-label fw-bold">Kata sandi lama</label>
                            <input type="password" name="old-password" class="form-control" id="old-password" placeholder="Masukkan kata sandi lama">
                        </div>
                        <div class="mb-3">
                            <label for="new-password" class="form-label fw-bold">Kata sandi baru</label>
                            <input type="password" name="new-password" class="form-control" id="new-password" placeholder="Masukkan kata sandi baru">
                        </div>
                        <div class="mb-3">
                            <label for="confirm-password" class="form-label fw-bold">Konfirmasi kata sandi baru</label>
                            <input type="password" name="confirm-password" class="form-control" id="confirm-password" placeholder="Masukkan kata sandi baru">
                        </div>
                        <div class="d-flex gap-3">
                            <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
                            <button type="reset" name="batal" class="btn btn-secondary">Batal</button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
