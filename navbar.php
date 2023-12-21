
<nav style="background-color:#18C0FC;" class="navbar position-fixed fixed-top navbar-expand-lg navbar-light shadow-1 container" >
        <div class="container" >
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <a class="navbar-brand mt-lg-0 fw d-none d-lg-flex btn btn-primary p-2 ps-3 pe-3 rounded-fill fs-6 " href="index.php"style="color:#FFFFFF;">
                     Toko Catur Pawan
                </a>
                
            </div>
                <?php  if (isset($_SESSION['user'])) {
                    ?>
            <div class="d-flex col align-items-center">
                <?php
                    if(user()['level']=='user'){
                ?>
                           
				<form class="p-1 col  d-flex rounded border me-2 me-lg-2 me-md-2 me-sm-2" action="index.php" method="get">
                    <button type="submit" class="btn btn-primary p-2 ps-3 pe-3 rounded-fill fs-6 ">
                        <i class="bi bi-search"></i>
                    </button>
					<input required placeholder="Search" value="<?php
                         if (isset($_GET['q'])) {
                            echo $_GET['q'];
                         }
                    ?>" name="q" type="search" class="form-control border-0 shadow-0">
                    
                </form>
				
				<a class="btn btn-primary p-2 ps-3 pe-3 rounded-fill fs-6 bi bi-cart ms-2" href="keranjang.php"></a>   
					&nbsp;
                <?php }?>
                <div class="dropdown ms-auto ">
                    <!--
					<a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        <div class="ratio ratio-1x1 bg-light rounded-pill bg-image border" style="width: 33px; background-image: url('<?=user()['foto']?>');"></div>
                    </a>
					-->
					 <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        <div class="ratio ratio-1x1 bg-light rounded-pill bg-image border" style="width: 33px; background-image: url('img/user/1652076402.png');"></div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                    <li>
                        <a class="dropdown-item" href="index.php">Home</a>
                        </li>
                    <?php
                    if(user()['level']=='user'){
                     ?>
                        <li>
                            <a class="dropdown-item" href="pesanan.php">Pesanan</a>
                        </li>
                        <?php }else{?>
                        <li>
                            <a class="dropdown-item" href="kategory.php">Kategori</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="pemasok.php">Pemasok</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="produk.php">Produk</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="pelanggan.php">Pelanggan</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="pesananadmin.php">Pesanan</a>
                        </li>
                         <li>
                            <a class="dropdown-item" href="laporan.php">Laporan</a>
                        </li>
						<?php }?>
                        <li>
                            <form action="" method="post">
                                <button type="submit" name="keluar" class="dropdown-item" href="#">Keluar</button>
                            </form>
                        </li>
                    </ul>
                </div>
                
            </div>
                <?php } ?>
        </div>
    </nav>