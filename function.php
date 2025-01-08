<?php
// Nama file: [function.php]
// Deskripsi: [Berfungsi untuk menghubungkan database user dan menyimpan function untuk proses login dan daftar]
// Dibuat Oleh: [Muhammad Danial] - NIM [3312401042]
// Tanggal: 18 November 2024 

$host = "localhost"; 	 
$user = "root"; 	 
$pass = ""; 	 
$db = "easyride"; //Nama Database 

// melakukan koneksi ke database 	 
$koneksi = mysqli_connect($host, $user, $pass, $db); 

if(!$koneksi){ 	 
    echo "Gagal koneksi: " . die(mysqli_connect_error($koneksi));
}

// Registrasi   
if(isset($_POST['register'])){
    // Jika tombol register di klik
    $userName = strtolower(stripslashes($_POST['userName'])) ;
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $tglLahir = $_POST['tglLahir'];
    $noTelepon = $_POST['noTelepon'];
    $role = "user";

    // Cek konfirmasi katasandi
    if ($confirm !== $password) {
        echo "<script>
            alert ('Konfirmasi katasandi tidak sesuai');
            window.location.href = 'daftar.php';
        </script>";
        exit;
    }

    // Cek username sudah ada atau belum
    $insert = mysqli_query($koneksi, "SELECT user_name FROM user WHERE user_name = '$userName' ");
        if (mysqli_fetch_assoc($insert)) {
            echo "<script>
            alert ('Nama pengguna sudah terdaftar');
            window.location.href = 'daftar.php';
                </script>";
            exit;
        }

    // Engkripsi Password
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Tambahkan data pengguna ke database
    $insert = mysqli_query($koneksi, "INSERT INTO user (user_name, email, password,tgl_lahir, no_telepon, role)
    VALUES ('$userName', '$email', '$passwordHash', '$tglLahir', '$noTelepon', '$role')") 
    or die(mysqli_error($koneksi));
    // Redirect halaaman
    if ($insert) {
        echo "<script>
            alert('Pendaftaran berhasil');
            window.location.href = 'login.php';
            </script>";
    } else {
        echo "<script>
            alert('Registrasi Gagal');
            window.location.href = 'daftar.php';
        </script>";
    }
}

// Login
if (isset ($_POST["login"])){
    // Jika tombol login diklik

    $userName = $_POST["userName"];
    $password = $_POST["password"];

    // Cek database username
    $cekdb = mysqli_query($koneksi, "SELECT * FROM user WHERE user_name = '$userName'");

    // Cek username 
    if (mysqli_num_rows($cekdb) === 1 ){
        // cek password
        $data = mysqli_fetch_assoc($cekdb);
        if (password_verify($password, $data["password"])){
            // Set session
            $_SESSION["role"] = $data["role"];
            $_SESSION["userName"] = $data["user_name"];


            // Redirect halaman
            if ($data["role"] === "admin") {
            echo 
                "<script>
                    alert('Login Berhasil');
                    window.location.href = 'dashboard/index.php';
                </script>";
            } else if ($data["role"] === "user") {
            echo 
                "<script>
                    alert('Login Berhasil');
                    window.location.href = 'index.php';
                </script>";
            }
            exit;
        }
    }
    $error = true;
}
?>

<?php 
// Fungsi mengirim data hubungi kami
if(isset($_POST['kirim'])){
    // Jika tombol register di klik
    $namaPengguna = strtolower(stripslashes($_POST['namaPengguna'])) ;
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $subjek = $_POST['subjek'];
    $pesan = $_POST['pesan'];
    // Tambahkan data pengguna ke database
    $insert = mysqli_query($koneksi, "INSERT INTO masukan (user_name, email, subjek, pesan)
    VALUES ('$namaPengguna', '$email', '$subjek', '$pesan')") 
    or die(mysqli_error($koneksi));
    // Redirect halaman
    if ($insert) {
        echo "<script>
            alert('Data berhasil dikirm');
            window.location.href = 'index.php';
            </script>";
    } else {
        echo "<script>
            alert('Data gagal dikirim');
            window.location.href = 'index.php';
        </script>";
    }
}
?>
