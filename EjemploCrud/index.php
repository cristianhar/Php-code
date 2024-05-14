<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['logout'])) {

    session_destroy();
  
    header("Location: index.php");
    exit; 
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>BD en PHP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>

        .logout-btn {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .logout-btn:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Gestión Personas</h1>
            <nav class="nav">
                <ul class="nav flex-column">
                    <li>
                        <a href="agregar.php">Agregar Personas</a>
                    </li>
                    <li>
                        <a href="listar.php">Listar Personas</a>
                    </li>
                    <li>
                        <a href="tareas.php">Listar Tareas</a>
                    </li>
                    <li>
                        <a href="login.php">Login</a>
                    </li>
                    
                </ul>

            </nav>
            <?php
            if (isset($_SESSION['username'])) {
                echo "<p>Bienvenido, " . $_SESSION['username'] . "</p>";
                
                echo '<form method="POST" action="" class="d-inline">
                        <button type="submit" name="logout" class="btn btn-danger logout-btn">Cerrar sesión</button>
                    </form>';
            }
            ?>
        </header>
        <br><br><br><br><br>
        <section>
        </section>
        <br><br><br><br><br>
        <footer>
            &copy; Php Developer
        </footer>
    </div>
</body>
</html>
