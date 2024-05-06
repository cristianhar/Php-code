<?php
    session_start();
    include 'conexionbd.php';
    require_once 'enums.php';

    if (isset($_SESSION['mensaje'])) {
        echo "<div class='alert alert-success'>".$_SESSION['mensaje']."</div>";
        unset($_SESSION['mensaje']); // Limpia el mensaje para futuras peticiones.
    }

    // Preparar la consulta para obtener las asignaturas
    $queryAsignatura = "SELECT codasig, nombre FROM asignatura";
    $resultadoAsignatura = mysqli_query($cnx, $queryAsignatura);    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudiante</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2>Información del Estudiante</h2>
        <form action="procesarCalificacion.php" method="post">
            <!-- Campos del formulario -->
            <div class="form-group">
                <label for="ident">Identificación:</label>
                <input type="text" class="form-control" id="ident" name="ident" required>
            </div>
            <div class="form-group">
                <label for="txtasignatura">Asignatura:</label>
                <select id="txtasignatura" name="txtasignatura" class="form-control">
                    <?php
                    if($resultadoAsignatura){
                        while ($fila = mysqli_fetch_assoc($resultadoAsignatura)) {
                            echo "<option value=\"{$fila['codasig']}\">{$fila['nombre']}</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="periodo">Periodo Académico:</label>
                <select id="periodo" name="periodo" class="form-control">
                    <?php
                        foreach (Periodos::cases() as $periodo) {
                            // Usamos $periodo->value para obtener el valor entero asociado a cada caso
                            echo "<option value=\"{$periodo->value}\">{$periodo->name}</option>";
                        }
                    ?>
                </select>
            </div>

            <!-- Campos para notas -->
            <div class="form-group">
                <label for="txtnota1">Nota 1:</label>
                <input type="number" class="form-control" id="txtnota1" name="txtnota1" step="0.01" min="0" max="5" required>
            </div>
            <div class="form-group">
                <label for="txtnota2">Nota 2:</label>
                <input type="number" class="form-control" id="txtnota2" name="txtnota2" step="0.01" min="0" max="5" required>
            </div>
            <div class="form-group">
                <label for="txtnota3">Nota 3:</label>
                <input type="number" class="form-control" id="txtnota3" name="txtnota3" step="0.01" min="0" max="5" required>
            </div>
            <button type="submit" class="btn btn-primary" name="btnguardar">Guardar</button>
        </form>        
    </div>
</body>
</html>