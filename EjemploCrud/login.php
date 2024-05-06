
<?php
require_once 'config.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!empty($_POST)) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE username = :user AND password = :pass"; // Consulta SQL como string
    $query = $pdo->prepare($sql);
    $query->execute([
        'user' => $username,
        'pass' => $password
    ]);

    if ($query->rowCount() > 0) {
        
        $_SESSION['username'] = $username;
        echo "¡Inicio de sesión exitoso!";
        header("Location: index.php");
        exit; 
    } else {
        echo "Nombre de usuario o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2>Iniciar sesión</h2>
                <form method="POST" action="login.php">
                    <div class="form-group">
                        <label for="username">Usuario:</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                </form>
                <br>
                <a href="registro.php" class="btn btn-secondary">Registrarse</a>
            </div>
        </div>
    </div>
</body>
</html>
