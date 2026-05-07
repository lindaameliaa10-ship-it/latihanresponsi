<?php
session_start();
require "config/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $seri   = $_POST['seri'];
    $nAlat  = $_POST['nAlat'];
    $merk   = $_POST['merk'];
    $status = $_POST['status'];
    $jml    = $_POST['jml'];
    $foto   = $_POST['foto'];

    $query_insert = "INSERT INTO assets (serial_number, nama_alat, merk, status, jumlah, url_gambar) 
                     VALUES ('$seri', '$nAlat', '$merk', '$status', '$jml', '$foto')";

    if (mysqli_query($koneksi, $query_insert)) {
        header("Location: home.php");
        exit;
    } else {
        $error = "Gagal menyimpan data! Ulangi!";
    }
}
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
        <div class="opsi">
            <a href="home.php">
                <i class="fa-solid fa-angles-left"></i>
                Kembali ke Dashboard
            </a>
        </div>
        <div class="tittle">
            <div class="introo">
                <h1>Registrasi Alat Multimedia</h1>
                <p>Tambahkan unit kamera, lensa, dan aksesoris ke dalam inventaris.</p>
            </div>
        </div>

        <div class="box">
            <?php if (!empty($error)): ?>
                <div class="alert alert-danger">
                    <?= $error; ?>
                </div>
            <?php endif; ?>
            <form action="" method="POST" class="formleft">
                <div class="mb-3">
                    <label for="seri" class="form-label">Serial Number</label>
                    <input type="text" class="form-control" id="seri" name="seri" aria-describedby="emailHelp" placeholder="Contoh: CAM-SONY-001" required>

                    <label for="nAlat" class="form-label">Nama Alat</label>
                    <input type="text" class="form-control" id="nAlat" name="nAlat" aria-describedby="emailHelp" placeholder="Contoh: Sony Alpha a7 III Mirrorless" required>

                    <label for="merk" class="form-label">Merk</label>
                    <input type="text" class="form-control" id="merk" name="merk" aria-describedby="emailHelp" placeholder="Contoh: Sony" required>

                    <label for="status" class="form-label">Status Awal</label>
                    <select name="status" class="form-control">
                        <option value="">Pilih Status</option>
                        <option value="Tersedia">Tersedia</option>
                        <option value="Dipinjam">Dipinjam</option>
                        <option value="Rusak">Rusak</option>
                        <option value="Maintenance">Maintenance</option>
                    </select>

                    <label for="jml" class="form-label">Jumlah Unit</label>
                    <input type="number" class="form-control" id="jml" name="jml" aria-describedby="emailHelp" placeholder="1" required>

                    <label for="foto" class="form-label">Link Foto Perangkat (URL)</label>
                    <div class="input-group">
                        <span class="input-icon">
                            <i class="fa-regular fa-image"></i>
                        </span>

                        <input type="text" class="form-control" id="foto" name="foto" placeholder="https://example.com/camera.jpg" required>
                    </div>
                    <p>Gunakan URL gambar dari Internet(Unsplash/Imgur) </p>

                    <button type="submit" class="simpan">
                        <i class="fa-solid fa-cloud-arrow-up"></i>
                        Simpan Alat Multimedia
                    </button>
                </div>
            </form>

            <div class="info-section-right" style="border-left: 4px solid #5a0f0f;">
                <h5 class="fw-bold mb-3"><i class="fa-solid fa-circle-info me-2"></i> Penomoran Asset</h5>
                <p class="text-muted small">Format Serial Number (SN) untuk peralatan multimedia lab:</p>

                <div class="asset-guide mb-3">
                    <div class="mb-2">
                        <span class="badge-code">CAM</span> <strong>Kamera (Body/Kit)</strong><br>
                        <input type="text" class="format-text" placeholder="CAM-[MERK]-[NOMOR]"><br>
                        <small class="text-muted">Contoh: SN-CAM-SONY-01</small>
                    </div>

                    <div class="mb-2">
                        <span class="badge-code">LNS</span> <strong>Lensa & Optik</strong><br>
                        <input type="text"class="format-text" placeholder="LNS-[MERK]-[JARAK]" > <br>
                        <small class="text-muted">Contoh: SN-LNS-CAN-50MM</small>
                    </div>

                    <div class="mb-2">
                        <span class="badge-code">DRN</span> <strong>Drone & Gimbal</strong><br>
                        <input type="text" class="format-text" placeholder="DRN-[MERK]-[NOMOR]" ><br>
                        <small class="text-muted">Contoh: SN-DRN-DJI-05</small>
                    </div>
                </div>

                <div class="info-alert">
                    <i class="fa-solid fa-lightbulb text-primary mt-1"></i>
                    <span>Pastikan SN unik untuk setiap unit agar pelacakan peminjaman lebih akurat.</span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>