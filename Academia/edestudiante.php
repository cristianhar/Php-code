<?php
    include 'conexionbd.php';
    //Verificar que se haya la identificación
    if (isset($_POST['ident']))
    {
        $ident = $_POST['ident'];
        $apellidos = $_POST['apellidos'];
        $nombres = $_POST['nombres'];
        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];
        //Validar que la identificación exista
        $query = mysqli_query($cnx,"Select ident From Estudiante Where ident = '$ident'");
        if (mysqli_num_rows($query) > 0) //encontró la identificación
        {
            mysqli_query($cnx,"Update Estudiante Set apellidos='$apellidos',nombres='$nombres',correo='$correo',contrasena='$contrasena' Where ident = '$ident'");
            echo true;
        }
        else
        {
            echo false;
        }
    }
?>