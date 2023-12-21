<?php
    include "koneksi.php";
    include "cekuserlogin.php";
    $totalharga=0;
    $totalbarang=0;
    $totalberat=0;
    $uid=user()['user_id'];
    $keranjang=q("select keranjang.*,produk.* from keranjang,produk where keranjang.id_user='$uid' and keranjang.id_produk=produk.produk_id");
    foreach ($keranjang as $kr) {
        $harga=$kr['harga_produk']*$kr['qty_keranjang'];
        $totalharga=$totalharga+$harga;
        $totalbarang=$totalbarang+$kr['qty_keranjang'];
        $berat=$kr['berat_produk']*$kr['qty_keranjang'];
        $totalberat=$totalberat+$berat;
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

<body class="pt-5 pb-5 body"
    style="background-image: url('img/bg/bg3.jpg'); 
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;">
    <?php 
    include "navbar.php";
     ?>
    <form action="" method="POST" class="d-grid d-lg-flex  col-11 mx-auto col-lg-8 mt-2 mt-5 pt-2 text-black mb-2">
            <div class="col-12 col-lg-8 d-grid ps-lg-5 pe-lg-5 ">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <div class="form-floating mb-3">
                                <input required type="text" value="<?=user()['nama_user']?>" placeholder="Nama" name="nama" id="nama" class="form-control  shadow-none border">
                                <label for="">Nama</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input required type="text" value="<?=user()['no_hp']?>" placeholder="nohp" name="nohp" id="nohp" class="form-control  shadow-none border">
                                <label for="">No hp</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input readonly required type="number" value="<?=$totalberat?>" placeholder="berat" name="berat" id="berat" class="form-control  shadow-none border">
                                <label for="">Berat</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select required type="text" placeholder="" name="kota" id="kota" class="form-control tujuan kota shadow-none border">
                                    <?php 
                                        $kota=q("select * from kota");
                                        foreach ($kota as $ko) {
                                    ?>
                                    <option value="<?=$ko['kota_id']?>"><?=$ko['nama']?></option>
                                    <?php } ?>
                                </select>
                                <label for="">Kota</label>
                            </div>
							<div class="form-floating mb-3">
                                <select required type="text" placeholder="kurir" name="kurir" id="kurir" class="form-control kurir shadow-none border">
                                        <option value="jne">JNE</option>
                                        <option value="pos">POS</option>
                                        <option value="tiki">TIKI</option>
                                </select>
                                <label for="">Ekspedisi</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select required type="text" placeholder="layanan" name="layanan" id="layanan" class="form-control layanan shadow-none border">
                                </select>
                                <label for="">Layanan</label>
                            </div>
                            <input type="hidden" name="totalharga" id="totalharga" value="<?=$totalharga?>" class="totalharga">
                            <input type="hidden" name="ongkir" id="ongkir" class="ongkir">
                            <input type="hidden" name="totalbayar" id="totalbayar" class="totalbayar">
                            <div class="form-floating mb-3">
                                <textarea style="height: 100px;" required placeholder="alamat" name="alamat" id="alamat" class="form-control  shadow-none border"></textarea>
                                <label for="">Alamat</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-12 col-lg-4 d-grid ">
                <div class="card">
                    <div class="card-body d-grid align-content-start ">
                        <h5 class="card-title mb-3">Rincian Biaya</h5>
                        <div class="col d-flex fs-6 mb-1">
                                <p class="col-5 fs-6 m-0">Total harga &nbsp&nbsp&nbsp&nbsp:</p>
                                <p class="col text-end fw-bold fs-6"><?=rupiah($totalharga)?></p>
                        </div>
                        <div class="col d-flex mb-1">
                                <p class="col-5 fs-6">Ongkos Kirim  :</p>
                                <p class="col text-end fw-bold fs-6 tampilongkir">Rp 0</p>
                        </div>
                        <div class="col d-flex mb-2">
                                <p class="col-5 fs-6 ">Total bayar  &nbsp&nbsp&nbsp&nbsp:</p>
                                <p class="col text-end fw-bold fs-6 totalnya">Rp 0</p>
                        </div>
                        <div class="d-flex">
                            <button type="submit" name="simpanpesanan" class="btn btn-primary p-2 ps-3 pe-3 rounded fs-6 tekan">
                                Buat Pesanan
                            </button>
                        </div>
                    </div>
                </div>
            </div>

    </form>
    <footer class="fixed-bottom d-flex shadow-1 justify-content-center container" style="background-color:#18C0FC;">
		</br>
        <p style="color:#FFFFFF;">Toko Catur Pawan <i class="bi bi-c-circle"></i> 2023</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
   <script>
        $( document ).ready(function() {
        function rupiah(angka){
            $.ajax({
                type:"POST",
                url:"ongkir.php",
                data:{angka:angka},
            }).done(function(data){
                $(".tampilongkir").text(data);
            });
        }

        function rupiahtotalbayar2(angka){
            $.ajax({
                type:"POST",
                url:"ongkir.php",
                data:{angka:angka},
            }).done(function(data){
                $(".totalnya").text(data);
            });
        }

        function hitung(){
            rupiah(layanan.value);
                   $(".ongkir").val(layanan.value);
                   totalbayar.value=eval(parseFloat(layanan.value)+parseFloat(totalharga.value));
                   rupiahtotalbayar2(totalbayar.value);
        }

        function ongkir(){
           try {
            $(".tampilongkir").text("loading");
            $(".totalnya").text("loading");
            $.ajax({
                type:"POST",
                url:"ongkir.php",
                data:{tujuan:kota.value,berat:berat.value,kurir:kurir.value},
            }).done(function(data){
                    $(".layanan").empty();
                   $(".layanan").append(data);
                    hitung();
                   
            });
           } catch (error) {
            
           }
        }

        $(".kota").on('change',()=>{
            ongkir();
        });

        $(".layanan").on('change',()=>{
            hitung();
        });

        $(".kurir").on('change',()=>{
            ongkir();
        });

        setTimeout(() => {
            ongkir();
        }, 1000);
    });
   </script>
</body>

</html>