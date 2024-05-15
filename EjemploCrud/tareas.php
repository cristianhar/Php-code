<?php
session_start();


if (!isset($_SESSION['username'])) {

    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lista de Tareas</title>
    <?php include 'style.php'; ?>


</head>

<body>
    <header>
        <h1>Gestión de Tareas</h1>
        <?php include 'nav.php'; ?>
    </header>

    <section>
        <a href="crear_tarea.php" class="btn btn-success">
            <span class="glyphicon glyphicon-plus"></span> Crear Tarea
        </a>
        <br><br>
        <h2>Lista de Tareas</h2>
        <p>En esta sección se muestran las tareas creadas.</p>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Creación</th>
                    <th>Actualización</th>
                    <th>Tiempo </th>
                    <th>Acciones</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php require_once 'config.php'; ?>
                <?php foreach ($pdo->query("SELECT * FROM tareas") as $tarea) : ?>
                    <tr>
                        <td><?= $tarea['id'] ?></td>
                        <td><?= $tarea['nombre'] ?></td>
                        <td><?= $tarea['descripcion'] ?></td>
                        <td>
                            <?php if ($tarea['estado'] == 'Pendiente') : ?>
                                <span class='badge badge-pill badge-warning'>Pendiente</span>
                            <?php elseif ($tarea['estado'] == 'Completada') : ?>
                                <span class='badge badge-pill badge-success'>Completada</span>
                            <?php endif; ?>
                        </td>
                        <td><?= $tarea['fecha_creacion'] ?></td>
                        <td><?= $tarea['fecha_actualizacion'] ?></td>

                        <td id="tiempo-<?= $tarea['id'] ?>"></td>
                        <td>
                            <a href='editar_tarea.php?id=<?= $tarea['id'] ?>' class='btn btn-primary'>Editar</a>
                        </td>
                        <td>
                            <form method='post' action='eliminar_tarea.php'>
                                <input type='hidden' name='id' value='<?= $tarea['id'] ?>'>
                                <button type='submit' class='btn btn-danger'>Eliminar</button>
                            </form>
                        </td>
                        <td>
                            <form method='post' action='cambiar_estado.php'>
                                <input type='hidden' name='id' value='<?= $tarea['id'] ?>'>
                                <button type='submit' class='btn btn-info'>Cambiar Estado</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>


    <?php include 'footer.php'; ?>
    <script>
        function mostrarTiempoTranscurrido(fechaCreacion, idElemento) {
            var fechaCreacionTimestamp = new Date(fechaCreacion).getTime();
            var ahoraTimestamp = new Date().getTime();
            var tiempoTranscurrido = ahoraTimestamp - fechaCreacionTimestamp;

            var horas = Math.floor(tiempoTranscurrido / (1000 * 60 * 60));
            var minutos = Math.floor((tiempoTranscurrido % (1000 * 60 * 60)) / (1000 * 60));
            var segundos = Math.floor((tiempoTranscurrido % (1000 * 60)) / 1000);


            document.getElementById(idElemento).innerText = horas + "h " + minutos + "m " + segundos + "s";
        }

        // Actualizar el tiempo transcurrido cada segundo
        setInterval(function() {
            <?php foreach ($pdo->query("SELECT * FROM tareas") as $tarea) : ?>
                mostrarTiempoTranscurrido("<?= $tarea['fecha_creacion'] ?>", "tiempo-<?= $tarea['id'] ?>");
            <?php endforeach; ?>
        }, 1000); // Se ejecuta cada segundo (1000 milisegundos)
    </script>

</body>

</html>