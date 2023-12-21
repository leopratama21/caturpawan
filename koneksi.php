<?php 
	// sesi dimulai
    session_start();

	// supaya panggil tidak menyertakan mysqli_query($con, sql perintah) lagi, melainkan langsung q();
	function q($q){
        $ss=new mysqli("localhost","root","","db_caturpawan");
        return $ss->query($q);
        $ss->close();
    }

	// konfirmasi pesanan diterima
    if(isset($_POST['idpesanankonfirmasi'])){
        $idpesanan=$_POST['idpesanankonfirmasi'];
        q("update pesanan set info_pesanan='Paket Diterima' where pesanan_id='$idpesanan'");
    }
    
	// ke rupiah
    function rupiah($angka){
        return "Rp. " . number_format($angka,2,',','.');
    }
	
	// jumlah
    function jumlah($tbl){
        $ju=q("select count(*) from $tbl");
         return $ju->fetch_array()[0];
    }

	// --------------------------------------------------------------------------------------------------------
	// ------------------------------------------ Tambah Kurang Keranjang -------------------------------------

	// tambah jumlah produk (+)
    if(isset($_POST['tambahjumlahproduk'])){
        $id=$_POST['id'];
        $keranjang=q("select keranjang.*,produk.* from keranjang,produk where keranjang_id='$id' and produk.produk_id=keranjang.id_produk");
        $keranjang=$keranjang->fetch_array();
        $stok=$keranjang['stok_produk'];
        $jumlahqty=$keranjang['qty_keranjang']+1;
        if ($jumlahqty<=$stok) {
            $idkeranjang=$keranjang['keranjang_id'];
            q("update keranjang set qty_keranjang='$jumlahqty' where keranjang_id='$idkeranjang'");
            $a="success";
            $b="Jumlah produk dalam keranjang telah diperbarui.";
        }
    }    
	// kurang jumlah Produk (-)
    if(isset($_POST['kurangijumlahproduk'])){
        $id=$_POST['id'];
        $keranjang=q("select * from keranjang where keranjang_id='$id'");
        $keranjang=$keranjang->fetch_array();
        $jumlahqty=$keranjang['qty_keranjang']-1;
        if ($jumlahqty>0) {
            $idkeranjang=$keranjang['keranjang_id'];
            q("update keranjang set qty_keranjang='$jumlahqty' where keranjang_id='$idkeranjang'");
            $a="success";
            $b="Jumlah produk dalam keranjang telah diperbarui.";
        }else{
            q("delete from keranjang where keranjang_id='$id'");
        }
    }
	
	// --------------------------------------------------------------------------------------------------------
	// -------------------------------------------------- CRUD ------------------------------------------------
	
	// crud pesanan
    if(isset($_POST['simpanpesanan'])){
        $no=rand(10000000000,99999999999);
        $noresi=('menunggu konfirmasi');
        $token=rand(1000000000000000,9999999999999999);
        $np="NP".$no;
        $now=date("Y-m-d H:i:s");
        $uid=user()['user_id'];
        $si=q("insert into pesanan values('','$_POST[id_pesanan]','$uid','$np','$noresi','$_POST[nama]','$_POST[nohp]','$_POST[berat]','$_POST[kurir]','$_POST[layanan]','$_POST[totalharga]','$_POST[ongkir]','$_POST[totalbayar]','$_POST[alamat]','Belum Bayar','$now','Di Proses')");
        $pesanan=q("select * from pesanan where id_user='$uid' order by pesanan_id desc limit 1");
        $pesanan=$pesanan->fetch_array();
        $idpesanan=$pesanan['pesanan_id'];
        $keranjang=q("select keranjang.*,produk.* from keranjang,produk where keranjang.id_user='$uid' and keranjang.id_produk=produk.produk_id");
                foreach ($keranjang as $kr) {
                    q("insert into detail_pesanan values('','$idpesanan','$uid','$kr[produk_id]','$kr[nama_produk]','$kr[harga_produk]','$kr[qty_keranjang]','$now')");
                }
        $hapuskeranjang=q("delete from keranjang where keranjang.id_user='$uid'");
        header("location:pesanan.php");
    }
	// ---- delete fitur baru --- ok
	if(isset($_POST['hapuspesanan'])){
        q("delete from pesanan where pesanan_id='$_POST[id]'");
        $a="primary";
        $b="Pesanan Berhasil di hapus";   
    }
	// ---- update --- ok
	if(isset($_POST['updatepesanan'])){
        q("update pesanan set no_resi='$_POST[no_resi]',info_pesanan='$_POST[info_pesanan]' where pesanan_id='$_POST[id]'");
        $a="primary";
        $b="Pesanan Berhasil di update";
    }
	// ---- update untuk bukti --- error
	if(isset($_POST['update_bukti'])){
        q("update pesanan set gambar_bukti='$_POST[info_pesanan]' where pesanan_id='$_POST[id]'");
        $a="primary";
        $b="Pesanan Berhasil di update";
    }


	// crud keranjang
    // ---- cread
	if(isset($_POST['tamabahkeranjang'])){
        $id=$_POST['id'];
        $uid=user()['user_id'];
        $keranjang=q("select * from keranjang where id_produk='$id' and id_user='$uid'");
        if ($keranjang->num_rows<1) {
            q("insert into keranjang values('','$uid','$id','1')");
            $a="primary";
            $b="Produk Berhasil ditambahkan di keranjang";
        }else{
            $keranjang=$keranjang->fetch_array();
            $jumlahqty=$keranjang['qty_keranjang']+1;
            $idkeranjang=$keranjang['keranjang_id'];
            q("update keranjang set qty_keranjang='$jumlahqty' where keranjang_id='$idkeranjang'");
            $a="success";
            $b="Jumlah produk dalam keranjang telah diperbarui.";
        }
    }
	// ---- delete
    if(isset($_POST['hapuskeranjang'])){
        $id=$_POST['id'];
        q("delete from keranjang where keranjang_id='$id'");
    }

	// crud produk
	// ---- delete
    if(isset($_POST['hapusproduk'])){
        $id=$_POST['id'];
        $produk=q("select * from produk where produk_id='$id'");
        $produk=$produk->fetch_array();
        $gambar=$produk['gambar_produk'];
        unlink($gambar);
        q("delete from produk where produk_id='$id'");
        $a="primary";
        $b="Produk Berhasil di hapus";
    }
	// ---- update
    if(isset($_POST['updateproduk'])){
        $id=$_POST['id'];
        $produk=q("select * from produk where produk_id='$id'");
        $produk=$produk->fetch_array();
        $gambar=$produk['gambar_produk'];
        if($_FILES['gambar']['size']!=0){
            unlink($gambar);
            $lokasi="img/produk/".uniqid().$_FILES['gambar']['name'];
            $file= move_uploaded_file($_FILES['gambar']['tmp_name'],$lokasi);
            $gambar=$lokasi;
        }
        q("update produk set id_kategori='$_POST[kategori]',id_pemasok='$_POST[pemasok]',nama_produk='$_POST[nama]',harga_produk='$_POST[harga]',stok_produk='$_POST[stok]',berat_produk='$_POST[berat]',keterangan_produk='$_POST[keterangan]',gambar_produk='$gambar' where produk_id='$id'");
            $a="primary";
            $b="Produk Berhasil di update";
    }
	// ---- cread
	if(isset($_POST['simpanProduk'])){
        $lokasi="img/produk/".uniqid().$_FILES['gambar']['name'];
        $file= move_uploaded_file($_FILES['gambar']['tmp_name'],$lokasi);
        $slug=$_POST['nama'].uniqid();
        q("insert into produk values('','$_POST[kategori]','$_POST[pemasok]','$_POST[nama]','$slug','$_POST[harga]','$_POST[stok]','$_POST[berat]','$_POST[keterangan]','$lokasi')");
            $a="primary";
            $b="Produk Berhasil tersimpan";
	}

	// crud user tambahan fitur
	// ---- delete ---ok
	if(isset($_POST['hapuspengguna'])){
        q("delete from user where user_id='$_POST[id]'");
        $a="primary";
        $b="Pelanggan Berhasil di hapus";   
    }
	// ---- update ---ok
	if(isset($_POST['updatepengguna'])){
        q("update user set nama_user='$_POST[nama_user]',email_user='$_POST[email_user]',no_hp='$_POST[no_hp]' where user_id='$_POST[id]'");
        $a="primary";
        $b="Pelanggan Berhasil di update";
    }

	// crud pemasok
    // ---- delete
	if(isset($_POST['hapuspemasok'])){
        q("delete from pemasok where pemasok_id='$_POST[id]'");
        $a="primary";
        $b="Pemasok Berhasil di hapus";   
    }
	// ---- update
    if(isset($_POST['updatepemasok'])){
        q("update pemasok set nama_pemasok='$_POST[nama]',alamat_pemasok='$_POST[alamat]',keterangan_pemasok='$_POST[keterangan]' where pemasok_id='$_POST[id]'");
        $a="primary";
        $b="Pemasok Berhasil di update";
    }
	// ---- cread
    if(isset($_POST['simpanpemasok'])){
        q("insert into pemasok values ('','$_POST[nama]','$_POST[alamat]','$_POST[keterangan]')");
        $a="primary";
        $b="Pemasok Berhasil di simpan";
    }
	
	// crud kategori
	// ---- delete
    if(isset($_POST['hapuskategori'])){
        $id=$_POST['id'];
        $kategori=q("select * from kategori where kategori_id='$id'");
        $kategori=$kategori->fetch_array();
        $gambar=$kategori['gambar_kategori'];
        unlink($gambar);
        q("delete from kategori where kategori_id='$id'");
        $a="primary";
        $b="Kategori berhasil di hapus";
    }
	// ---- update
    if (isset($_POST['editkategory'])) {
        $id=$_POST['id'];
        $kategori=q("select * from kategori where kategori_id='$id'");
        $kategori=$kategori->fetch_array();
        $gambar=$kategori['gambar_kategori'];
        if($_FILES['gambar']['size']!=0){
            unlink($gambar);
            $lokasi="img/kategori/".uniqid().$_FILES['gambar']['name'];
            $file= move_uploaded_file($_FILES['gambar']['tmp_name'],$lokasi);
            $gambar=$lokasi;
        }
        q("update kategori set nama_kategori='$_POST[nama]',gambar_kategori='$gambar' where kategori_id='$id'");
            $a="primary";
            $b="Kategori berhasil di update";
    }
	// ---- cread
	if (isset($_POST['simpankategory'])) {
		$lokasi="img/kategori/".uniqid().$_FILES['gambar']['name'];
		$file= move_uploaded_file($_FILES['gambar']['tmp_name'],$lokasi);
		q("insert into kategori values('','$_POST[nama]','$_POST[nama]','$lokasi')");
        $a="primary";
        $b="Kategori berhasil tersimpan";
    }
	
    // crud bukti fitur baru
	// ---- cread --- ok
	if (isset($_POST['simpan_bukti'])) {
		$rand = rand(10, 50);
		$lok="img/bukti/".uniqid().$_FILES['gambar']['name'];
		$file= move_uploaded_file($_FILES['gambar']['tmp_name'],$lok);
		q("insert into bukti values('$rand','$_POST[id_pesanan]','$lok')");
        $a="primary";
        $b="pembayaran berhasil";
    }

	// -----------------------------------------------------------------------------------------------------------
	// ------------------------------------------------- LOGIN ---------------------------------------------------
	
    function admin($email,$password,$nama,$nohp){
        $q=q("select email from user where email='$email'");
        $baris=$q->num_rows;
        if (($baris)<1) {
            $poto="img/user/user.png";
            $pas=sha1($password);
            q("insert into user values('','$nama','$email','$nohp','$pas','$poto','admin')");
            $a="primary";
            $b="pendaftaran berhasil";
        }else{
            $a="warning";
            $b="Email sudah terdaftar";
        }
    }

    function user(){
        return $_SESSION['user'];
    }
	
	// keluar
    if(isset($_POST['keluar'])){
        session_destroy();
        header("location:login.php");
    }
    
    // Masuk
    if(isset($_POST['masuk'])){
        $pas=sha1($_POST['password']);
        $q=q("select * from user where email_user='$_POST[email]' and password='$pas'");
        $baris=$q->num_rows;
        if (($baris)>0) {
            $q=$q->fetch_array();
            $_SESSION['user']=$q;
            $a="primary";
            $b="Login berhasil";
            include "ceklogin.php";
        }else{
            $a="warning";
            $b="Email atau password salah";
        }
    }
	// Daftar
    if(isset($_POST['daftar'])){
        $q=q("select email_user from user where email_user='$_POST[email]'");
        $baris=$q->num_rows;
        if (($baris)<1) {
            $poto="img/user/user.png";
            $pas=sha1($_POST['password']);
            q("insert into user values('','$_POST[nama]','$_POST[email]','$_POST[nohp]','$pas','$poto','user')");
            $a="primary";
            $b="Pendaftaran berhasil";
        }else{
            $a="warning";
            $b="Email sudah terdaftar";
        }
    }
?>