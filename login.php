
<?php 
    include "koneksi.php";
    include "ceklogin.php";
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
    <link rel="stylesheet" href="style.css">


    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta2/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css.css">
</head>

<body 
style="background-image: url('img/bg/bg3.jpg'); 
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;">


<div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="card my-1">

          <form class="card-body cardbody-color p-lg-5" action="" method="post">
          <h2 class="text-center text-dark mt-5">Toko Catur Pawan</h2>
            <div class="text-center">
              <img src="img/logo/logo.PNG" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                width="200px" alt="profile">
            </div>

            <div class="d-flex flex-column text-center">
                <?php include "alert.php"; ?>
            </div> 
            <div class="mb-3">
            <h9> Email </h9>
              <input  class="form-control" type="email" name="email" id="email" aria-describedby="emailHelp"
                >
            </div>
            <div class="mb-3">
            <h9> Password </h9>
              <input  class="form-control" type="password" name="password" id="password">
            </div>
            <div class="text-center"><button name="masuk" type="submit" class="btn btn-color px-5 mb-5 w-100">Login</button></div>
            <div id="emailHelp" class="form-text text-center mb-5 text-dark">
              Belum punya akun? <a href="#" data-bs-toggle="modal" data-bs-target="#regis"class="text-dark fw-bold"> Daftar</a>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>




    <div class="modal fade" data-bs-backdrop="false" id="regis" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="position-fixed h-100 w-100" data-bs-dismiss="modal">

        </div>
        <div class="modal-dialog">
            <div class="modal-content">
              
				<div class="modal-header border-0 d-flex justify-content-center">
                    <h1 class="modal-title fs-3 " id="exampleModalLabel">
                        Daftar Akun
                    </h1>
                   
                </div>
			
				</br>
                <div class="modal-body d-grid p-4 pt-0 pb-4">
                    <form class="d-flex flex-column" action="" method="post">
                        <h9> Nama </h9>
                        <div class="form mb-3">
                            <input style="height: 50px;" type="text" name="nama" id="nama" class="form-control rounded border shadow-0">
                        </div>
                        <h9> No Hp </h9>
                        <div class="form mb-3">
                            <input style="height: 50px;" type="number" name="nohp" id="nohp" class="form-control rounded border shadow-0">
                        </div>
                        <h9> Email </h9>
						<div class="form mb-3">
                            <input style="height: 50px;" type="email" name="email" id="email" class="form-control rounded border shadow-0">
                        </div>
                        <h9> Password </h9>
                        <div class="form mb-3">
                            <input style="height: 50px;" type="password" name="password" id="password" class="form-control rounded border shadow-0">
                        </div>
                        <div class="row row-cols-2 g-2">
                            <div class="col d-grid">
                                <button type="button" data-bs-dismiss="modal" class="btn shadow-0 border fs-6 btn-lg">
                                    Batal
                                </button>
                            </div>
                            <div class="col d-grid">
                                <button name="daftar" type="submit" class="btn btn-primary shadow-0 border-0 fs-6 btn-lg">
                                    Daftar
                                </button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>
</body>

</html>