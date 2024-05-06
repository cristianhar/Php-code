<?php
    session_start();
    include 'conexionbd.php';
    require_once 'enums.php';

    if (!isset($_SESSION['usuario'])) {
        header('Location: iniciarsesion.php');
        exit();
    }

    if (isset($_SESSION['mensaje'])) {
        echo "<div class='alert alert-success'>".$_SESSION['mensaje']."</div>";
        unset($_SESSION['mensaje']); // Limpia el mensaje para futuras peticiones.
    }

    // Recuperar notas de la base de datos
    $query = "SELECT n.id_nota, e.ident, e.nombres as estudianteNombre, a.nombre as asignaturaNombre, n.periodo, n.notam1, n.notam2, n.notam3
                FROM nota n JOIN estudiante e ON n.ident = e.ident JOIN asignatura a ON n.codasig = a.codasig
                WHERE n.activo = true ORDER BY e.nombres, a.nombre, n.periodo";
    $resultado = mysqli_query($cnx, $query);

    function periodoARomano($valor) {
        return match($valor) {
            Periodos::I->value => Periodos::I->name,
            Periodos::II->value => Periodos::II->name,
            Periodos::III->value => Periodos::III->name,
            Periodos::IV->value => Periodos::IV->name,
            default => 'Desconocido',
        };
    }    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lista de Notas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="calificarAsignaturaEstudiante.php">Registrar notas</a></li>
            <li class="nav-item"><a class="nav-link" href="cerrarsesion.php">Cerrar Sesión</a></li>
        </ul>
    </nav>
<div class="container mt-5">
    <h2>Lista de Notas</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Identificación</th>
                <th>Estudiante</th>
                <th>Asignatura</th>
                <th>Periodo</th>
                <th>Nota 1</th>
                <th>Nota 2</th>
                <th>Nota 3</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while($fila = mysqli_fetch_assoc($resultado)): ?>
            <tr>
                <td><?php echo htmlspecialchars($fila['ident']); ?></td>
                <td><?php echo htmlspecialchars($fila['estudianteNombre']); ?></td>
                <td><?php echo htmlspecialchars($fila['asignaturaNombre']); ?></td>                
                <td><?php echo htmlspecialchars(periodoARomano((int)$fila['periodo'])); ?></td>
                <td><?php echo htmlspecialchars($fila['notam1']); ?></td>
                <td><?php echo htmlspecialchars($fila['notam2']); ?></td>
                <td><?php echo htmlspecialchars($fila['notam3']); ?></td>
                <td>
                    <a href="editarNota.php?id=<?php echo $fila['id_nota'] ?>" class="btn btn-primary">Editar</a>
                    <a href="eliminarNota.php?id=<?php echo $fila['id_nota'] ?>" class="btn btn-danger" onclick="return confirm('¿Está seguro de querer inactivar esta nota?');">Inactivar</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>