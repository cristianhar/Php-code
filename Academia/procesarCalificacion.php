<?php 
    session_start();  // para validar si existe una sesión de usuario
    
    include 'conexionbd.php';   // Incluir conexión a la base de datos

    if (!isset($_SESSION['usuario'])) {
        header('Location: iniciarsesion.php');
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btnguardar'])) {
        $ident = $_POST['ident'];
        $asignatura = $_POST['txtasignatura'];
        $periodo = $_POST['periodo'];
        $nota1 = $_POST['txtnota1'];
        $nota2 = $_POST['txtnota2'];
        $nota3 = $_POST['txtnota3'];

        // Verificar que exista el estudiante.
        $stmt = $cnx->prepare("SELECT ident FROM estudiante WHERE ident = ?");
        $stmt->bind_param("s", $ident);
        $stmt->execute();
        $resultadoEstudiante = $stmt->get_result();

        if ($resultadoEstudiante->num_rows == 0) {
            $_SESSION['mensaje'] = "El estudiante con la identificación $ident no existe.";
            header('Location: calificarAsignaturaEstudiante.php');
            exit();
        }
            
        // Insertar nueva nota sin verificar duplicados.
        $stmt = $cnx->prepare("INSERT INTO nota (ident, codasig, periodo, notam1, notam2, notam3) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssiii", $ident, $asignatura, $periodo, $nota1, $nota2, $nota3);
        //$stmt->execute();
            
        //$mensaje = "Información guardada con éxito.";
        if ($stmt->execute()) {
            $_SESSION['mensaje'] = "Información guardada con éxito.";
        } else {
            // Error al guardar, posiblemente mostrar o registrar el error
            $_SESSION['mensaje'] = "Error al guardar la información: " . $stmt->error;
        }

        header('Location: listaNotas.php');
        exit();        
    }