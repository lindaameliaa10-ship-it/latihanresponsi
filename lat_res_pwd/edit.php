<?php
require "config/koneksi.php";

// cek apakah id ada
if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan!";
    exit;
}

$id = $_GET['id'];

// ambil data berdasarkan id
$query = mysqli_query($koneksi, "SELECT * FROM assets WHERE id_asset = '$id'");

// cek data ada atau tidak
if (mysqli_num_rows($query) == 0) {
    echo "Data tidak ditemukan!";
    exit;
}

$data = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {
    $id     = $_POST['id'];
    $serial = $_POST['seri'];
    $nama   = $_POST['nAlat'];
    $merk   = $_POST['merk'];
    $status = $_POST['status'];
    $jumlah = $_POST['jml'];

    $query = "UPDATE assets SET 
                serial_number = '$serial',
                nama_alat     = '$nama',
                merk          = '$merk',
                status        = '$status',
                jumlah        = '$jumlah'
              WHERE id_asset = '$id'";

    if (mysqli_query($koneksi, $query)) {
        $success = true;
    } else {
        echo "Gagal update: " . mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT PAGE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
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
                Batal & Kembali
            </a>
        </div>
        <div class="tittle">
            <div class="introo">
                <h1>Perbarui Informasi Asset</h1>
                <p>Lakukan perubahan pada detail perangkat untuk memastikan data inventaris tetap akurat.</p>
            </div>
        </div>

        <div class="box">
            <form action="" method="POST" class="formleft">
                <div class="mb-3">
                    <input type="hidden" name="id" value="<?= $data['id_asset']; ?>">

                    <label for="seri" class="form-label">Serial Number</label>
                    <input type="text" class="form-control" id="seri" name="seri" aria-describedby="emailHelp" value="<?= $data['serial_number']; ?>">

                    <label for="nAlat" class="form-label">Nama Alat</label>
                    <input type="text" class="form-control" id="nAlat" name="nAlat" aria-describedby="emailHelp" value="<?= $data['nama_alat']; ?>">

                    <label for="merk" class="form-label">Merk</label>
                    <input type="text" class="form-control" id="merk" name="merk" aria-describedby="emailHelp" value="<?= $data['merk']; ?>">

                    <label for="status" class="form-label">Status Saat Ini</label>
                    <select name="status" class="form-control">
                        <option value="Tersedia" <?= $data['status'] == 'Tersedia' ? 'selected' : ''; ?>>Tersedia</option>
                        <option value="Dipinjam" <?= $data['status'] == 'Dipinjam' ? 'selected' : ''; ?>>Dipinjam</option>
                        <option value="Rusak" <?= $data['status'] == 'Rusak' ? 'selected' : ''; ?>>Rusak</option>
                        <option value="Maintenance" <?= $data['status'] == 'Maintenance' ? 'selected' : ''; ?>>Maintenance</option>
                    </select>

                    <label for="jml" class="form-label">Jumlah Unit</label>
                    <input type="number" class="form-control" id="jml" name="jml" aria-describedby="emailHelp" value="<?= $data['jumlah']; ?>">

                    <label for="foto" class="form-label">Update URL Foto (Opsional)</label>
                    <div class="input-group">
                        <span class="input-icon">
                            <i class="fa-regular fa-image"></i>
                        </span>

                        <input type="text" class="form-control" id="foto" name="foto" placeholder="https://example.com/camera.jpg" required>
                    </div>

                    <button type="submit" class="update" name="update">
                        <i class="fa-solid fa-file-arrow-down"></i>
                        Simpan Perubahan Data
                    </button>
                </div>
            </form>

            <div class="info-section-right" style="border-left: 4px solid #5a0f0f;">
                <h5 class="fw-bold mb-3"><i class="fa-solid fa-pen"></i> Mode Penyuntingan</h5>
                <p class="text-muted small">Anda sedang mengubah data asset. Pastikan untuk:</p>

                <div class="asset-guide mb-3">
                    <div class="mb-2">
                        <i class="fa-solid fa-square-check"></i>
                        <p>Memverifikasi
                            <span style="font-weight: bold;">status terbaru</span>
                            (apakah alat baru aja kembali atau masuk servis).
                        </p>
                    </div>

                    <div class="mb-2">
                        <i class="fa-solid fa-square-check" style="color:maroon;"></i>
                        <p>Memastikan
                            <span style="font-weight: bold;">jumlah unit</span>
                            sudah sesuai dengan stok fisik di lemari penyimpanan.
                        </p>
                    </div>

                    <div class="mb-2">
                        <i class="fa-solid fa-square-check"></i>
                        <p>Memperbarui
                            <span style="font-weight: bold;">URL foto</span>
                            jika terdapat kerusakan fisik yang perlu di dokumentasikan.
                        </p>
                    </div>
                </div>

                <div class="info-alert">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <span>Perubahan ini akan langsung berdampak pada laporan ketersediaan alat di Dashboard.</span>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="successModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center p-4">

                <div class="modal-body">
                    <i class="fa-solid fa-circle-check" style="font-size:50px; color:maroon;"></i>
                    <h4 class="mt-3">Berhasil!</h4>
                    <p>Data berhasil diperbarui.</p>

                    <button class="btn btn-dark mt-2" onclick="window.location='home.php'">
                        Kembali ke Home
                    </button>
                </div>

            </div>
        </div>
    </div>
    <?php if (isset($success)): ?>
        <script>
            var myModal = new bootstrap.Modal(document.getElementById('successModal'));
            myModal.show();
        </script>
    <?php endif; ?>
</body>

</html>