<?php
    session_start();    
    include 'conexionbd.php';
    require_once 'enums.php';

    // obtener las asignaturas
    $queryAsignatura = "SELECT codasig, nombre FROM asignatura";
    $resultadoAsignatura = mysqli_query($cnx, $queryAsignatura);    

    //recuperar los detalles de la nota
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
        $id = $_GET['id'];    $stmt = $cnx->prepare("SELECT * FROM nota WHERE id_nota = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows == 0) {
            $mensaje = "La nota con el id $id no existe.";
        } else {
            $nota = $resultado->fetch_assoc();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar Nota</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Editar Nota</h2>
    <form action="procesarActualizarNota.php" method="post">
        <input type="hidden" name="id" value="<?php echo $nota['id_nota']; ?>">
        <div class="form-group">
            <label for="ident">Identificación:</label>
            <input type="text" class="form-control" id="ident" name="ident" value="<?php echo $nota['ident']; ?>" readonly>
        </div>        
        <!-- traer el nombre de la asignatura -->
        <div class="form-group">
            <label for="txtasignatura">Asignatura:</label>
            <select class="form-control" id="txtasignatura" name="txtasignatura">
                <?php
                    if ($resultadoAsignatura) {
                        while ($fila = mysqli_fetch_assoc($resultadoAsignatura)) {
                            // Comprueba si el codasig de esta fila es el mismo que el de la nota que estás editando
                            $selected = ($fila['codasig'] == $nota['codasig']) ? 'selected' : '';
                            echo "<option value=\"{$fila['codasig']}\" $selected>{$fila['nombre']}</option>";
                        }
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="periodo">Periodo Académico:</label>
            <select class="form-control" id="periodo" name="periodo">
                <?php
                $periodoActual = $nota['periodo']; // Asume que esto ya tiene el valor actual de la base de datos.
                foreach (Periodos::cases() as $periodo) {
                    $selected = ($periodo->value == $periodoActual) ? 'selected' : '';
                    echo "<option value=\"{$periodo->value}\" $selected>{$periodo->name}</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="txtnota1">Nota 1:</label>
            <input type="number" class="form-control" id="txtnota1" name="txtnota1" step="0.01" min="0" max="5" value="<?php echo $nota['notam1']; ?>" required>
        </div>
        <div class="form-group">
            <label for="txtnota2">Nota 2:</label>
            <input type="number" class="form-control" id="txtnota2" name="txtnota2" step="0.01" min="0" max="5" value="<?php echo $nota['notam2']; ?>" required>
        </div>
        <div class="form-group">
            <label for="txtnota3">Nota 3:</label>
            <input type="number" class="form-control" id="txtnota3" name="txtnota3" step="0.01" min="0" max="5" value="<?php echo $nota['notam3']; ?>" required>
        </div>
        <button type="submit" name="btnactualizar" class="btn btn-primary">Actualizar</button>
    </form>
</div>
</body>
</html>