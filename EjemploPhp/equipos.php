<?php
$nomEquipos = array($_POST["txtequipo1"], $_POST["txtequipo2"]);

echo $nomEquipos[0],
"<br>", $nomEquipos[1], "<hr>";

print_r($nomEquipos);

echo "<hr>";

var_dump($nomEquipos);
