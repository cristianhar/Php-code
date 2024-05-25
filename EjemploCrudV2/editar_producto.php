<?php
require_once 'config.php';

session_start();


if (!isset($_SESSION['username'])) {

    header("Location: login.php");
    exit;
}
if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    $sql = $pdo->prepare("SELECT * FROM productos WHERE id = :id");
    $sql->execute(['id' => $id]);
    $productos = $sql->fetch(PDO::FETCH_ASSOC);

    if (!$productos) {
        echo "El producto no existe <a href='productos.php'>Volver a la lista de productos</a>";
        exit;
    }
} else {
    echo "ID de tarea no especificado. <a href='productos.php'>Volver a la lista de productos</a>";
    exit;
}

if (!empty($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $stock = $_POST['stock'];

    $sql = $pdo->prepare("UPDATE productos SET nombre = :nombre, descripcion = :descripcion, stock = :stock WHERE id = :id");
    $sql->execute(['nombre' => $nombre, 'descripcion' => $descripcion, 'stock' => $stock, 'id' => $id]);


    echo "Producto actualizado correctamente. ";
    header("Location: productos.php");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Tarea</title>
    <?php include './include/style.php'; ?>

</head>

<body>
    <header>
        <h1>Editar Producto</h1>
        <?php include './include/nav.php'; ?>
    </header>
    <section>
        <h2>Editar Tarea</h2>
        <p>En esta sección se edita un producto.</p>
        <form method="post">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" readonly value="<?php echo $productos['nombre']; ?>">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion"><?php echo $productos['descripcion']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="descripcion">Stock:</label>
                <input type="number" class="form-control" id="stock" name="stock" value="<?php echo $productos['stock']; ?>">

            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </section>

    <?php include './include/footer.php'; ?>
</body>

</html>