<?php
require_once 'config.php';
$resultado = false;

session_start();


if (!isset($_SESSION['username'])) {

	header("Location: login.php");
	exit;
}
if (!empty($_POST)) {
	$nombre = $_POST['nombre'];
	$edad = $_POST['edad'];
	$email = $_POST['email'];
	$telefono = $_POST['telefono'];
	$direccion = $_POST['direccion'];
	$ciudad = $_POST['ciudad'];
	$pais = $_POST['pais'];


	$sql = "INSERT INTO tblpersona(nombre, edad, email, telefono, direccion, ciudad, pais) VALUES (:nom, :ed, :email, :telefono, :direccion, :ciudad, :pais)";

	$query = $pdo->prepare($sql);

	$resultado = $query->execute([
		'nom' => $nombre,
		'ed' => $edad,
		'email' => $email,
		'telefono' => $telefono,
		'direccion' => $direccion,
		'ciudad' => $ciudad,
		'pais' => $pais


	]);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<title>Gestion de Personas</title>
	<?php include 'style.php'; ?>

</head>

<body>

	<header>
		<h1>Agregar Persona</h1>
		<?php include 'nav.php'; ?>
	</header>
	<section>
		<?php
		if ($resultado) {
			echo '<div class="alert alert-success">Registrado exitosamente</div>';
		}
		?>
		<form action="agregar.php" method="post" class="form-group">
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre" id="nombre" class="form-control" required>
			<br>
			<label for="edad">Edad</label>
			<input type="text" name="edad" id="edad" class="form-control" required>
			<br>
			<label for="email">Email</label>
			<input type="email" name="email" id="email" class="form-control" required>
			<br>
			<label for="telefono">Teléfono</label>
			<input type="tel" name="telefono" id="telefono" class="form-control" required>
			<br>
			<label for="direccion">Dirección</label>
			<input type="text" name="direccion" id="direccion" class="form-control" required>
			<br>
			<label for="ciudad">Ciudad</label>
			<input type="text" name="ciudad" id="ciudad" class="form-control" required>
			<br>
			<label for="pais">País</label>
			<input type="text" name="pais" id="pais" class="form-control" required>
			<br>
			<input type="submit" value="Registrar" class="btn btn-primary">
			<input type="reset" value="Limpiar Formulario" class="btn btn-danger">
		</form>


	</section>
	<br><br>
	<?php include 'footer.php'; ?>
</body>

</html>