<?php
include "konek/koneksi.php";
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

// VALIDASI ID
if (!isset($_GET['id'])) {
    header("Location: tukar.php");
    exit;
}

$id_hadiah = $_GET['id'];
$email = $_SESSION['email'];

// ambil hadiah
$qHadiah = mysqli_query($conn, "SELECT * FROM hadiah WHERE id_hadiah='$id_hadiah'");
$hadiah = mysqli_fetch_assoc($qHadiah);

if (!$hadiah) {
    die("Hadiah tidak ditemukan");
}

$nama_hadiah = $hadiah['nama_hadiah'];
$poin_hadiah = $hadiah['poin'];

// ambil user TERBARU
$qUser = mysqli_query($conn, "SELECT total FROM user WHERE email='$email'");
$user = mysqli_fetch_assoc($qUser);

$poin_user = $user['total']; // sisa poin terbaru
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Redeem Berhasil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/landing.css">
</head>
<body>

<div class="landing">
    <h2>Selamat!</h2>
    <p>Kamu berhasil menukarkan <b><?php echo $nama_hadiah; ?></b></p>
    <p>Poin berhasil dipotong: <b><?php echo $poin_hadiah; ?></b></p>
    <p>Sisa poin kamu: <b><?php echo $poin_user - $poin_hadiah; ?></b></p>

    <a href="tukar.php" class="btn btn-secondary">Mau Tukar Lagi</a>
    <a href="home.php" class="btn btn-secondary">Kembali ke Home</a>
</div>

</body>
</html>