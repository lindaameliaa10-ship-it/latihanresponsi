<?php
session_start();
require "config/koneksi.php";

$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['usn'];
    $password = $_POST['pass'];
    $confirmpass = $_POST['cpass'];

    if ($password == $confirmpass) {
        $query = "INSERT INTO users (username, password) VALUES ('$username', '$password') ";
        $result = mysqli_query($koneksi, $query);
        if($result){
            header("Location: login.php");
            exit;
        }else{
            $error = "Gagal registrasi! Coba lagi!";
        }
    } else {
        $error = "PASSWORD BELUM SAMA!";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER PAGE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav class="content">
        <div class="kiri">
            <h1>MAM.</h1>
            <br><br>
            <h2>Daftar Admin Baru</h2>
            <h6>Kelola stok kamera, lensa, dan perlengkapan produksi dengan mudah.</h6>
            <br>
            <?php if (!empty($error)): ?>
                <div class="alert alert-danger">
                    <?= $error; ?>
                </div>
            <?php endif; ?>
            <form method="POST">
                <div class="mb-3">
                    <label for="usn" class="form-label">Username Admin</label>
                    <input type="text" class="form-control" id="usn" name="usn" aria-describedby="emailHelp" placeholder="Masukkan Username" required>
                </div>
                <div class="mb-3">
                    <label for="pass" class="form-label">Password</label>
                    <input type="password" class="form-control" id="pass" name="pass" placeholder="Masukkan Password" required>
                </div>
                <div class="mb-3">
                    <label for="cpass" class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="cpass" name="cpass" placeholder="Masukkan Ulang Password" required>
                </div>
                <button type="submit" class="btn btn-dark">Buat Akun Sekarang</button>
            </form>
            <p>
                Sudah punya akun?
                <span>
                    <a href="login.php">Masuk disini</a>
                </span>
            </p>
            <br><br>
            <div class="footer">
                <p>© 2026 Multimedia Lab Team - All rights reserved.</p>
            </div>
        </div>

        <div class="kanan">
            <h1>Capture Every Asset</h1>
            <br>
            <p>Sistem Terpadu untuk Monitoring Kamera, Lensa, dan Peralatan Kreatif</p>
        </div>
    </nav>
</body>

</html>