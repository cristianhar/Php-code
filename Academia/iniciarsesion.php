<?php
    //Habilitar la visualización de errores en PHP
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
    
    session_start();
    include 'conexionbd.php';

    if (isset($_SESSION['mensaje'])) {
        echo "<div class='alert alert-success'>".$_SESSION['mensaje']."</div>";
        unset($_SESSION['mensaje']); // Limpia el mensaje para futuras peticiones.
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Estudiante</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>    
    <h1>Conexión al Sistema de Estudiantes</h1>
    <form action="valestudiante.php" method="post">
        <div class="form-group col-sm-6">
            Correo
            <input type="text" id="txtcorreo" name="txtcorreo" class="form-control">
        </div>    
        <div class="form-group col-sm-6">
            Contraseña
            <input type="password" id="txtcontrasena" name="txtcontrasena" class="form-control">
        </div>
        <br>        
        <button type="submit" class="btn btn-primary" name="btniniciarsesion">Iniciar Sesión</button>
        <a href="registro.php" class="btn btn-info" id="btnregistrar" name="btnregistrar">Registrar</a>
    </form>    
</body>
</html>