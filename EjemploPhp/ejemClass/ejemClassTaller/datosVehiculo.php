<?php

//Requerir la class
require 'Vehiculo.php';

//Instanciar la class
$myCar = new Vehiculo();

//Llevar los datos a las propiedades de la class
$myCar->placa = $_POST['txtplaca'];
$myCar->marca = $_POST['txtmarca'];
$myCar->linea = $_POST['txtlinea'];
$myCar->matricula = $_POST['txtmatricula'];
$myCar->modelo = $_POST['txtmodelo'];

//Mostrar informacion
// print("Su vehículo con placa " . 
// $myCar->placa . " de marca " .
// $myCar->marca . " esta "); $myCar->estado();
$myCar->estado();