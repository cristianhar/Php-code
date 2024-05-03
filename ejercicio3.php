<?php
// $tarifas = array(
// "INDIVIDUAL" => 2500,
// "DOBLE" => 4600,
// "FAMILIAR" => 5200
// );

// $cantidad_personas  = 1;
// $dias_hospedaje = 4;
// $precio_con_iva= 0;
// $precio_con_descuento=0;
// if($cantidad_personas == 1){

//     $precio_hospedaje = $tarifas['INDIVIDUAL'] * $dias_hospedaje;
//     $precio_con_iva = $precio_hospedaje + ($precio_hospedaje * 0.16);
//     $precio_con_descuento = $precio_con_iva - ($precio_con_iva * 0.05);

// }
// else if($cantidad_personas == 2){

//     $precio_hospedaje = $tarifas['DOBLE'] * $dias_hospedaje ;
//     $precio_con_iva = $precio_hospedaje + ($precio_hospedaje * 0.16);
//     $precio_con_descuento = $precio_con_iva - ($precio_con_iva * 0.09);
// }
// else if($cantidad_personas == 3){

//     $precio_hospedaje = $tarifas['FAMILIAR'] * $dias_hospedaje;
//     $precio_con_iva = $precio_hospedaje + ($precio_hospedaje * 0.16);
//     $precio_con_descuento = $precio_con_iva - ($precio_con_iva * 0.15);

// }

// echo "HOTEL WC <br>";
// echo "Precio sin Iva : " .$precio_hospedaje ."<br>";
// echo "Precio con Iva : " .$precio_con_iva ."<br>";
// echo "Precio con descuento " .$precio_con_descuento;


require 'Hotel.php';


$hotel = new Hotel();
$hotel->cantidad = $_POST['txtpersonas'];
$hotel->dias = $_POST['txtdias'];

//Mostrar las propiedades
echo "Cantidad Personas : " . $hotel->cantidad .
" y Cantidad de dias:  " . 
$hotel->dias . " ";
$hotel->cobrar($hotel->cantidad, $hotel->dias);

?>