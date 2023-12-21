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
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-1 col-11 mx-auto col-lg-12 mt-2 g-4">
       
    <div class="col d-grid">
            <div class="card border">   
            <div class="card-body  d-grid align-content-start">
                   <div class="mb-2 d-flex align-items-center ">
                        <!--
						<button class="btn bg-warning bg-opacity-50  fs-6 shadow-none  rounded btn-sm text-black ">
                                <i class="bi bi-alexa"></i>
                        </button>
						
                        <h4 class="m-0 ms-2">Produk</h4>-->
                        
                        <div class=" d-flex col">
                            <button class="btn btn-primary  ms-auto  btn-sm fs-6 fw-normal border-0" data-bs-toggle="modal" data-bs-target="#tambahProduk">
                                    Tambah
                            </button>
                        </div>
                   </div>
				   </br>
                   <!-- <div class="alert alert-light mx-auto ">
                        <p class="m-0">Silakan menambahkan Produk terhadap produk nantinya</p>
                   </div> -->
                   <?php include "alert.php"; ?>
                    <div class="table-responsive">
                    <table class="table" id="table">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col-1">Kategori</th>
                            <th scope="col-1">pemasok</th>
                            <th scope="col-1">Nama</th>
                            <th scope="col-1">Harga</th>
                            <th scope="col-1">Stok</th>
                            <th scope="col-1">Berat</th>
                            <th scope="col-1">Keterangan</th>
                            <th scope="col-3">Gambar</th>
                            <th scope="col-1">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $n=1;
                                $qq=q("select produk.*,kategori.*,pemasok.* from produk,kategori,pemasok where produk.id_kategori=kategori.kategori_id and produk.id_pemasok=pemasok.pemasok_id order by produk.produk_id desc");
                                foreach ($qq as $p) {
                            ?>
                            <tr>
                                <th scope="row"><?=$n++?></th>
                                <td><?=$p['nama_kategori']?></td>
                                <td><?=$p['nama_pemasok']?></td>
                                <td><?=$p['nama_produk']?></td>
                                <td><?=$p['harga_produk']?></td>
                                <td><?=$p['stok_produk']?></td>
                                <td><?=$p['berat_produk']?></td>
                                <td class="d-grid">
                                <p class=" text-truncate "><?=$p['keterangan_produk']?></p>
                                </td>
                                <td>
                                    <img class="img-fluid" src="<?=$p['gambar_produk']?>" alt="">
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <button class="btn btn-sm btn-warning border shadow-none ms-auto me-2" data-bs-toggle="modal" data-bs-target="#editProduk<?=$p['produk_id']?>">Edit</button>
                                        <button type="button" class="btn btn-sm btn-danger border shadow-none " data-bs-toggle="modal" data-bs-target="#hapusProduk<?=$p['produk_id']?>">Hapus</button>
                                    </div>
                                </td>
                            </tr>



<div class="modal fade" data-bs-backdrop="false" id="editProduk<?=$p['produk_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header border-0 ">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit</h1>
        <button type="button" class="btn-close shadow-none " data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-grid ">
            <form action="" method="post" class="d-grid align-content-start" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?=$p['produk_id']?>">
                <div class="form-floating mb-3">
                    <select name="kategori" id="kategori" class="form-control shadow-none ">
                        <option value="">Pilih</option>
                        <?php 
                            $kategori=q("select * from kategori");
                            foreach ($kategori as $kt) { ?>
                               <option
                               <?php 
                                    if($kt['kategori_id']==$p['id_kategori']){
                                        echo "selected";
                                    }
                                ?>
                               value="<?=$kt['kategori_id']?>"><?=$kt['nama_kategori']?></option>
                           <?php }
                        ?>
                    </select>
                    <label for="">Kategori</label>
                </div>
                <div class="form-floating mb-3">
                    <select name="pemasok" id="pemasok" class="form-control shadow-none ">
                        <option value="">Pilih</option>
                        <?php 
                            $pemasok=q("select * from pemasok");
                            foreach ($pemasok as $sp) { ?>
                               <option 
                                <?php 
                                    if($sp['pemasok_id']==$p['id_pemasok']){
                                        echo "selected";
                                    }
                                ?>
                               value="<?=$sp['pemasok_id']?>"><?=$sp['nama_pemasok']?></option>
                           <?php }
                        ?>
                    </select>
                    <label for="">pemasok</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" value="<?=$p['nama_produk']?>" name="nama" id="nama" required placeholder="nama" class="form-control shadow-none ">
                    <label for="">Nama</label>
                </div>
                <!-- <div class="form-floating mb-3">
                    <input type="text" name="slug" value="<?=$p['slug_produk']?>" id="slug" required placeholder="slug" class="form-control shadow-none ">
                    <label for="">Slug</label>
                </div> -->
                <div class="row row-cols-3 g-3">
                    <div class="col d-grid">
                        <div class="form-floating mb-3">
                            <input type="number" name="stok" value="<?=$p['stok_produk']?>" id="stok" required placeholder="stok" class="form-control shadow-none ">
                            <label for="">Stok</label>
                        </div>
                    </div>
                    <div class="col d-grid">
                        <div class="form-floating mb-3">
                            <input type="number" name="berat" value="<?=$p['berat_produk']?>" id="berat" required placeholder="berat" class="form-control shadow-none ">
                            <label for="">Berat</label>
                        </div>
                    </div>
					<div class="col d-grid">
                        <div class="form-floating mb-3">
                            <input type="number" name="harga" value="<?=$p['harga_produk']?>" id="harga" required placeholder="harga" class="form-control shadow-none ">
							<label for="">Harga</label>
                        </div>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <textarea style="height: 125px;" name="keterangan" id="keterangan" required placeholder="keterangan" class="form-control shadow-none "><?=$p['keterangan_produk']?></textarea>
                    <label for="">Keterangan</label>
                </div>
                <div class="form-floating mb-3">
                    <input accept="image/png, image/jpeg" or accept=". png, . jpg, . jpeg" type="file" name="gambar" id="gambar" placeholder="gambar" class="form-control shadow-none ">
                    <label for="">gambar</label>
                </div>
                <div class="d-flex ps-auto">
                        <button class="btn btn-sm btn-warning border shadow-none fs-6 ms-auto border-0" name="updateproduk" type="submit">Update</button>
                </div>
            </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" data-bs-backdrop="false" id="hapusProduk<?=$p['produk_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header border-0 ">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Peringatan !</h1>
        <button type="button" class="btn-close shadow-none " data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-grid ">
                <div class="alert alert-light text-center">
                         Yakin ingin menghapus Produk ini?
                </div>
                <form action="" method="post" class="d-grid align-content-start" >
                                                <input type="hidden" name="id" value="<?=$p['produk_id']?>">
                                                <div class="d-flex ps-auto">
                                                        <button class="btn btn-sm btn-danger border shadow-none fs-6 ms-auto " name="hapusproduk" type="submit">Hapus</button>
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




<div class="modal fade" data-bs-backdrop="false" id="tambahProduk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header border-0 ">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah</h1>
        <button type="button" class="btn-close shadow-none " data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-grid ">
            <form action="" method="post" class="d-grid align-content-start" enctype="multipart/form-data">
                <div class="form-floating mb-3">
                    <select name="pemasok" id="pemasok" class="form-control shadow-none ">
                        <option value="">Pilih</option>
                        <?php 
                            $pemasok=q("select * from pemasok");
                            foreach ($pemasok as $sp) { ?>
                               <option value="<?=$sp['pemasok_id']?>"><?=$sp['nama_pemasok']?></option>
                           <?php }
                        ?>
                    </select>
                    <label for="">pemasok</label>
                </div>
				<div class="form-floating mb-3">
                    <select name="kategori" id="kategori" class="form-control shadow-none ">
                        <option value="">Pilih</option>
                        <?php 
                            $kategori=q("select * from kategori");
                            foreach ($kategori as $sk) { ?>
                               <option value="<?=$sk['kategori_id']?>"><?=$sk['nama_kategori']?></option>
                           <?php }
                        ?>
                    </select>
                    <label for="">Kategori</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="nama" id="nama" required placeholder="nama" class="form-control shadow-none ">
                    <label for="">Nama</label>
                </div>
                <!-- <div class="form-floating mb-3">
                    <input type="text" name="slug" id="slug" required placeholder="slug" class="form-control shadow-none ">
                    <label for="">Slug</label>
                </div> -->
                <div class="row row-cols-3 g-3">
                    <div class="col d-grid">
                        <div class="form-floating mb-3">
                            <input type="number" name="stok" id="stok" required placeholder="stok" class="form-control shadow-none ">
                            <label for="">Stok</label>
                        </div>
                    </div>
                    <div class="col d-grid">
                        <div class="form-floating mb-3">
                            <input type="number" name="berat" id="berat" required placeholder="berat" class="form-control shadow-none ">
                            <label for="">Berat</label>
                        </div>
                    </div>
					<div class="col d-grid">
                        <div class="form-floating mb-3">
                            <input type="number" name="harga" id="harga" required placeholder="harga" class="form-control shadow-none ">
                    <label for="">Harga</label>
                        </div>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <textarea style="height: 125px;"  name="keterangan" id="keterangan" required placeholder="keterangan" class="form-control shadow-none "></textarea>
                    <label for="">Keterangan</label>
                </div>
                <div class="form-floating mb-3">
                    <input accept="image/png, image/jpeg" or accept=". png, . jpg, . jpeg" type="file" name="gambar" id="gambar" required placeholder="gambar" class="form-control shadow-none ">
                    <label for="">gambar</label>
                </div>

                <div class="d-flex ps-auto">
                        <button class="btn btn-sm btn-primary border shadow-none fs-6 ms-auto border-0" name="simpanProduk" type="submit">Simpan</button>
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