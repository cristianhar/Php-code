<?php
    include 'conexionbd.php';
    //Verificar que se haya la identificación
    if (isset($_POST['ident']))
    {
        $ident = $_POST['ident'];
        //Validar que la identificación exista
        $query = mysqli_query($cnx,"Select nota.ident from estudiante inner join nota on estudiante.ident=nota.ident Where nota.ident = '$ident'");
        if (mysqli_num_rows($query) == 0) //No lo encontró la identificación
        {
            mysqli_query($cnx,"Delete From Estudiante Where ident = '$ident'");
            echo true;
        }
        else
        {
            echo false;
        }
    }
?>