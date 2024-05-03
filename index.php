<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad Ejercicios</title>
</head>
<body>
    <style>

        li{
            list-style: none;
        }
        .contenedor ul{
        width: 100%; 
        justify-content: space-evenly;
        display: flex;
        align-items: center;
        grid: flex;
        }
    </style>
    <header>
    <h1>La hamburguesa de Sara</h1>
    </header>

    <nav class="contenedor">
    <ul>
    <a href="ejercicio1.php"><li>Ejercicio #1</li></a>
    <a href="ejercicio2.php"><li>Ejercicio #2</li></a>
    <a href="ejercicio3.php"><li>Ejercicio #3</li></a>
    <a href="ejercicio4.php"><li>Ejercicio #4</li></a>

    </ul>


    </nav>
    <section>  <h2> Explicacion </h2></section>
<?php 

//Variables String
$greeting = "Hola";
$thing="Mundo";
$greet=$greeting ." ". $thing;
echo $greet ;

//Variables Numericas
$numer_one = 10;

//Variable booleana
$active = true;

//Arrays
$user = array(
"name" => "Johao",
"firstName" => "Arboleda",
"lastName" => "Henao",
"email" => "cristianj_arboleda@soy.sena.edu.co"
);
echo "<br>";
echo "El usuario es " . $user["name"] ."  el correo es : " .$user["email"];

?>


    <br><br><br><br>
    <footer>
     &copy;Autorizado por XHub - 2024 2026

    </footer>
</body>
</html>