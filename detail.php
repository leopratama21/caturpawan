<?php
    include "koneksi.php";
    include "cekuserlogin.php";
    if(isset($_GET['slug'])){
        $slug=$_GET['slug'];
        $cek=q("select * from produk where slug_produk='$slug'");
        if ($cek->num_rows<1) {
            header("location:index.php");
        }else{
            $cek=$cek->fetch_array();
        }
    }
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

<body class="pt-5 pb-5"
    style="background-image: url('img/bg/bg3.jpg'); 
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;">
    <?php include "navbar.php"; ?>
    <div class="row row-cols-1 col-11 mx-auto col-lg-8 mt-2 mt-4">
        <?php include "alert.php"; ?>
    </div>
    <div class="row row-cols-1 row-cols-lg-2 col-11 mx-auto col-lg-8">
        <div class="col col-lg d-grid align-content-center">
            <div class="card border-0">
                <div class="ratio ratio-1x1 bg-image card-img-top" alt="Hollywood Sign on The Hill" style="background-image: url('<?=$cek['gambar_produk']?>');">
                    <div class="d-flex align-items-start p-2">
                       
                    </div>
                </div>
            </div>
        </div>
        <div class="col d-grid align-content-start">
            <div class="card">
                <div class="card-body pb-2 d-grid align-content-start">
                    <div class="d-flex fs-6 mb-2">
                        <div class="col-3 col-lg-4">
                            Nama Produk
                        </div>
                        <div class="ps-1 pe-2">
                            :
                        </div>
                        <div class="col fs-6 fw-bold">
                            <?=$cek['nama_produk']?>
                        </div>
                    </div>
                    <div class="d-flex fs-6 mb-2">
                        <div class="col-3 col-lg-4">
                            Keterangan
                        </div>
                        <div class="ps-1 pe-2">
                            :
                        </div>
                        <div class="col">
                            <small>
                                <?=$cek['keterangan_produk']?>
                            </small>
                        </div>
                    </div>
                    <div class="d-flex fs-6 mb-2">
                        <div class="col-3 col-lg-4">
                            Harga
                        </div>
                        <div class="ps-1 pe-2">
                            :
                        </div>
                        <div class="col fw-bold">
                            <?=rupiah($cek['harga_produk'])?>
                        </div>
                    </div>
                    <div class="d-flex fs-6 mb-2">
                        <div class="col-3 col-lg-4">
                            Berat
                        </div>
                        <div class="ps-1 pe-2">
                            :
                        </div>
                        <div class="col fw-bold">
                            <?=$cek['berat_produk']?> Gram
                        </div>
                    </div>
                    <div class="d-flex fs-6 mb-2">
                        <div class="col-3 col-lg-4">
                            Stock
                        </div>
                        <div class="ps-1 pe-2">
                            :
                        </div>
                        <div class="col fw-bold">
                             <?=$cek['stok_produk']?>
                        </div>
                    </div>
                    <form action="" class="d-flex mt-3" method="post">
                        <input type="hidden" name="id" value="<?=$cek['produk_id']?>">
                        <button type="submit" name="tamabahkeranjang" class="btn btn-primary border-0 me-auto fs-6 fw-normal rounded ps-4 pe-3">Tambahkan ke keranjang
                            
                        </button>
                    </form>
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
</body>

</html>