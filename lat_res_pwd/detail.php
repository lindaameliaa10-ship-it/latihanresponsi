<?php
require "config/koneksi.php";

// ambil id dari URL
$id = $_GET['id'];

// query ambil data
$query = mysqli_query($koneksi, "SELECT * FROM assets WHERE id_asset = '$id'");
$data = mysqli_fetch_assoc($query);

// simpan ke variabel
$serial_number = $data['serial_number'];
$nama_alat     = $data['nama_alat'];
$merk          = $data['merk'];
$status        = $data['status'];
$stok          = $data['jumlah'];
$foto          = $data['url_gambar'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAMBAH PAGE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="css/home.css">
</head>

<body>
    <nav class="navbar bg-body-tertiary">
        <a class="navbar-brand" href="home.php">MAM</a>

    </nav>

    <div class="hero">
        <div class="opsi" style="margin: auto 250px;">
            <a href="home.php">
                <i class="fa-solid fa-angles-left"></i>
                Kembali ke Dashboard
            </a>
        </div>

        <div class="box-detail">
            <img src="<?= $foto; ?>" alt="foto asset" class="foto-asset">

            <div class="produk">
                <div class="nama">
                    <p>SERIAL NUMBER</p>
                    <h6><?= $serial_number; ?></h6>
                </div>
                <div class="st">
                    <button class="btn btn-success"><?= $status; ?></button>
                </div>
            </div>
            <div class="nama">
                <p>NAMA ASSET / MODEL</p>
                <h6 style="font-weight: bold;"><?= $nama_alat; ?></h6>
            </div>

            <p>Merk : <span class="merk"><?= $merk; ?></span></p>

            <hr>
            <div class="action">
                <div class="stok">
                    <p>Ketersediaan Stok</p>
                    <h6><?= $stok; ?></h6>
                </div>

                <a href="edit.php?id=<?= $id; ?>">
                    <button class="btn btn-dark">
                        <i class="fa-solid fa-pen-to-square"></i>
                        Edit Data
                    </button>
                </a>
            </div>



        </div>
    </div>
</body>

</html>