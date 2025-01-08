<?php 
require "function.php";
// Nama file: [daftar.php]
// Deskripsi: [Berfungsi untuk menampilkan halaman daftar masuk untuk pengguna dan memasukkan akun ke aplikasi]
// Dibuat Oleh: [Lidya Nur Raudhatul JPR] - NIM [3312401046] [Muhammad Arthur Putra G] - NIM[3312401051] [Muhammad Danial] - [3312401042]
// Tanggal: 04 - 11 November 2024 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyRide | Daftar</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="asset/easyride.png" rel="icon" type="image/png" />
    <style>
        body {
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background: rgb(0,79,186);
            background: linear-gradient(90deg, rgba(0,79,186,1) 0%, rgba(0,36,84,1) 100%);
            font-family: "Poppins", sans-serif;
        }

        .form-container {
            background-color: white;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 50em;
        }

        @media (max-width: 768px) {
            .form-container {
                padding: 1.5rem;
                max-width: 90%;
            }

            h1 {
                font-size: 1.5rem;
            }

            .form-label {
                font-size: 0.9rem;
            }

            .btn {
                font-size: 0.9rem;
            }
        }

        @media (max-width: 576px) {
            .form-container {
                padding: 1rem;
            }

            h1 {
                font-size: 1.25rem;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1 class="fw-bold text-center mb-4">Buat Akun</h1>
        <form method="post" autocomplete="off">
            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label for="email" class="form-label fw-bold">Alamat Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan alamat email" required>
                </div>
                <div class="col-md-6">
                    <label for="userName" class="form-label fw-bold">Nama Pengguna</label>
                    <input type="text" name="userName" class="form-control" id="userName" placeholder="Nama pengguna" required>
                </div>
            </div>
            
            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label for="noTelepon" class="form-label fw-bold">Nomor HP</label>
                    <input type="number" name="noTelepon" class="form-control" id="noTelepon" placeholder="Masukkan nomor HP" required>
                </div>
                <div class="col-md-6">
                    <label for="date" class="form-label fw-bold">Tanggal Lahir</label>
                    <input type="date" name="tglLahir" class="form-control" id="date" required>
                </div>
            </div>
            
            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label for="password" class="form-label fw-bold">Kata sandi</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan kata sandi" required>
                </div>
                <div class="col-md-6">
                    <label for="confirm" class="form-label fw-bold">Konfirmasi Kata Sandi</label>
                    <input type="password" name="confirm" class="form-control" id="confirm" placeholder="Konfirmasi kata sandi" required>
                </div>
            </div>
            
            <div class="form-check my-3 d-flex justify-content-center">
                <input class="form-check-input me-2" type="checkbox" id="terms" required>
                <label class="form-check-label" for="terms">
                    Saya menyetujui Ketentuan Layanan dan Kebijakan Privasi yang berlaku
                </label>
            </div>
            <div class="form-check d-flex justify-content-center">
                <button type="submit" name="register" class="btn btn-primary w-50">Daftar</button>
            </div>
            <div class="text-center mt-3">
                Sudah punya akun? <a href="login.php">Silahkan masuk</a>
            </div>
        </form>
    </div>
    <!-- Bootstrap JS -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
