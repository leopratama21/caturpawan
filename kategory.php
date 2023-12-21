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
    style="background-image: url('img/bg/bg3.jpg'); background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;">
    <?php include "navbar.php"; ?>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-1 col-11 mx-auto col-lg-8 mt-2 g-4" >
       
    <div class="col d-grid">
            <div class="card border bg-">   
            <div class="card-body  d-grid align-content-start">
                   <div class="mb-2 d-flex align-items-center ">
                        
                        <div class=" d-flex col">
                            <button class="btn btn-primary  ms-auto  btn-sm fs-6 fw-normal border-0" data-bs-toggle="modal" data-bs-target="#tambahproperty">
                                    Tambah
                            </button>
                        </div>
                   </div>
                   </br>
                   <?php include "alert.php"; ?>
                    <div class="table-responsive">
                    <table class="table" id="table">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $n=1;
                                $qq=q("select * from kategori order by kategori_id desc");
                                foreach ($qq as $k) {
                            ?>
                            <tr>
                                <th scope="row"><?=$n++?></th>
                                <td class="col-3"><?=$k['nama_kategori']?></td>
                                <td>
                                    <img class="img-fluid col-3" src="<?=$k['gambar_kategori']?>" alt="">
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <button class="btn btn-sm btn-warning border shadow-none ms-auto me-2" data-bs-toggle="modal" data-bs-target="#editkategori<?=$k['kategori_id']?>">Edit</button>
                                        <button type="button" class="btn btn-sm btn-danger border shadow-none " data-bs-toggle="modal" data-bs-target="#hapuskategori<?=$k['kategori_id']?>">Hapus</button>
                                    </div>
                                </td>
                            </tr>


                            <div class="modal fade" data-bs-backdrop="false" id="editkategori<?=$k['kategori_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit</h1>
                                        <button type="button" class="btn-close shadow-none " data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body d-grid ">
                                            <form action="" method="post" class="d-grid align-content-start" enctype="multipart/form-data">
                                                <div class="form-floating mb-3">
                                                    <input type="hidden" name="id" value="<?=$k['kategori_id']?>">
                                                    <input type="text" name="nama" value="<?=$k['nama_kategori']?>" id="nama" required placeholder="nama" class="form-control shadow-none ">
                                                    <label for="">Nama</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input accept="image/png, image/jpeg" or accept=". png, . jpg, . jpeg" type="file" name="gambar" id="gambar" placeholder="gambar" class="form-control shadow-none ">
                                                    <label for="">gambar</label>
                                                </div>
                                                <div class="d-flex ps-auto">
                                                        <button class="btn btn-sm btn-warning border shadow-none fs-6 ms-auto " name="editkategory" type="submit">Update</button>
                                                </div>
                                            </form>
                                    </div>
                                    </div>
                                </div>
                                </div>





                                <div class="modal fade" data-bs-backdrop="false" id="hapuskategori<?=$k['kategori_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Peringatan !</h1>
                                        <button type="button" class="btn-close shadow-none " data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body d-grid ">
                                            <div class="alert alert-light text-center">
                                                Yakin ingin menghapus Kategori ini?
                                            </div>
                                            <form action="" method="post" class="d-grid align-content-start" enctype="multipart/form-data">
                                                <input type="hidden" name="id" value="<?=$k['kategori_id']?>">
                                                <div class="d-flex ps-auto">
                                                        <button class="btn btn-sm btn-danger border shadow-none fs-6 ms-auto " name="hapuskategori" type="submit">Hapus</button>
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




<div class="modal fade" data-bs-backdrop="false" id="tambahproperty" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah</h1>
        <button type="button" class="btn-close shadow-none " data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-grid ">
            <form action="" method="post" class="d-grid align-content-start" enctype="multipart/form-data">
                <div class="form-floating mb-3">
                    <input type="text" name="nama" id="nama" required placeholder="nama" class="form-control shadow-none ">
                    <label for="">Nama</label>
                </div>
                <div class="form-floating mb-3">
                    <input accept="image/png, image/jpeg" or accept=". png, . jpg, . jpeg" type="file" name="gambar" id="gambar" required placeholder="gambar" class="form-control shadow-none ">
                    <label for="">gambar</label>
                </div>
                <div class="d-flex ps-auto">
                        <button class="btn btn-sm btn-primary border shadow-none fs-6 ms-auto " name="simpankategory" type="submit">Simpan</button>
                </div>
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
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        new DataTable('#table');
    </script>
</body>

</html>