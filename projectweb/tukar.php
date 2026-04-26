<?php
include "konek/koneksi.php";
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

$email = $_SESSION['email'];

// ambil data user
$qUser = "SELECT nama, total FROM user WHERE email = '$email'";
$rUser = mysqli_query($conn, $qUser);
$dataUser = mysqli_fetch_assoc($rUser);

$nama = $dataUser['nama'];
$total = $dataUser['total'];

// tampilkan hadiah
$query = "SELECT * FROM hadiah";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TUKAR POIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/tukar.css">
</head>

<body>
    <div class="jumlah">
        <h1>Jumlah poin <?= $nama ?> adalah <?= $total ?> poin</h1>
    </div>

    <div class="hadiah"> 
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="card mb-3" >
                <div class="card-body">
                    <h5 class="card-title"><?= $row['nama_hadiah'] ?></h5>
                    <h5 class="card-title">Poin <?= $row['poin'] ?></h5>
                    <a href="proses/prosesredeem.php?id=<?= $row['id_hadiah'] ?>" class="btn btn-primary">REDEEM NOW!</a>
                </div>
            </div>
        <?php } ?>

    </div>
</body>

</html>