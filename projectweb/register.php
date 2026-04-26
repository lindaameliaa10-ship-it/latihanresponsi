<!-- register -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AYO REGISTRASI AKUN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <h1>DAFTAR AKUN</h1>
        <form action="proses/prosesregister.php" method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama lengkapmu">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan alamat email">
            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">Password</label>
                <input type="password" class="form-control" id="pass" name="pass" placeholder="Masukkan password">
            </div>
            <div class="mb-3">
                <label for="confirmpass" class="form-label">Konfirmasi Password</label>
                <input type="password" class="form-control" id="confirmpass" name="confirmpass" placeholder="Masukkan password yang sama">
            </div>
            <button type="submit" class="btn btn-success">DAFTAR</button>
            <button type="reset" class="btn btn-secondary">RESET</button>
        </form>
        <p>Sudah punya akun?
            <a href="login.php">Login</a>
        </p>
    </div>
</body>

</html>