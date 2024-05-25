<?php

$dbServidor = 'localhost';
$dbNombre = 'ejinstitucion';
$dbUser = 'root';
$dbPass = '';

try {
	//Conexion con PDO
	$pdo = new PDO("mysql:host=$dbServidor;dbname=$dbNombre", $dbUser, $dbPass);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//ATTR_ERRMODE modo de error que esta ocurriendo
	//ERRMODE_EXCEPTION error que se esta ocacionando
} catch (Exception $e) {
	echo $e->getMessage();
}
