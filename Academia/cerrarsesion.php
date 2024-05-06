<?php
    session_start();
    session_destroy();//Eliminar el contenido de todas de las variables de sesión
    header('location: iniciarsesion.php');
?>