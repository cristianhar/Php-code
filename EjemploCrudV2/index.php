<?php


if (!isset($_SESSION['welcome_shown'])) {
    $_SESSION['welcome_shown'] = false;
}

$show_modal = !$_SESSION['welcome_shown'];

if ($show_modal) {
    $_SESSION['welcome_shown'] = true;
}

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
            <li>Encapsulamiento de logica aparte de el front-end.</li>
            <li>Pagina totalmente responsive</li>
        </ul>

        <?php include './include/carousel.php'; ?>

    </section>

     <!-- Modal de Bienvenida -->
     <div class="modal fade" id="welcomeModal" tabindex="-1" role="dialog" aria-labelledby="welcomeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="welcomeModalLabel">Bienvenido</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="modalCloseButton">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¡Bienvenido a nuestra plataforma de gestión de personas, tareas y productos!</p>
                    <p>Este es un ejemplo de CRUD en PHP basado en los ejercicios entregados por el profesor Wilson Castro.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="modalUnderstandButton">Entendido</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
      $(document).ready(function() {
            var showModal = <?php echo json_encode($show_modal); ?>;
            
            if (showModal) {
                $('#welcomeModal').modal('show');
            }

           
            $('#welcomeModal').on('hide.bs.modal', function (e) {
                if (e.target === this && !$(e.target).data('ignore-hide')) {
                    window.location.href = 'error.php';
                }
            });

        
            $('#modalCloseButton').on('click', function() {
                window.location.href = 'error.php';
            });

          
            $('#modalUnderstandButton').on('click', function() {
                
                $('#welcomeModal').data('ignore-hide', true);
                $('#welcomeModal').modal('hide');
            });
        });
    </script>
    <?php include './include/footer.php'; ?>

    
    </body>

</html>