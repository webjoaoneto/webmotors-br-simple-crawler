<?php

/* get_modelos */
$pdo = new PDO ("mysql:host=localhost;dbname=marcas_modelos_variacoes","root","root");
$pdo->exec("SET CHARACTER SET utf8");

function _get_modelos( $id_marca ) {
  $headers = array(
    'Host: www.webmotors.com.br',
    'Referer: http://www.webmotors.com.br/',
    'User-Agent: Mozilla/5.0 (X11; Linux x86_64; rv:18.0) Gecko/20100101 Firefox/18.0',
    'X-Requested-With: XMLHttpRequest',
    );

  $curl = curl_init( "http://www.webmotors.com.br/carro/modelos" ); 
  curl_setopt($curl,CURLOPT_HTTPHEADER,$headers);
  curl_setopt($curl, CURLOPT_HEADER, 0);
  curl_setopt($curl, CURLOPT_POST, 1);
  curl_setopt($curl, CURLOPT_POSTFIELDS,  array('marca' => $id_marca ) );
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 

  $output = curl_exec($curl);
  return $output;
}


foreach( $pdo->query( "SELECT * FROM marcas" ) as $row ) {
  $modelos = _get_modelos( $row['id_marca'] );

  $modelos_arr = json_decode($modelos);
  

  if($modelos_arr) {
    foreach($modelos_arr as $modelo ) {
      $pdo->query( "INSERT INTO modelos(id_modelo,id_marca,modelo) VALUES
	      ( {$modelo->Id}, {$row['id_marca']}, '{$modelo->Nome}' ) " );
    }
  }
}