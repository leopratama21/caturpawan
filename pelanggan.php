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

<body class="pt-5 pb-5 bg-light container "
    style="background-image: url('img/bg/bg3.jpg'); 
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;">
    <?php include "navbar.php"; ?>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-1 col-11 mx-auto col-lg-8 mt-2 g-4">
       
    <div class="col d-grid">
            <div class="card border">   
            <div class="card-body  d-grid align-content-start">
                   <!--<div class="mb-2 d-flex align-items-center ">
                        <button class="btn bg-success bg-opacity-50 fs-6 shadow-none  rounded btn-sm text-black ">
                        <i class="bi bi-alt"></i>
                        </button>
                        <h4 class="m-0 ms-2">Pelanggan</h4>
                   </div>-->
                   <?php include "alert.php"; ?>
                    <div class="table-responsive">
                    <table class="table" id="table">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">No Hp</th>
                            <th scope="col">aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $n=1;
                                $qq=q("select * from user where level='user' order by user_id desc");
                                foreach ($qq as $k) {
                            ?>
                            <tr>
                                <th scope="row"><?=$n++?></th>
								<td class="col-3"><?=$k['nama_user']?></td>
                                <td class="col-3"><?=$k['email_user']?></td>
                                <td class="col-3"><?=$k['no_hp']?></td>
                                <td>
                                    <div class="d-flex">
                                        <button class="btn btn-sm btn-warning border shadow-none ms-auto me-2" data-bs-toggle="modal" data-bs-target="#editpengguna<?=$k['user_id']?>">Edit</button>
                                        <button type="button" class="btn btn-sm btn-danger border shadow-none " data-bs-toggle="modal" data-bs-target="#hapuspengguna<?=$k['user_id']?>">Hapus</button>
                                    </div>
                                </td>
                            </tr>
                        
                              


                            <?php } ?>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>


    </div>
	
							<div class="modal fade" data-bs-backdrop="false" id="editpengguna<?=$k['user_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit</h1>
                                        <button type="button" class="btn-close shadow-none " data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body d-grid ">
                                    <form action="" method="post" class="d-grid align-content-start" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?=$k['user_id']?>">
                                        <div class="form-floating mb-3">
                                            <input type="text" value="<?=$k['nama_user']?>" name="nama_user" id="nama_user" required placeholder="nama_user" class="form-control shadow-none ">
                                            <label for="">Nama</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <textarea style="height: 125px;"  name="email_user" id="email_user" required placeholder="email_user" class="form-control shadow-none "><?=$k['email_user']?></textarea>
                                            <label for="">email</label>
                                        </div>
										<div class="form-floating mb-3">
                                            <textarea style="height: 125px;"  name="no_hp" id="no_hp" required placeholder="no_hp" class="form-control shadow-none "><?=$k['no_hp']?></textarea>
                                            <label for="">no Hp</label>
                                        </div>
										<div class="d-flex ps-auto">
                                                <button class="btn btn-sm btn-warning border shadow-none fs-6 ms-auto border-0" name="updatepengguna" type="submit">Update</button>
                                        </div>
                                    </form>
                                    </div>
                                    </div>
                                </div>
                                </div>
    
    <div class="modal fade" data-bs-backdrop="false" id="hapuspengguna<?=$k['user_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Peringatan !</h1>
                                        <button type="button" class="btn-close shadow-none " data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body d-grid ">
                                            <div class="alert alert-light text-center">
                                                Yakin ingin menghapus pelanggan ini?
                                            </div>
                                            <form action="" method="post" class="d-grid align-content-start" enctype="multipart/form-data">
                                                <input type="hidden" name="id" value="<?=$k['user_id']?>">
                                                <div class="d-flex ps-auto">
                                                        <button class="btn btn-sm btn-danger border shadow-none fs-6 ms-auto " name="hapuspengguna" type="submit">Hapus</button>
                                                </div>
                                            </form>
                                    </div>
                                    </div>
                                </div>
                                </div>



   <footer class="fixed-bottom d-flex shadow-1 justify-content-center container " style="background-color:#18C0FC;">
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