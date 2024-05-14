<?php
require_once 'config.php';

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    $sql = $pdo->prepare("SELECT * FROM tareas WHERE id = :id");
    $sql->execute(['id' => $id]);
    $tarea = $sql->fetch(PDO::FETCH_ASSOC);

    if (!$tarea) {
        echo "La tarea no existe. <a href='index.php'>Volver a la lista de tareas</a>";
        exit;
    }
} else {
    echo "ID de tarea no especificado. <a href='index.php'>Volver a la lista de tareas</a>";
    exit;
}

if (!empty($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    $sql = $pdo->prepare("UPDATE tareas SET nombre = :nombre, descripcion = :descripcion WHERE id = :id");
    $sql->execute(['nombre' => $nombre, 'descripcion' => $descripcion, 'id' => $id]);

    echo "Tarea actualizada correctamente. ";
    header("Location: tareas.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Tarea</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Editar Tarea</h2>
        <form method="post">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $tarea['nombre']; ?>">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion"><?php echo $tarea['descripcion']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</body>
</html>
