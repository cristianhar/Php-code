<?php 
	require_once 'config.php';
	$resultado = false;

	//validar que post (super global=array) venga con datos
	if (!empty($_POST)){
		//entrada de datos
		$nombre = $_POST['nombre'];
		$edad = $_POST['edad'];

		//operaciones
			//Instruccion SQL: Insercion de los datos en la tabla de la BD
		$sql = "INSERT INTO tblpersona(nombre, edad) VALUES (:nom, :ed)";
			//Preparar (establecer) la conexion que va a ejecutar la Instruccion SQL
		$query = $pdo->prepare($sql);

		//entregarlos
		//el metodo execute tiene un arreglo relacional que permite llevarle a etiquetas los datos de variables
		$resultado = $query->execute([
			'nom' => $nombre,
			'ed' => $edad
		]);
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>GestionPersonas</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<header>
			<h1>Agregar Persona</h1>
			<a href="index.php">Home</a>
		</header>
		<br><br><br><br><br>
		<section>
			<?php 
				if ($resultado){
					echo '<div class="alert alert-success">Registro Ok</div>';
				}
			?>
			<form action="agregar.php" method="post">
				<label>Nombre</label>
				<input type="text" name="nombre" id="nombre">
				<br><br>
				<label>Edad</label>
				<input type="text" name="edad" id="edad">
				<br><br>
				<input type="submit" value="Registrar">
			</form>
		</section>
		<br><br><br><br><br>
		<footer>
			&copy; WCG Developer
		</footer>
	</div>
</body>
</html>