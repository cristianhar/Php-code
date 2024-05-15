<?php
// Incluir el archivo de configuración y establecer la conexión a la base de datos
include_once 'config.php';
$queryProductos = $pdo->query("SELECT * FROM productos");

session_start();


if (!isset($_SESSION['username'])) {

    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Lista de Productos</title>
    <?php include './include/style.php'; ?>

<body>
    <header>
        <h1>Gestión de Productos</h1>
        <?php include './include/nav.php'; ?>
    </header>

    <section>


        <h2>Lista de Productos</h2>
        <p>En esta sección se muestran los productos creados.</p>

        <a href="crear_producto.php" class="btn btn-success">

            <span class="bi bi-plus"></span>Añadir
        </a>
        <br><br>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Stock</th>
                    <th>Fecha Ingreso</th>
                    <th>Acciones</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <!-- Mostrar los datos de los productos -->
                <?php foreach ($queryProductos as $producto) : ?>
                    <tr>
                        <td><?= $producto['id']; ?></td>
                        <td><?= $producto['nombre']; ?></td>
                        <td><?= $producto['descripcion']; ?></td>
                        <td><?= $producto['stock']; ?></td>
                        <td><?= $producto['fecha_ingreso']; ?></td>
                        <td>
                            <a href="editar_producto.php?id=<?= $producto['id']; ?>" class="btn btn-primary">Editar</a>
                        </td>
                        <td>
                            <form method="post" action="eliminar_producto.php">
                                <input type="hidden" name="id" value="<?= $producto['id']; ?>">
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>

    <?php include './include/footer.php'; ?>
</body>

</html>