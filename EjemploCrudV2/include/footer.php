<?php

if (isset($_POST['logout'])) {
    session_start(); 
    session_destroy();

    echo '<script>window.location.href = "index.php";</script>';
    exit;
}
?>

<footer>
    <?php
    if (isset($_SESSION['username'])) {
        echo "<p>Bienvenido, " . $_SESSION['username'] . "</p>";

        echo '<form method="POST" action="" class="d-inline">
                <button type="submit" name="logout" class="btn btn-danger logout-btn">Cerrar sesión</button>
            </form>';
    }
    ?>
    <br>
    &copy; Johao Developer<br>
    <?php include 'redes_sociales.php'; ?>
</footer>
