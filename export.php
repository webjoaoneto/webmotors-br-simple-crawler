<?php

$file_marcas = explode("\n", file_get_contents('marcas.txt'));
$pdo = new PDO ("mysql:host=localhost;dbname=marcas_modelos_variacoes","root","root");
$pdo->exec("SET CHARACTER SET utf8");

foreach($file_marcas as $m ) {
	$f = explode(',',$m);
	$id = $f[0];
	$marca =$f[1];

	var_dump($pdo->query( "INSERT INTO marcas(id_marca,nome) values($id, '$marca')" ));
}
