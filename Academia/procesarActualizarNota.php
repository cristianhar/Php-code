<?php
    session_start();
    include 'conexionbd.php';

    if (!isset($_SESSION['usuario'])) {
        header('Location: iniciarsesion.php');
        exit();
    }    

    // actualizar la nota
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btnactualizar'])) {
        $id = $_POST['id'];
        
        $codasig = $_POST['txtasignatura'];
        $periodo = $_POST['periodo'];
        $nota1 = $_POST['txtnota1'];
        $nota2 = $_POST['txtnota2'];
        $nota3 = $_POST['txtnota3'];

        $stmt = $cnx->prepare("UPDATE nota SET codasig = ?, periodo = ?, notam1 = ?, notam2 = ?, notam3 = ? WHERE id_nota = ?");
        $stmt->bind_param("ssdddi", $codasig, $periodo, $nota1, $nota2, $nota3, $id);
        $stmt->execute();
        
        if($stmt->affected_rows > 0){
            $_SESSION['mensaje'] = "Información actualizada con éxito.";
        } else {
            $_SESSION['mensaje'] = "No se pudo actualizar la información.";
        }
        
        header('Location: listaNotas.php');
        exit();
    }
?>