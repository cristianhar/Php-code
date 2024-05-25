<?php
include_once 'config.php';

session_start();


if (!isset($_SESSION['username'])) {

    header("Location: login.php");
    exit;
}
$email = $_GET['email'];

//Instruccion delete
$sql = "DELETE FROM tblpersona WHERE email=:email";

$query = $pdo->prepare($sql);
$query->execute([
    'email' => $email
]);

//Ejecutar en el archivo listar.php
header("Location:listar.php");
