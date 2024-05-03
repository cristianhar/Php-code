<?php

//Requerir la class
require 'Persona.php';

//Instanciar la class
$personaUno = new Persona();


//Agirnar a las propiedades de la class los datos del form
$personaUno->id = $_POST['txtid'];
$personaUno->nombre = $_POST['txtnombre'];

//Mostrar las propiedades
echo "Su id " . $personaUno->id .
" y su nombre " . 
$personaUno->nombre . " ";

//Utilizar los metodos
//$personaUno->estado();

$personaUno->correr("va a correr mucho");
$personaUno->arrancar();