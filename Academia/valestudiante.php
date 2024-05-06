<?php
    ob_start(); // Inicia el búfer de salida
    session_start();
    include 'conexionbd.php';

    // Recibimos las credenciales del formulario
    $correo = $_POST['txtcorreo'];
    $contrasena = $_POST['txtcontrasena'];

    $resultado = $cnx->query("SELECT * FROM estudiante WHERE correo = '$correo' AND contrasena = '$contrasena'");

    if ($resultado->num_rows > 0) {        
        $_SESSION['usuario'] = $correo; // Puedes almacenar más información de la sesión aquí
        header("Location: listaNotas.php"); // Realiza la redirección
        ob_end_flush(); // Limpia y desactiva el búfer de salida
        exit();
    } else {        
        $_SESSION['mensaje'] = "Credenciales no válidas.";
        header("Location: iniciarsesion.php");
        exit();
    }
?>