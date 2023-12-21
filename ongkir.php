<?php 

    function rupiah($angka){
      return "Rp. " . number_format($angka,2,',','.');
    }

    if(isset($_POST['angka'])){
      $angka=$_POST['angka'];
      echo rupiah($angka);
    }


    if(isset($_POST['tujuan']) && isset($_POST['berat']) and isset($_POST['kurir'])){

      $tujuan=$_POST['tujuan'];
      $berat=$_POST['berat'];
      $kurir=$_POST['kurir'];
      $balasan=[];
      
      $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "origin=364&destination=$tujuan&weight=$berat&courier=$kurir",
      CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded",
        "key:44c127734c7fbd08f501c5ca1cd1ef4f"
      ),
    ));
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    
    curl_close($curl);
    
   $arr=json_decode($response,TRUE);
   $arr=$arr["rajaongkir"]["results"];
    foreach ($arr as $a) {
          if (is_array($a)) {
            $nn=$a["costs"];
            foreach ($nn as $d) {
              $nama=$d["service"]." (".$d["description"].")";
              $i=$d['cost'][0];
              $harga=$i['value'];
              $estimasi=$i['etd'];
              $nama=$nama." (".$estimasi." hari)";

              echo "<option value='$harga'>$nama</option>";
              
              // $balasan=[
              //     'nama'=>$nama,
              //     'harga'=>$harga,
              //     'lama'=>$estimasi 
              // ];
            }
          }
        }
      }
?>