<?php
require_once 'config.php';

if (!empty($_POST)) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $sql = $pdo->prepare("INSERT INTO usuarios (username, password, email) VALUES (:user, :pass, :em)");
    $resultado = $sql->execute([
        'user' => $username,
        'pass' => $password,
        'em' => $email
    ]);

    if ($resultado) {
        header("Location: login.php");
        exit;
    } else {
        $error_message = "Error al registrar el usuario";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro de usuario</title>
    <?php include './include/style.php'; ?>
    <style>
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
        background: linear-gradient(to bottom, #e1f343, #f2f2f2);
    }

        .registration-container {
            margin-top: 100px;
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .registration-title {
            text-align: center;
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 registration-container">
                <h2 class="registration-title">Registro de usuario</h2>
                <?php if (isset($error_message)) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error_message; ?>
                    </div>
                <?php endif; ?>
                <form method="post" action="">
                    <div class="form-group">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Usuario">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>