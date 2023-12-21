<?php 
    $curl = curl_init();


    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.rajaongkir.com/starter/city?id=39&province=5",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 100,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "key:44c127734c7fbd08f501c5ca1cd1ef4f"
      ),
    ));
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    
    curl_close($curl);
    
   $arr=json_decode($response,TRUE);
   $arr=$arr["rajaongkir"]["results"];
   foreach ($arr as $k) {
      // $namakurir=$k['service'];

     var_dump($k);
    
   }
?>