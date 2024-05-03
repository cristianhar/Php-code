<?php
/*
//Crear funcion sin parametros
function saludar()
{
    echo "Como estan?";
    echo "<br>";
}

//Usar (ejecutar) la funcion
saludar();

//Funcion con parametros
function saludo($nombre){
    echo "Como estas " . $nombre;
    echo "<br>";
}

//Usarla
saludo('Maria');
saludo('Juan');
echo "<hr>";
*/

//Funcion con return
function sum($a, $b, $c){
    $resultado = ($a + $b + $c);
    return $resultado;
}

//sum(2,4);
//echo "el resultado es: ".$resultado;
//$k = sum(2,4);
//echo $k;

//Usar
//sum(5, 9);
//echo "Total: " . $resultado;
//$c = sum(5, 9);
//echo $c;

echo "<BR>"."<BR>";

function mostrarSuma(){
    $c = sum(11, 9, 10);
    
    //echo "Total: " . $c;
    //echo "Total: {$c} pesos";
    //echo "Total: $c diner";
    $c = sum(11, 6, 5);

    echo "Total: " , $c , " dolares";
}

mostrarSuma();
