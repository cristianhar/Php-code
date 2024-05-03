<?php
    include_once 'config.php';

    $nombre = $_GET['nombre'];

    //Instruccion delete
    $sql = "DELETE FROM tblpersona WHERE nombre=:nombre";

    $query = $pdo->prepare($sql);
    $query->execute([
        'nombre' => $nombre
    ]);

    //Ejecutar en el archivo listar.php
    header("Location:listar.php");
    