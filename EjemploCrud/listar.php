<?php
	require_once 'config.php';
	$queryResultado = $pdo->query("SELECT * FROM tblpersona");
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Listado Personas</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<header>
			<h1>Listado de Personas</h1>
			<a href="index.php">Home</a>
		</header>
		<br><br><br><br><br>
		<section>
			<table class="table">
				<tr>
					<th>Nombre</th>
					<th>Edad</th>

					<th>Edit</th>
					<th>Delete</th>
				</tr>
				<!-- Traer los datos -->
				<?php foreach ($queryResultado as $row): ?>	
					<tr>
						<td><?= $row["nombre"]; ?></td>
						<td><?= $row["edad"]; ?></td>
						<!-- Agregar edit y delete a cada registro -->
						<td><a href="actualizar.php?nombre=<?= $row['nombre']; ?>">Editar</a></td>
						<td><a href="eliminar.php?nombre=<?= $row['nombre']; ?>">Eliminar</a></td>
					</tr>
				<?php endforeach; ?>
			</table>
		</section>
		<br><br><br><br><br>
		<footer>
			&copy; WCG Developer
		</footer>
	</div>
</body>
</html>

