<?php
include "../konek/koneksi.php";
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: ../login.php");
    exit;
}

$id_hadiah = $_GET['id'];
$email = $_SESSION['email'];

$queryHadiah = "SELECT * FROM hadiah WHERE id_hadiah = '$id_hadiah'";
$resultHadiah = mysqli_query($conn, $queryHadiah);
$hadiah = mysqli_fetch_assoc($resultHadiah);

if (!$hadiah) {
    die("Hadiah tidak ditemukan");
}

$poin_hadiah = $hadiah['poin'];
$nama_hadiah = $hadiah['nama_hadiah'];

// ambil user
$queryUser = "SELECT * FROM user WHERE email = '$email'";
$resultUser = mysqli_query($conn, $queryUser);
$user = mysqli_fetch_assoc($resultUser);

$poin_user = $user['total'];

// cek poin
if ($poin_user < $poin_hadiah) {
    echo "<script>alert('Poin tidak cukup'); window.location='../tukar.php';</script>";
    exit;
}

// potong poin
mysqli_query($conn,
    "UPDATE user SET total = total - $poin_hadiah WHERE email='$email'"
);

if ($nama_hadiah == "Pulsa 5000") {
    header("Location: ../redeem/pulsa5.php?id=$id_hadiah");
    exit;
} elseif ($nama_hadiah == "OVO 20.000") {
    header("Location: ../redeem/ovo.php?id=$id_hadiah");
    exit;
} elseif ($nama_hadiah == "Pulsa 10.000") {
    header("Location: ../redeem/pulsa10.php?id=$id_hadiah");
    exit;
} elseif ($nama_hadiah == "Paket data 10GB") {
    header("Location: ../redeem/paket_data.php?id=$id_hadiah");
    exit;
} elseif ($nama_hadiah == "E-Wallet 20.000") {
    header("Location: ../redeem/ewallet.php?id=$id_hadiah");
    exit;
} elseif ($nama_hadiah == "Voucher Gojek") {
    header("Location: ../redeem/gojek.php?id=$id_hadiah");
    exit;
}
 
?>
 