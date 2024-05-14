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
        header("Location: index.php");
        exit; 
    } else {
        $error_message = "Nombre de usuario o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-container {
            margin-top: 100px;
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .login-title {
            text-align: center;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 login-container">
                <h2 class="login-title">Iniciar sesión</h2>
                <?php if(isset($error_message)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error_message; ?>
                    </div>
                <?php endif; ?>
                <form method="POST" action="login.php">
                    <div class="form-group">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Usuario">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
                </form>
                <div class="mt-3 text-center">
                    <a href="registro.php" class="btn btn-link">¿No tienes una cuenta? Regístrate aquí</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
