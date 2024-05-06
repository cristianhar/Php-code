<?php
    session_start();
    include 'conexionbd.php';

    if (!isset($_SESSION['usuario'])) {
        header('Location: iniciarsesion.php');
        exit();
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Preparar la consulta para inactivar la nota
        $stmt = $cnx->prepare("UPDATE nota SET activo = false WHERE id_nota = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $_SESSION['mensaje'] = "El registro se ha inactivado con éxito.";
        } else {
            $_SESSION['mensaje'] = "No se pudo inactivar el registro.";
        }
    }

    header('Location: listaNotas.php');
    exit();
?>