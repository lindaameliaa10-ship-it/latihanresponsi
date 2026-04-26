<?php
include "../konek/koneksi.php";

// ambil total poin dari tabel sampah
$query = "SELECT SUM(poin) AS total FROM sampah";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

$total = $data['total'];

// contoh: update ke user (misalnya user yang login)
$email = $_SESSION['email'];

// UPDATE lebih masuk akal daripada INSERT
$update = "UPDATE user SET total = '$total' WHERE email = '$email'";
mysqli_query($conn, $update);
$_SESSION['total'] = $total;
header("Location: ../tukar.php");
exit;
?>