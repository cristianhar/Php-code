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
    $stock = $_POST['stock'];

    $sql = $pdo->prepare("INSERT INTO productos (nombre, descripcion, stock) VALUES (:nombre, :descripcion, :stock)");
    $sql->execute(['nombre' => $nombre, 'descripcion' => $descripcion, 'stock' => $stock]);


    header("Location: productos.php");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Crear Producto</title>
    <?php include './include/style.php'; ?>

</head>

<body>
    <header>
        <h1>Creacion de productos</h1>
        <?php include './include/nav.php'; ?>
    </header>
    <section>
        <h2>Crear producto</h2>
        <p>En esta sección se crea un nuevo producto.</p>
        <form method="post">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ej: Coca-Colas">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Ej: Mega/Litro/2.5l ...etc"></textarea>
            </div>

            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="number" class="form-control" id="stock" name="stock" placeholder="Ej: 20"></input>
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </section>
    <?php include './include/footer.php'; ?>

</body>

</html>