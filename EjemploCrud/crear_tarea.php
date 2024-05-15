<?php
require_once 'config.php';

session_start();


if (!isset($_SESSION['username'])) {

    header("Location: login.php");
    exit;
}
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
    <?php include './include/style.php'; ?>
</head>

<body>
    <header>
        <h1>Creacion de tareas</h1>
        <?php include './include/nav.php'; ?>
    </header>
    <section>
        <h2>Crear Tarea</h2>
        <p>En esta sección se crea una nueva tarea.</p>
        <form method="post">
            <div class="form-group">
                <label for="nombre">Tarea:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ej Pagar Servicios">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Ej: Factura de Energia/Gas/Agua/Internet"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
            <br>
            <br>
        </form>
    </section>

    <?php include './include/footer.php'; ?>
</body>

</html>