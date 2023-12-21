<?php include "koneksi.php";
    include "cekadminlogin.php";
  ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Toko Catur Pawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="img/logo/logo.PNG" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="pt-5 pb-5 bg-light "
    style="background-image: url('img/bg/bg3.jpg'); 
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;">
    <?php include "navbar.php"; ?>
    <br/>
   
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 col-11 mx-auto col-lg-10 mt-2 g-3 d-flex justify-content-evenly">
    <div class="col-sm-6">
        <div class="card" 
        style="background-image: url('img/bg/.jpeg'); ">
        <div class="card-body">
            <h5 class="card-title">Kategori</h5>
            <p class="card-text">Kelola data kategori</p>
            <a href="kategory.php" class="btn btn-primary">Masuk</a>
        </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
        <div class="card-body">
            <h5 class="card-title">Pemasok</h5>
            <p class="card-text">Kelola Data Pemasok</p>
            <a href="pemasok.php" class="btn btn-primary">Masuk</a>
        </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
        <div class="card-body">
            <h5 class="card-title">Produk</h5>
            <p class="card-text">Kelola Data Produk</p>
            <a href="produk.php" class="btn btn-primary">Masuk</a>
        </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
        <div class="card-body">
            <h5 class="card-title">Pelanggan</h5>
            <p class="card-text">Kelola Data Pelanggan</p>
            <a href="pelanggan.php" class="btn btn-primary">Masuk</a>
        </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
        <div class="card-body">
            <h5 class="card-title">Pesanan</h5>
            <p class="card-text">Kelola Data Pesanan</p>
            <a href="pesananadmin.php" class="btn btn-primary">Masuk</a>
        </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
        <div class="card-body">
            <h5 class="card-title">Laporan</h5>
            <p class="card-text">Cetak Laporan</p>
            <a href="laporan.php" class="btn btn-primary">Masuk</a>
        </div>
        </div>
    </div>
    </div>
    </div>
    <footer class="fixed-bottom d-flex shadow-1 justify-content-center container" style="background-color:#18C0FC;">
		</br>
        <p style="color:#FFFFFF;">Toko Catur Pawan <i class="bi bi-c-circle"></i> 2023</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>
    <div class="col-lg-3 col-sm-6 col-12 d-flex">

</body>

</html>