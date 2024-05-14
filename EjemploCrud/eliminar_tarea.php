<?php
require_once 'config.php';

if (!empty($_POST['id'])) {
    $id = $_POST['id'];

    $sql = $pdo->prepare("DELETE FROM tareas WHERE id = :id");
    $sql->execute(['id' => $id]);

    echo "Tarea eliminada correctamente. <a href='index.php'>Volver a la lista de tareas</a>";
    header("location: tareas.php");
} else {
    echo "ID de tarea no especificado. <a href='index.php'>Volver a la lista de tareas</a>";
}
?>
