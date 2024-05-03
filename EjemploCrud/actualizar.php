<?php
	include_once 'config.php';
	$resultado = false;

	if (!empty($_POST)) {
		//Si trae los datos realizar la actualizacion
		$nombre = $_POST['nombre'];
		$newEdad = $_POST['edad'];

		$sql = "UPDATE tblpersona SET edad=:ed WHERE nombre=:nom";

		$query = $pdo->prepare($sql);

		$resultado = $query->execute([
			'nom' => $nombre,
			'ed' => $newEdad
		]);

		$edadValue = $newEdad;
	} else {
		//Si no trae los datos, realizar una consulta para obtener los datos desde la bd para luego realizar la actualizacion
		$nombre = $_GET['nombre'];

		$sql = "SELECT * FROM tblpersona WHERE nombre=:nombre";
		$query = $pdo->prepare($sql);

		$query->execute([
			'nombre' => $nombre			
		]);

		//Traer los registros a traves de un array asociativo con dos valores nombre y edad
		//Por que asociativo: Por que la edad debe corresponder al nombre que se esta consultando
		$row = $query->fetch(PDO::FETCH_ASSOC);
		$nombreValue = $row['nombre'];
		$edadValue = $row['edad'];

		//Llevar las variables $nombreValue y $edadValue como valores de los input
	}
	
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Actualizar Persona</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<header>
			<h1>Actualizar Datos Persona</h1>
			<a href="index.php">Home</a>
			<a href="listar.php">Regresar</a>
			<?php
				if ($resultado){
					echo '<div class="alert alert-success">Registro Ok</div>';
				} 
			?>
		</header>
		<br><br><br><br><br>
		<section>
			<form action="actualizar.php" method="post">
				<label>Nueva Edad</label>
				<input type="text" name="edad" id="edad">
				<br>
				<input type="hidden" name="nombre" id="nombre" value="<?php echo $nombre ?>">
				<input type="submit" value="Actualizar">
			</form>
		</section>
		<br><br><br><br><br>
		<footer>
			&copy; WCG Developer
		</footer>
	</div>
</body>
</html>