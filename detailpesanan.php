<?php
     include "koneksi.php";
     include "cekuserlogin.php";
     if(!isset($_GET['no'])){
        header("location:pesanan.php");
        exit;
     }
     $no=$_GET['no'];
    $iduser=user()['user_id'];
    $pesanan= q("select * from pesanan where no_pesanan='$no' and id_user='$iduser'");
    $pp=$pesanan->fetch_array();
    $detailpesanan=q("select detail_pesanan.*,produk.* from detail_pesanan,produk where detail_pesanan.id_pesanan='$pp[pesanan_id]' and detail_pesanan.id_produk=produk.produk_id");
    $nom=1;
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
     ?>
    <div class="d-grid col-11 col-lg-11 mx-auto mt-2 mt-4 pt-2 text-black mb-2 d-grid">
            <div class="card col border mb-2 border-black ">
                <div class="card-header">
                    <h5 class="m-0 p-0">Nomor Pesanan : <span class="badge text-bg-primary text-white "><?=$no?></span> </h5>
                </div>
                <div class="card-body pt-2 pb-2">
                       <table>
                            <tbody>
                                <tr>
                                    <td>Nama</td>
                                    <td class="ps-2 pe-2"> : </td>
                                    <td><?=$pp['nama_pesanan']?></td>
                                </tr>
                                <tr>
                                    <td>No Hp</td>
                                    <td class="ps-2 pe-2"> : </td>
                                    <td><?=$pp['no_hp_pesanan']?></td>
                                </tr>
                                <tr>
                                    <td>No Resi</td>
                                    <td class="ps-2 pe-2"> : </td>
                                    <td><?=$pp['no_resi']?></td>
                                </tr>
								 <tr>
                                    <td>Alamat</td>
                                    <td class="ps-2 pe-2"> : </td>
                                    <td><?=$pp['alamat_pesanan']?></td>
                                </tr>
                            </tbody>
                       </table>
                </div>
            </div>
            <div class="table-responsive col p-2 pt-3 border ">
            <table class="table" >
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Harga</th>
                        <th scope="col">QTY</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                       foreach ($detailpesanan as $dp) {
                        $harga=$dp['harga_produk']*$dp['qty'];
                    ?>
                    <tr>
                        <th scope="row"><?=$nom++?></th>
                        <td>
                            <p class="fs-6 text-nowrap">
                                <?=$dp['nama_produk']?>
                            </p>
                        </td>
                        <td>
                            <p class="fs-6 text-nowrap">
                                <?=rupiah($dp['harga_produk'])?>
                            </p>
                        </td>
                        <td>
                            <p class="fs-6 text-nowrap">
                                <?=$dp['qty']?>
                            </p>
                        </td>
                        <td>
                            <p class="fs-6 text-nowrap">
                                <?=rupiah($harga)?>
                            </p>
                        </td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="2">
                            <p class="fs-6">    
                                Total Harga
                            </p>
                        </td>
                        <td></td>
                        <td></td>
                        <td>
                        <p class="fs-6">      
                                <?=rupiah($pp['total_harga'])?>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p class="fs-6">     
                                 Biaya Ongkir
                            </p>
                        </td>
                        <td></td>
                        <td></td>
                        <td>
                            <p class="fs-6">    
                                <?=rupiah($pp['ongkos_kirim'])?>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p class="fs-6">     
                                 Total Bayar
                            </p>
                        </td>
                        <td></td>
                        <td></td>
                        <td>
                            <p class="fs-6">    
                                <?=rupiah($pp['total_bayar'])?>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                                    <?php 
                                        if($pp['info_pesanan']=='Paket Diterima'){
                                    ?>
                                     <button type="button" class="btn btn-primary fs-6 shadow-none btn-sm">
                                     Paket Diterima
                                </button>
                            <?php }else{ ?>
                            <form action="pesanan.php" method="post">
                                <input type="hidden" name="idpesanankonfirmasi" value="<?=$pp['pesanan_id']?>">
                                <button
                                type="submit" class="btn btn-danger	 fs-6 shadow-none btn-sm">
                                    Konfirmasi Penerimaan 
                                   
                                </button>
                            </form>
                            <?php } ?>
                        </td>
                        <td></td>
                        <td></td>
                        <td>
                           
                        </td>
                    </tr>
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
            <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?php echo Config::$clientKey;?>"></script>
     <?php if(isset($_POST['bayarkan'])){ ?>
            <script type="text/javascript">
                $( document ).ready(function() {
                     snap.pay('<?php echo $snap_token?>');
            });
                </script>
        <?php } ?>
</body>

</html>