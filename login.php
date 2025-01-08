<!-- 
Nama file: [login.php]
Deskripsi: [Halaman login untuk pengguna agar bisa masuk menggunakan akun yang telah dibuat]
Dibuat Oleh: [Lidya Nur Raudhatul JPR] - NIM [3312401046] [Muhammad Arthur Putra G] - NIM[3312401051] [Muhammad Danial] - [3312401042]
Tanggal: 04 November 2024  
-->

<?php 
session_start();

if (isset($_SESSION["login"]) ){
    header("Location: index.php");
    exit;
}

require "function.php"; 

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyRide | Login</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif; 
    }

    body, html {
        height: 100%;
    }
    
    body {
        background: rgb(0,79,186);
        background: linear-gradient(90deg, rgba(0,79,186,1) 0%, rgba(0,36,84,1) 100%);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .login-container {
        max-width: 800px;
        width: 100%;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .left-section {
        background-color: #D9D9D9;
        text-align: center;
        padding: 20px;
    }

    .left-section img {
        max-width: 100%;
        height: auto;
    }

    .right-section {
        padding: 30px;
    }

    @media (max-width: 768px) {
        .login-container {
            flex-direction: column; /* Stack sections vertically on smaller screens */
        }

        img {
            display: none;
        }

        .left-section {
            display: none; /* Hide left section on mobile */
        }

        .right-section {
            padding: 20px;
        }
    }

    </style>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="asset/easyride.png" rel="icon" type="image/png"/>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="row login-container shadow-lg">
            <div class="col-md-6 left-section justify-content-center align-items-center">
                <img src="asset/easyride.png" alt=logo class="img-fluid">
                <h2 class="fw-bold text-center">Nyari Kendaraan di <br><span style="color: #007AFF;">easyRide</span> aja</h2>
            </div>
            <div class="col-md-6 right-section p-5">
                <h2 class="fw-bold text-center mb-5">Selamat Datang di <span style="color: #007AFF;">easyRide</span></h2>
                <h5 class="fw-bold text-center">Masuk Untuk Melanjutkan</h5>
                <form method="post" class="pt-4">
                    <div class="mb-3">
                        <label for="username" class="form-label fw-bold">Nama Pengguna</label>
                        <input type="text" class="form-control" id="username" name= "userName" placeholder="Masukkan nama pengguna" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label fw-bold">Kata sandi</label>
                        <input type="password" class="form-control" id="password" name= "password" placeholder="Masukkan kata sandi" required>
                    </div>

                    <?php if (isset($error)) : ?>
                        <div class="alert alert-danger" role="alert">
                        Username atau password anda salah !!
                        </div>
                    <?php endif ; ?>

                    <button type="submit" name="login" class="btn btn-primary w-100 mb-3">Masuk</button>
                </form>
                    <p class="text-center">Belum punya akun ? <a href="daftar.php" class="text-decoration-none">Daftar sekarang</a></p>
            </div>
        </div>
    </div>
</body>
</html>