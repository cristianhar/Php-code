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
    <title>Inicio Crud</title>
    <?php include './include/style.php'; ?>

</head>
<section>
    <header>
        <h1>Gestión de Personas - Tareas - Productos</h1>

        <?php include './include/nav.php'; ?>
    </header>

    <section>
        <h2>Bienvenido</h2>
        <p>Este es un ejemplo de CRUD en PHP basado en los ejercicios entregados por el profesor Wilson Castro.</p>

        <h3><b>Contenido</b></h3>
        <ul>
            <li>Boton de iniciar sesión en caso tal de que el usuario no haya iniciado sesión.</li>
            <li>Formulario de registro y login totalmente funcional.</li>
            <li>Nombre de usuario y boton de cerrar sesion en el footer si el usuario ha iniciado sesion correctamente.</li>
            <li>Visualizacion de personas creadas con su respectivo botones de Crear , Editar y eliminar</li>
            <li>Visualizacion y creacion de tareas con campo de estado modificable y cronometro con el tiempo de creacion de la tarea. </li>
            <li>Visualizacion de productos con botones de Crear, Editar y Eliminar</li>
            <li>Validacion de que el usuario este obligado a logear para poder ver las otras vistas.</li>
        </ul>

        <?php include './include/carousel.php'; ?>

    </section>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <?php include './include/footer.php'; ?>
    </body>

</html>