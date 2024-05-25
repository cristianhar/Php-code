<?php
require_once 'config.php';

session_start();


if (!isset($_SESSION['username'])) {

    header("Location: login.php");
    exit;
}
if (!empty($_POST['id'])) {
    $id = $_POST['id'];

    $sql = $pdo->prepare("DELETE FROM productos WHERE id = :id");
    $sql->execute(['id' => $id]);

    echo "Producto eliminado correctamente. <a href='productos.php'>Volver a la lista de productos</a>";
    header("location: productos.php");
} else {
    echo "ID de tarea no especificado. <a href='index.php'>Volver a la lista de productos</a>";
}
