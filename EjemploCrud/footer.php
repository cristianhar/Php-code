<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: index.php");
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
        &copy; Johao Developer
</footer>