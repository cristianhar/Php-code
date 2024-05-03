<?php
// Definir los datos de los equipos y jugadores en un array asociativo
$datos_equipos = array(
    "DIM" => array("jugadores" => 3, "precio" => 3000000),
    "Nacional" => array("jugadores" => 5, "precio" => 2100000),
    "Envigado" => array("jugadores" => 2, "precio" => 1650000),
    "Águilas" => array("jugadores" => 4, "precio" => 350000)
);

$total_jugadores = 0;
$inversion_total = 0;


$file = fopen("inversion.txt", "w");


fwrite($file, "EQUIPO\tJUGADORES\tPRECIO\tINVERSIÓN\n");

$equipos = array_keys($datos_equipos);
for ($i = 0; $i < count($equipos); $i++) {
    $equipo = $equipos[$i];
    $jugadores = $datos_equipos[$equipo]['jugadores'];
    $precio = $datos_equipos[$equipo]['precio'];
    $inversion = $jugadores * $precio;
    $total_jugadores += $jugadores;
    $inversion_total += $inversion;

  
    echo "$equipo, $jugadores jugadores, $precio €, inversión: $inversion €<br>";


    fwrite($file, "$equipo\t$jugadores\t$precio €\t$inversion €\n");
}


fwrite($file, "TOTALES\t$total_jugadores\t\t$inversion_total €\n");


echo "TOTAL: $total_jugadores jugadores, inversión total: $inversion_total €<br>";


fclose($file);

echo "Se ha generado el archivo 'inversion.txt' con los resultados.";
?>
