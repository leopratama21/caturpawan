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
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
</head>
<body class="pt-5 pb-5 bg-light "
    style="background-image: url('img/bg/bg3.jpg'); 
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;">
    <?php include "navbar.php"; ?>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-1 col-11 mx-auto col-lg-8 mt-2 g-4">
    
    <div class="col d-grid">
            <div class="card border">   
            <div class="card-body  d-grid align-content-start">

            <form action="printlaporan.php" method="POST" class="mb-2" target="_blank">
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label for="inputPassword6" class="col-form-label">Laporan</label>
                    </div>
                    <div class="col-auto">
                        <select name="j_laporan" class="form-control">
                            <option value="penjualan">Penjualan</option>
                            <option value="persediaan">Persediaan</option>
                        </select>
                    </div>
                    <div class="col-auto">
                        <select name="jenis" class="form-control">
                            <option value="har">Harian</option>
                            <option value="bul">Bulanan</option>
                            <option value="thn">Tahunan</option>
                        </select>
                    </div>
                    <div id="har" class="col-auto">
                        <input type="date" name="tgl" class="form-control">
                    </div>
                    <div class="col-auto">
                        <span id="passwordHelpInline" class="form-text">
                            <input type="submit" name="cetak_laporan_jual" class="btn btn-primary  ms-auto  btn-sm fs-6 fw-normal border-0" value="Print">
                        </span>
                    </div>
                </div>
            </form>

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
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        new DataTable('#table');
    </script>
</body>

</html>