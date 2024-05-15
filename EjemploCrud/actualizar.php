<?php

session_start();


if (!isset($_SESSION['username'])) {

	header("Location: login.php");
	exit;
}
include_once 'config.php';
$resultado = false;

if (!empty($_POST)) {
	// Si trae los datos, realizar la actualización
	$nombre = $_POST['nombre'];
	$newEdad = $_POST['edad'];
	$email = $_POST['email'];
	$telefono = $_POST['telefono'];
	$direccion = $_POST['direccion'];
	$ciudad = $_POST['ciudad'];
	$pais = $_POST['pais'];

	$sql = "UPDATE tblpersona SET nombre=:nom, edad=:ed, email=:email, telefono=:tel, direccion=:dir, ciudad=:ciud, pais=:pais WHERE email=:email";

	$query = $pdo->prepare($sql);

	$resultado = $query->execute([
		'nom' => $nombre,
		'ed' => $newEdad,
		'email' => $email,
		'tel' => $telefono,
		'dir' => $direccion,
		'ciud' => $ciudad,
		'pais' => $pais
	]);

	$edadValue = $newEdad;
} else {
	// Si no trae los datos, realizar una consulta para obtener los datos desde la BD para luego realizar la actualización
	$email = $_GET['email'];

	$sql = "SELECT * FROM tblpersona WHERE email=:email";
	$query = $pdo->prepare($sql);

	$query->execute([
		'email' => $email
	]);

	// Traer los registros a través de un array asociativo con los valores correspondientes
	$row = $query->fetch(PDO::FETCH_ASSOC);
	$nombre = $row['nombre'];
	$edadValue = $row['edad'];
	$email = $row['email'];
	$telefono = $row['telefono'];
	$direccion = $row['direccion'];
	$ciudad = $row['ciudad'];
	$pais = $row['pais'];
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<title>Actualizar Persona</title>
	<?php include 'style.php'; ?>
</head>
<body>
	<header>
		<h1>Actualizar Datos Persona</h1>
		<?php include 'nav.php'; ?>
		<?php
		if ($resultado) {
			echo '<div class="alert alert-success">Datos modificados exitosamente</div>';
		}
		?>
	</header>

	<section>

		<h2>Actualizar datos</h2>
		<p>En esta sección se actualizan los datos de la persona seleccionada.</p>
		<form action="actualizar.php" method="post">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $nombre; ?>" readonly>
			</div>
			<div class="form-group">
				<label for="edad">Nueva Edad</label>
				<input type="text" name="edad" id="edad" class="form-control" value="<?php echo $edadValue; ?>" required>
			</div>
			<div class="form-group">
				<label for="email">Correo Electrónico</label>
				<input type="email" name="email" id="email" class="form-control" value="<?php echo $email; ?>" readonly>
			</div>
			<div class="form-group">
				<label for="telefono">Teléfono</label>
				<input type="tel" name="telefono" id="telefono" class="form-control" value="<?php echo $telefono; ?>" required>
			</div>
			<div class="form-group">
				<label for="direccion">Dirección</label>
				<input type="text" name="direccion" id="direccion" class="form-control" value="<?php echo $direccion; ?>" required>
			</div>
			<div class="form-group">
				<label for="ciudad">Ciudad</label>
				<input type="text" name="ciudad" id="ciudad" class="form-control" value="<?php echo $ciudad; ?>" required>
			</div>
			<div class="form-group">
				<label for="pais">País</label>
				<input type="text" name="pais" id="pais" class="form-control" value="<?php echo $pais; ?>" required>
			</div>
			<input type="submit" value="Actualizar" class="btn btn-primary">
		</form>
	</section>
	<br><br><br><br><br>
	<?php include 'footer.php'; ?>
</body>

</html>