<?php
require_once 'conexionbd.php';

if (!empty($_POST)) {
    $identificacion = $_POST['id'];
    $apellidos = $_POST['apellidos'];
    $nombres = $_POST['nombres'];
    $email = $_POST['correo'];
    $password = $_POST['contrasena'];
    
    $sql = $cnx->prepare("INSERT INTO estudiante (ident, apellidos, nombres, correo, contrasena) VALUES (?, ?, ?, ?, ?)");
    $sql->bind_param("sssss", $identificacion, $apellidos, $nombres, $email, $password);
    $resultado = $sql->execute();

        if ($resultado) {
            echo "¡Usuario registrado correctamente!";
            header("Location: iniciarsesion.php");
            exit(); 
        } else {
            echo "Error al registrar el usuario";
        }
    } 

    mysqli_close($cnx);  
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de usuario</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2>Registro de usuario</h2>
                <form method="post" action="">
                    <div class="form-group">
                        <label for="id">Identificacion:</label>
                        <input type="text" class="form-control" id="id" name="id">
                    </div>
                    <div class="form-group">
                        <label for="apellidos">Apellidos:</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos">
                    </div>
                    <div class="form-group">
                        <label for="nombres">Nombres:</label>
                        <input type="text" class="form-control" id="nombres" name="nombres">
                    </div>
                    <div class="form-group">
                        <label for="correo">Email:</label>
                        <input type="email" class="form-control" id="correo" name="correo">
                    </div>
                    <div class="form-group">
                        <label for="contrasena">Contraseña:</label>
                        <input type="password" class="form-control" id="contrasena" name="contrasena">
                    </div>

                    <button type="submit" class="btn btn-primary">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
