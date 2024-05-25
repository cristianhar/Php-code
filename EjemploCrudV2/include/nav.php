<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<nav>
    <ul>
        <li>
            <a href="index.php">Inicio</a>
        <li>

            <?php if (isset($_SESSION['username'])) { ?>
        <li>
            <a href="listar.php">Personas</a>
        </li>
        <li>
            <a href="tareas.php">Tareas</a>
        </li>
        <li>
            <a href="productos.php">Productos</a>
        </li>
    <?php } else { ?>

        <a href="login.php">Iniciar sesión</a>
        </li>
    <?php } ?>
    </ul>
</nav>