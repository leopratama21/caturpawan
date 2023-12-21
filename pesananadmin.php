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

<body class="pt-5 pb-5 bg-light container"
    style="background-image: url('img/bg/bg3.jpg'); 
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;">
    <?php include "navbar.php"; ?>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-1 col-11 mx-auto col-lg-11 mt-2 g-4">
       
    <div class="col d-grid">
            <div class="card border">   
            <div class="card-body  d-grid align-content-start">
                  
                   </br>
                   <?php include "alert.php"; ?>
                    <div class="table-responsive">
                    <table class="table" id="table">
                        <thead>
                            <tr>
                            <th scope="col">No Pesanan</th>
                            <th scope="col">Nama</th>
                            <th scope="col">No Hp</th>
                            <th scope="col">Alamat</th>
							<th scope="col">Status</th>
                            <th scope="col">info</th>
                            <th scope="col">aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $n=1;
                                $qq=q("select pesanan.*,bukti.* from pesanan, bukti where pesanan.pesanan_id=bukti.pesanan_id order by pesanan.pesanan_id desc");
                                foreach ($qq as $k) {
                            ?>
                            <tr>
                                <td class="col-1"><?=$k['no_pesanan']?></td>
                                <td class="col-1"><?=$k['nama_pesanan']?></td>
                                <td class="col-1"><?=$k['no_hp_pesanan']?></td>
                                <td class="col-3"><?=$k['alamat_pesanan']?></td>
                                <td class="col-1"><?=$k['status_pesanan']?></td>
                                <td class="col-1"><?=$k['info_pesanan']?></td>
                                <td>
                                    <div class="d-flex">
                                        <button class="btn btn-sm btn-info border shadow-none ms-auto me-2" data-bs-toggle="modal" data-bs-target="#bukti<?=$k['pesanan_id']?>">cek</button>
                                        <button class="btn btn-sm btn-warning border shadow-none ms-auto me-2" data-bs-toggle="modal" data-bs-target="#editpesanan<?=$k['pesanan_id']?>">konfirmasi</button>
                                        <button type="button" class="btn btn-sm btn-danger border shadow-none " data-bs-toggle="modal" data-bs-target="#hapuspesanan<?=$k['pesanan_id']?>">Hapus</button>
                                    </div>
                                </td>
                            </tr>
							

                            <div class="modal fade" data-bs-backdrop="false" id="bukti<?=$k['pesanan_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Info Pembayaran</h1>
                                        <button type="button" class="btn-close shadow-none " data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body d-grid ">
                                    <form action="" method="post" class="d-grid align-content-start" enctype="multipart/form-data">
										
                                        <input type="hidden" name="id" value="<?=$k['pesanan_id']?>">
                                        <div class="form-floating mb-3">
                                            <input type="text" value="<?=$k['pesanan_id']?>" name="id" id="no_resi" required placeholder="no_resi" class="form-control shadow-none ">
                                            <label for="">Pesanan ID</label>
                                        </div>
										<img class="img-fluid" src="<?=$k['gmabar_bukti']?>" alt="">
										
                                    </form>
                                    </div>
                                    </div>
                                </div>
                                </div>

							<div class="modal fade" data-bs-backdrop="false" id="editpesanan<?=$k['pesanan_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">konfirmasi</h1>
                                        <button type="button" class="btn-close shadow-none " data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body d-grid ">
                                    <form action="" method="post" class="d-grid align-content-start" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?=$k['pesanan_id']?>">
                                        <div class="form-floating mb-3">
                                            <input type="text" value="<?=$k['no_resi']?>" name="no_resi" id="no_resi" required placeholder="no_resi" class="form-control shadow-none ">
                                            <label for="">No Resi</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <textarea style="height: 125px;"  name="info_pesanan" id="info_pesanan" required placeholder="info_pesanan" class="form-control shadow-none "><?=$k['info_pesanan']?></textarea>
                                            <label for="">Info</label>
                                        </div>
										<div class="d-flex ps-auto">
                                                <button class="btn btn-sm btn-warning border shadow-none fs-6 ms-auto border-0" name="updatepesanan" type="submit">Update</button>
                                        </div>
                                    </form>
                                    </div>
                                    </div>
                                </div>
                                </div>
    
							
							<div class="modal fade" data-bs-backdrop="false" id="hapuspesanan<?=$k['pesanan_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Peringatan !</h1>
                                        <button type="button" class="btn-close shadow-none " data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body d-grid ">
                                            <div class="alert alert-light text-center">
                                                Yakin ingin menghapus pesanan ini?
                                            </div>
                                            <form action="" method="post" class="d-grid align-content-start" enctype="multipart/form-data">
                                                <input type="hidden" name="id" value="<?=$k['pesanan_id']?>">
                                                <div class="d-flex ps-auto">
                                                        <button class="btn btn-sm btn-danger border shadow-none fs-6 ms-auto " name="hapuspesanan" type="submit">Hapus</button>
                                                </div>
                                            </form>
                                    </div>
                                    </div>
                                </div>
                                </div>
							
							
							
                            <?php } ?>
                        </tbody>
                        </table>
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