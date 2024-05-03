<?php
$tipo_proyecto = "C";
$proyecto = array("A" => 20000,"B"=> 10000,"diferente"=> 5000,);
$salario_mensual = 0;
$horas_por_mes= 240;
if($tipo_proyecto =="A")
{
$salario_mensual = $proyecto["A"] * $horas_por_mes;

}

else if($tipo_proyecto == "B")
{
    $salario_mensual = $proyecto["B"] * $horas_por_mes;

}
else if ($tipo_proyecto == "C"){$salario_mensual = $proyecto["diferente"] *  $horas_por_mes;}

if($salario_mensual > 1500000)
{
    echo "Salario Mensual es mayor a tope maximo ";
}

else {
    
        $salario_mensual = $proyecto["diferente"] * $horas_por_mes +(3 * (($proyecto["diferente"]) + ($proyecto["diferente"] * 0.06))) ;
    
}
echo "El sueldo mensual anterior es : " . $salario_mensual = $proyecto["diferente"] *  $horas_por_mes . "<br>";
echo "El salario Mensual del Empleado es  : $salario_mensual <br>";
echo "Valor hora extra :   " . $proyecto["diferente"] + ($proyecto["diferente"] * 0.06);
?>


