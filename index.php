<?php include "koneksi.php";  
require_once('auth.php');
    include "cekloginutama.php";
    $kategori=q("select * from kategori");
    $pilihan="";
    if(isset($_GET['kategori'])){
        $pilihan=$_GET['kategori'];
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
    <!--
	<div class="col-11 mx-auto col-lg-10 mt-5">
        <form class="d-flex col-lg-3" action="" method="get" id="formku">
            <select required class="form-control form-select border  shadow-none fs-6" name="kategori" id="" onChange="formku.submit();">
                    <option value=" ">Pilih Kategori</option>
                    <?php
                        foreach ($kategori as $kt) {
                    ?>
                    <option
                        <?php
                            if($kt['nama_kategori']==$pilihan){
                                echo "selected";
                            }
                        ?>
                     value="<?=$kt['nama_kategori']?>"><?=$kt['nama_kategori']?></option>
                    <?php } ?>
            </select>
        </form>
    </div>
	-->
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 col-11 mx-auto col-lg-10 mt-2 g-3">
        <?php
            $l="";
            $kate="";
            if (isset($_GET['q'])) {
                $q=$_GET['q'];
                if ($q!=" ") {
                    $l="and nama_produk like '%$q%'";
                }
            }
            if (isset($_GET['kategori'])) {
                $kaa=$_GET['kategori'];
                if ($kaa!=" ") {
                    $kate="and nama_kategori like '%$kaa%'";
                }
            }
            $produk=q("select produk.*,kategori.* from produk,kategori where kategori.kategori_id=produk.id_kategori $l $kate order by produk.produk_id desc");
            foreach ($produk as $pp) {
        ?>
        <div class="col d-grid">
            <div class="card border" onclick="window.location.href='detail.php?slug=<?=$pp['slug_produk']?>'">
                <div class="ratio ratio-16x9 bg-image card-img-top" alt="Hollywood Sign on The Hill" style="background-image: url('<?=$pp['gambar_produk']?>');">
                    <div class="d-flex align-items-start p-2">
                        <button class="btn btn-primary p-2 ps-3 pe-3 rounded fs-6">
                        Terlaris
                    </button>
                    </div>
                </div>
                <div class="card-body p-3 d-grid align-content-start">
                    <p class="card-title lh-sm mb-1 fs-6 text-truncate"><?=$pp['nama_produk']?></p>
                    <h6 class="card-text fw-normal text-truncate">
                        <?=rupiah($pp['harga_produk'])?>
                    </h6>
                    <!-- <p class="card-title lh-sm m-0 text-truncate">Berat : <?=$pp['keterangan_produk']?></p> -->
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
	<div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 col-11 mx-auto col-lg-10 mt-2 g-3">
        <?php
            $l="";
            $kate="";
            if (isset($_GET['q'])) {
                $q=$_GET['q'];
                if ($q!=" ") {
                    $l="and nama_produk like '%$q%'";
                }
            }
            if (isset($_GET['kategori'])) {
                $kaa=$_GET['kategori'];
                if ($kaa!=" ") {
                    $kate="and nama_kategori like '%$kaa%'";
                }
            }
            $produk=q("select produk.*,kategori.* from produk,kategori where kategori.kategori_id=produk.id_kategori $l $kate order by produk.produk_id desc");
            foreach ($produk as $pp) {
        ?>
        <div class="col d-grid">
            <div class="card border" onclick="window.location.href='detail.php?slug=<?=$pp['slug_produk']?>'">
                <div class="ratio ratio-16x9 bg-image card-img-top" alt="Hollywood Sign on The Hill" style="background-image: url('<?=$pp['gambar_produk']?>');">
                    <div class="d-flex align-items-start p-2">
                        <button class="btn btn-primary p-2 ps-3 pe-3 rounded fs-6">
                        Terbaru
                    </button>
                    </div>
                </div>
                <div class="card-body p-3 d-grid align-content-start">
                    <p class="card-title lh-sm mb-1 fs-6 text-truncate"><?=$pp['nama_produk']?></p>
                    <h6 class="card-text fw-normal text-truncate">
                        <?=rupiah($pp['harga_produk'])?>
                    </h6>
                    <!-- <p class="card-title lh-sm m-0 text-truncate">Berat : <?=$pp['keterangan_produk']?></p> -->
                </div>
            </div>
        </div>
        <?php } ?>

    </div>
    <footer class="fixed-bottom d-flex shadow-1 justify-content-center container" style="background-color:#18C0FC;">
		</br>
        <p style="color:#FFFFFF;">Toko Catur Pawan <i class="bi bi-c-circle"></i> 2023</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>
</body>

</html>