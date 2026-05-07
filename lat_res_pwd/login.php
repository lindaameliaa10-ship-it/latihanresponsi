<?php
session_start();
require "config/koneksi.php";

$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['usn'];
    $password = $_POST['pass'];

    $query = "SELECT * from users where username = '$username'";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);

    if ($data) {
        if ($password == $data['password']) {
            $_SESSION['user_id'] = $data['id_user'];
            $_SESSION['user_name'] = $data['username'];
            header("Location: home.php");
            exit;
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan, HARAP DAFTAR AKUN!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN PAGE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav class="content">
        <div class="kanan">
            <h1>MAM Systemt</h1>
            <br>
            <p>Portal Manajemen Kamera, Lensa, dan Perlengkapan Produksi</p>
        </div>

        <div class="kiri">
            <h1>MAM.</h1>
            <br><br>
            <h2>Selamat Datang</h2>
            <h6>Silakan masuk untuk mengelola aset multimedia.</h6>
            <br>

            <?php if (isset($_GET['logout']) && $_GET['logout'] == 'success'): ?>
                <div class="alert alert-danger" role="alert">
                    Berhasil keluar dari sistem!
                </div>
            <?php endif; ?>

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
                <button type="submit" class="btn btn-dark">Masuk Sekarang</button>
            </form>
            <p>
                Belum punya akun?
                <span>
                    <a href="register.php">Daftar Akun</a>
                </span>
            </p>
            <br><br>
            <div class="footer">
                <p>© 2026 Multimedia Lab Team - All rights reserved.</p>
            </div>
        </div>


    </nav>
</body>

</html>