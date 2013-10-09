<?php

/* get_modelos */
$pdo = new PDO ("mysql:host=localhost;dbname=marcas_modelos_variacoes","root","root");
$pdo->exec("SET CHARACTER SET utf8");

function _get_variacoes( $id_modelo ) {
  $headers = array(
    'Host: www.webmotors.com.br',
    'Referer: http://www.webmotors.com.br/',
    'User-Agent: Mozilla/5.0 (X11; Linux x86_64; rv:18.0) Gecko/20100101 Firefox/18.0',
    'X-Requested-With: XMLHttpRequest',
    );

  $curl = curl_init( "http://www.webmotors.com.br/comprar/existeversoes" ); 
  curl_setopt($curl,CURLOPT_HTTPHEADER,$headers);
  curl_setopt($curl, CURLOPT_HEADER, 0);
  curl_setopt($curl, CURLOPT_POST, 1);
  curl_setopt($curl, CURLOPT_POSTFIELDS,  array('modelo' => $id_modelo ) );
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 

  $output = curl_exec($curl);
  return $output;
}


foreach( $pdo->query( "SELECT * FROM modelos" ) as $row ) {
  $modelos = _get_variacoes( $row['id_modelo'] );

  $variacoes_arr = json_decode($modelos);

  if($variacoes_arr) {
    foreach($variacoes_arr->itens as $variacao ) {
      $pdo->query( "INSERT INTO variacoes(id_variacao,id_modelo,variacao) VALUES
	      ( {$variacao->Id}, {$row['id_modelo']}, '{$variacao->Nome}' ) " );
    }
  }
}