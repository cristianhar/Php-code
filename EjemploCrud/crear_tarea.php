<?php
require_once 'config.php';

if (!empty($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    $sql = $pdo->prepare("INSERT INTO tareas (nombre, descripcion) VALUES (:nombre, :descripcion)");
    $sql->execute(['nombre' => $nombre, 'descripcion' => $descripcion]);

    echo "Tarea creada correctamente.";
    header("Location: tareas.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Tarea</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Crear Tarea</h2>
        <form method="post">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>
</body>
</html>
