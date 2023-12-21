<?php
    include "koneksi.php";
    include "cekuserlogin.php";
    $totalharga=0;
    $totalbarang=0;
    $totalberat=0;
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

<body class="pt-5 pb-5 container"
    style="background-image: url('img/bg/bg3.jpg'); 
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;">
    <?php 
    include "navbar.php";
     ?>
    <div class="d-flex col-11 mx-auto col-lg-9 mt-2 mt-4 text-black mb-2">
        
    </div>
    <div class="d-grid d-lg-flex  col-11 mx-auto col-lg-9 ">
            <div class="col-12 col-lg-8 d-grid ">
               <?php 
                $uid=user()['user_id'];
                $keranjang=q("select keranjang.*,produk.* from keranjang,produk where keranjang.id_user='$uid' and keranjang.id_produk=produk.produk_id");
                foreach ($keranjang as $kr) {
                    $harga=$kr['harga_produk']*$kr['qty_keranjang'];
                    $totalbarang=$totalbarang+$kr['qty_keranjang'];
                    $totalharga=$totalharga+$harga;
                    $berat=$kr['berat_produk']*$kr['qty_keranjang'];
                    $totalberat=$totalberat+$berat;
               ?>
                <div class="card mb-2">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <div class="ratio ratio-1x1 bg-image card-img-top" alt="Hollywood Sign on The Hill" style="background-image: url('<?=$kr['gambar_produk']?>');">
                                <div class="d-flex align-items-start p-2">
                                 
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title m-0"><?=$kr['nama_produk']?></h5>
                                <p class="card-text fs-5 m-0 fw-bold"><?=rupiah($harga)?></p>
                                <p class="card-text fs-5 m-0 fw-bold"><?=$berat?> g</p>
                                <form action="" method="post">
                                    <input type="hidden" name="id" value="<?=$kr['keranjang_id']?>">
                                    <div class="btn-group shadow-none " role="group" aria-label="Basic example">
                                        <button type="submit" name="kurangijumlahproduk" class="btn btn-danger p-2 ps-3 pe-3 rounded fs-6">
                                            <i class="bi bi-dash-lg"></i>
                                        </button>
                                        &nbsp;
										<button type="button" disabled class="btn btn-danger p-2 ps-3 pe-3 rounded fs-6">
                                            <?=$kr['qty_keranjang']?>
                                        </button>
										&nbsp;
                                        <button type="submit" name="tambahjumlahproduk" class="btn btn-primary p-2 ps-3 pe-3 rounded fs-6">
                                            <i class="bi bi-plus-lg"></i>
                                        </button>
                                    </div>
                                </form>
								</br>
                                <form action="" method="post">
                                    <input type="hidden" name="id" value="<?=$kr['keranjang_id']?>">
                                    <button name="hapuskeranjang" class="btn btn-danger p-2 ps-3 pe-3 rounded fs-6" type="submit">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>


            </div>


            <div class="col-12 col-lg-4 d-grid ">
                <div class="card">
                    <div class="card-body d-grid align-content-start ">
                        <div class="col d-flex fs-5">
                                <p class="col-5 fs-5 m-0">Jumlah&nbsp&nbsp:</p>
                                <p class="col text-end fw-bold fs-5 m-0"><?=$totalbarang?></p>
                            </div>
                                
                        <div class="col d-flex fs-5">
                                <p class="col-5 fs-5 m-0">Berat &nbsp &nbsp &nbsp:</p>
                                <p class="col text-end fw-bold fs-5 m-0"><?=$totalberat?> g</p>
                        </div>
                        <div class="col d-flex mb-3">
                                <p class="col-5 fs-5">Harga &nbsp &nbsp&nbsp:</p>
                                <p class="col text-end fw-bold fs-5"><?=rupiah($totalharga)?></p>
                        </div>
                            <div class="d-flex">
                                <a href="checkout.php" class="btn btn-primary p-2 ps-3 pe-3 rounded fs-6">
                                    Checkout
                                </a>
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
   
</body>

</html>