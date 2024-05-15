<?php
session_start(); 


if (!isset($_SESSION['username'])) {
 
    header("Location: login.php");
    exit; 
}
?>
<?php
	require_once 'config.php';
	$queryResultado = $pdo->query("SELECT * FROM tblpersona");
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Listado Personas</title>
	<?php include 'style.php'; ?>
</head>
<body>
	
		<header>
			<h1>Gestión de Personas</h1>
			<?php include 'nav.php'; ?>
		</header>
	
	<section>
	<a href="agregar.php" class="btn btn-success">
            <span class="glyphicon glyphicon-plus"></span> Crear Personas
        </a>
        <br><br>
		<h2>Lista de Personas</h2>
		<p>En esta sección se muestran las personas creadas.</p>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Ciudad</th>
                <th>País</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <!-- Traer los datos -->
            <?php foreach ($queryResultado as $row): ?>
                <tr>
                    <td><?= $row["nombre"]; ?></td>
                    <td><?= $row["edad"]; ?></td>
                    <td><?= $row["email"]; ?></td>
                    <td><?= $row["telefono"]; ?></td>
                    <td><?= $row["direccion"]; ?></td>
                    <td><?= $row["ciudad"]; ?></td>
                    <td><?= $row["pais"]; ?></td>
                    <!-- Agregar edit y delete a cada registro -->
                    <td><a href="actualizar.php?email=<?= $row['email']; ?>" class="btn btn-primary">Editar</a></td>
                    <td><a href="eliminar.php?email=<?= $row['email']; ?>" class="btn btn-danger">Eliminar</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>

		
	<?php include 'footer.php'; ?>
</body>
</html>

