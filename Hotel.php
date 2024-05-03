<?php


class Hotel{


var $dias;
var $cantidad;


function cobrarConIva($precio)
{
    $precioConIva = $precio + ($precio * 0.16);
    echo "Precio con Iva : " .$precioConIva ."<br>";
}

function cobrar($cantidad, $dias)
{
if(cantidad == 1){
$precio = 2500 * $dias;
}
else if(cantidad  == 2){
$precio = 4600 * $dias;
}
else if(cantidad == 3){

$precio = 5200 * $dias;
}

    $this->cobrarConIva($precio);
}


}



?>