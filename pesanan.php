<?php

    include "koneksi.php";
    include "cekuserlogin.php";   
    $warna="warning";
    $status="belum";
    $jumlahsemua=100;
    
    $total=9000;
    if (isset($_POST['totalbayar'])) {
        $total=$_POST['totalbayar'];
    }
    
    if(isset($_POST['pesanan_id'])){
        $pid=$_POST['pesanan_id'];
        $cekpesanannya=q("select * from pesanan where pesanan_id='$pid' and status_pesanan='Belum Bayar'");
        if ($cekpesanannya->num_rows>0) {
            $uid=user()['user_id'];
            $detailpesanan=q("select detail_pesanan.*,produk.* from detail_pesanan,produk where id_pesanan='$pid' and detail_pesanan.id_user='$uid' and detail_pesanan.id_produk=produk.produk_id");
            foreach ($detailpesanan as $dtp) {
                $jml=$dtp['qty'];
                $jumlahsemua=$jumlahsemua+$jml;
                $kurang=$dtp['stok_produk']-$jml;
                $idproduk=$dtp['id_produk'];
                q("update produk set stok_produk='$kurang' where produk_id='$idproduk'");
            }
            q("update pesanan set status_pesanan='Sudah Bayar' where pesanan_id='$pid'");
        }else{
    
        }
    }
    
    // }
    
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

<body class="pt-5 pb-5 container"
    style="background-image: url('img/bg/bg3.jpg'); 
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;">
    <?php
     include "navbar.php";
     $nom=1;
     ?>
    <div class="d-grid d-lg-flex col-11 col-lg-11 mx-auto mt-2 mt-5 pt-2 text-black mb-2 d-grid">
            <div class="table-responsive col p-2 pt-3">
            <table class="table" id="table">
                <thead>
                    <tr>
                        <th scope="col">Nomor</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Pembayaran</th>
                        <th scope="col">Status Pembayaran</th>
                        <th scope="col">Pembayaran</th>
                        <th scope="col">Selesai</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $iduser=user()['user_id'];
                       $pesanan= q("select * from pesanan where id_user='$iduser'");
                       foreach ($pesanan as $pn) {
                    ?>
                    <tr>
                        <td>
                            <a href="detailpesanan.php?no=<?=$pn['no_pesanan']?>" class="fs-6 badge text-bg-primary text-white "><?=$pn['no_pesanan']?></a>
                        </td>
                        <td>
                            <p class="fs-6 text-nowrap"><?=date('d M Y',strtotime($pn['tanggal_pesanan']))?></p>
                        </td>
                        <td>
                            <p class="fs-6 text-nowrap"><?=rupiah($pn['total_bayar'])?></p>
                        </td>
                        <td>
                            
                            <?php 
                            $id = "id";
                            $warna1="success";
                                if($pn['status_pesanan']=='Belum Bayar'){
                                    $warna1="warning";
                                    $id="demo";
                                }
                            ?>
                            <span  id="<?=$id?>"class="badge text-bg-<?=$warna1?> fs-6 text-white rounded "><?=$pn['status_pesanan']?></span>
                        </td>
                        <td>
						
						
						<button class="btn btn-sm text-bg-<?=$warna1?> border text-white shadow-none ms-auto me-2" data-bs-toggle="modal" data-bs-target="#info<?=$pn['pesanan_id']?>">Bayar</button>
						
						
						
						<div class="modal fade" data-bs-backdrop="false" id="info<?=$pn['pesanan_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" name="nama" id="nama">Nomor Pesanan ( <?=$pn['pesanan_id']?> ) </h1>
                                        <button type="button" class="btn-close shadow-none " data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body d-grid ">
                                    <form action="" method="post" class="d-grid align-content-start" enctype="multipart/form-data">
										<input type="hidden" name="id_pesanan" value="<?=$pn['pesanan_id']?>">
										<h1 class="modal-title fs-5"> 002-12341241234-12341234 </h1>
										<br/>
                                       
										<h1 class="modal-title fs-5">a/n Leo Pratama</h1>
										<br/>
										
										<h1 class="fs-6 text-nowrap">jumlah tagihan : <?=rupiah($pn['total_bayar'])?></h1>
                                       <br/>
									<div class="form-floating mb-3">
										<input accept="image/png, image/jpeg" or accept=". png, . jpg, . jpeg" type="file" name="gambar" id="gambar" placeholder="gambar" class="form-control shadow-none ">
										<label for="">gambar</label>
									</div>
								
									
                                    
										<?php 
										$warna1="success";
											if($pn['status_pesanan']=='Belum Bayar'){?>
												<form action="" method="post">
														<input type="hidden" name="pesanan_id" value="<?=$pn['pesanan_id']?>">
														<input type="hidden" name="totalbayar" value="<?=$pn['total_bayar']?>">
														<button type="submit" class="btn btn-info border-0 fs-6 btn-sm p-1 ps-2 pe-2 mx-auto text-nowrap" name="simpan_bukti" name="bayarkan" id="bayar">konfirmasi</button>
												</form>
									   <?php }else{ ?>
											<button type="button" class="btn btn-success border-0 fs-6 btn-sm p-1 ps-2 pe-2 mx-auto text-nowrap" name="bayarkan" id="bayar">Sudah Bayar</button>
										<?php }?>
                                    </div>
                                    </form>
                                    </div>
                                </div>
                                </div>
						
						
                        </td>
                        <td>
                            <?php 
                            $warna2="success";
                                if($pn['info_pesanan']=="Sedang dikiriman"){
                                    $warna2="warning";
                                }
                            ?>
                            <span class="badge text-bg-<?=$warna2?> fs-6 rounded text-white  text-capitalize">
                                <?=$pn['info_pesanan']?>
                            </span>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
                </table>
            </div>
    </div>
    <footer class="fixed-bottom d-flex shadow-1 justify-content-center container" style="background-color:#18C0FC;">
		</br>
        <p style="color:#FFFFFF;">Toko Catur Pawan <i class="bi bi-c-circle"></i> 2023</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.7.0.js"></script> -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript">
        new DataTable('#table');
    </script>
        <script>
        // Set the date we're counting down to
        var countDownDate = new Date("Dec 17, 2025 17:32:25").getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for hours, minutes and seconds
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="demo"
        document.getElementById("demo").innerHTML = hours + "h "
        + minutes + "m " + seconds + "s ";
        // ---- hapus di jam --- error
        /*if Date ("Dec 5, 2025 15:32:25"){
            if(isset($_POST['hapuspesanan'])){
                q("delete from pesanan where pesanan_id='$_POST[id]'");
                $a="primary"; 
            }
        }*/

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "Pesanan Dibatalkan";
        }
        }, 1000);
        </script>

        // 
</body>

</html>