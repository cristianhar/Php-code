<?php
require_once 'config.php';

session_start();


if (!isset($_SESSION['username'])) {

    header("Location: login.php");
    exit;
}
if (!empty($_POST['id'])) {
    $id = $_POST['id'];


    $sql = $pdo->prepare("SELECT estado FROM tareas WHERE id = :id");
    $sql->execute(['id' => $id]);
    $tarea = $sql->fetch(PDO::FETCH_ASSOC);


    if ($tarea && isset($tarea['estado'])) {

        if ($tarea['estado'] == 'Pendiente') {
            $nuevoEstado = 'Completada';
        } elseif ($tarea['estado'] == 'Completada') {
            $nuevoEstado = 'Pendiente';
        }


        $sql = $pdo->prepare("UPDATE tareas SET estado = :estado WHERE id = :id");
        $sql->execute(['estado' => $nuevoEstado, 'id' => $id]);


        header("Location: tareas.php");
        exit;
    } else {
        echo "No se pudo obtener el estado de la tarea.";
    }
} else {
    echo "ID de tarea no especificado.";
}
