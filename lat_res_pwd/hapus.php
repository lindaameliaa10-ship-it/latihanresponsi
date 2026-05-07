<?php
require "config/koneksi.php";

// cek apakah id ada di URL
if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan!";
    exit;
}

$id = $_GET['id'];

// keamanan dasar
$id = mysqli_real_escape_string($koneksi, $id);

// query hapus
$query = "DELETE FROM assets WHERE id_asset = '$id'";

$success = false;

if (mysqli_query($koneksi, $query)) {
    header("Location: home.php");
} else {
    $error = mysqli_error($koneksi);
}
?>