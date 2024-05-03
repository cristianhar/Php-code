<?php 

//arrays
$articulos = array(
"Zapatos" => 350000,
"Tenis" => 280000,
"Camisetas" => 175000,
"Jeans" => 200000
);

$costo_total = $articulos["Zapatos"] + $articulos["Tenis"] + $articulos["Camisetas"] + $articulos["Jeans"] ;
$promedio_venta = $costo_total/4;
$precio_jean_aumento = $articulos["Jeans"] + ($articulos["Jeans"] * 6.2/100);
$precio_zapato_descuento = $articulos["Zapatos"] - ($articulos["Zapatos"] * 0.8/100);

echo "<br>";
echo "<b>Articulos Listado </b> <br> " . "Zapatos precio : " . $articulos["Zapatos"] ." <br> " ."Tenis precio: " .$articulos["Tenis"].  "<br> "
. "Camisetas precio: " . $articulos["Camisetas"] ." <br> " ."Jeans precio: " . $articulos["Jeans"] ." <br> ";
echo "<br>";
echo " 1.Costo total de todos los articulos : $costo_total <br>";
echo " 2.Promedio de venta : $promedio_venta <br>";
echo " 3.Precio de Jeans con aumento (6.2%) : $precio_jean_aumento<br>";
echo " 4.Precio del zapato con descuento (0.8%) : $precio_zapato_descuento <br><br>";
echo " <b>Precios Viejos </b> <br> Jeans : ". $articulos["Jeans"] . "<br> Zapatos : " .$articulos["Zapatos"] ."<br><br>";
echo " <b>Precios Nuevos </b> <br> Jeans aumento : ". $precio_jean_aumento . "<br> Zapatos con descuento: " .$precio_zapato_descuento;

?>