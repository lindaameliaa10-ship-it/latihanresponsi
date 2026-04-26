<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Wallet 20.000</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/form.css">
</head>

<body class="p-4">

    <h1>E-Wallet 20.000</h1>

    <form action="../landingpoin.php?id=7" method="POST">
        <div class="mb-3">
            <label class="form-label">Pilih E-wallet</label><br>
            <input type="checkbox" class="form-check-input" name="nama" value="dana"  >
            <label class="form-check-label">Dana</label> 
            <input type="checkbox" class="form-check-input" name="nama" value="ovo"  >
            <label class="form-check-label">OVO</label><br>
            <input type="checkbox" class="form-check-input" name="nama" value="linkaja"  >
            <label class="form-check-label">LinkAja</label> 
            <input type="checkbox" class="form-check-input" name="nama" value="shopee"  >
            <label class="form-check-label">Shopee</label><br>

            <br><br>
            <label class="form-label">Nomor</label>
            <input type="number" class="form-control" name="nomor" placeholder="Masukkan nomor yang akan diisi saldo" required>

        </div>

        <button type="submit" class="btn btn-success">Redeem</button>
    </form>

    <br>


</body>

</html>