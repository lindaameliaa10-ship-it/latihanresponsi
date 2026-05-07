<?php
session_start();
require "config/koneksi.php";

$username = $_SESSION['user_name'];
$query = "SELECT id_asset, serial_number, nama_alat, merk, status, jumlah FROM assets";
$result = mysqli_query($koneksi, $query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME PAGE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="css/home.css">
</head>

<body>
    <nav class="navbar bg-body-tertiary">
        <a class="navbar-brand" href="home.php">MAM</a>
        <div class="right">
            <p>
                <?= $username ?>
                <span>
                    <a href="logout.php">
                        <button type="button" class="btn btn-light">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            Logout
                        </button>
                    </a>
                </span>
            </p>
        </div>

    </nav>

    <div class="hero">
        <div class="tittle">
            <div class="intro">
                <h1>Inventaris Alat Multimedia</h1>
                <p>Kelola stok kamera, lensa, dan aksesoris studio.</p>
            </div>
            <div class="opsi">
                <a href="tambah.php">+ Tambah Alat</a>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <td>NO</td>
                    <td>SERIAL NUMBER</td>
                    <td>NAMA ALAT</td>
                    <td>MERK</td>
                    <td>STATUS</td>
                    <td>JUMLAH</td>
                    <td>AKSI</td>
                </tr>
            </thead>

            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= $row['id_asset']; ?></td>
                        <td style="font-weight: bold;"><?= $row['serial_number']; ?></td>
                        <td><?= $row['nama_alat']; ?></td>
                        <td><?= $row['merk']; ?></td>
                        <td class="st">
                            <span class="status <?= strtolower(trim($row['status'])); ?>">
                                <?= $row['status']; ?>
                            </span>
                        </td>
                        <td><?= $row['jumlah']; ?></td>
                        <td>
                            <ul>
                                <li>
                                    <a href="detail.php?id=<?= $row['id_asset']; ?>">
                                        <i class="fa-regular fa-eye"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="edit.php?id=<?= $row['id_asset']; ?>">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="hapus.php?id=<?= $row['id_asset']; ?>">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </li>
                            </ul>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>

        </table>
    </div>


</body>

</html>