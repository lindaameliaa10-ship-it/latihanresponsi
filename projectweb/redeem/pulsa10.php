<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PULSA 10.000</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/form.css">
</head>

<body class="p-4">

    <h1>Pulsa 10.000</h1>

    <form action="../landingpoin.php?id=5"
     method="POST">
        <div class="mb-3">
            <label class="form-label">Nomor</label>
            <input type="number" class="form-control" name="nomor" placeholder="Masukkan nomor yang akan diisi pulsa" required>
        </div>

        <button type="submit" class="btn btn-success">Redeem</button>
    </form>

</body>
</html>