<?php
    include 'conexionbd.php';
    /*variable $sw para saber si lo encontró y poder enviar los datos del 
        estudiante (apellidos, nombres, correo) o un vacío
    */
    $sw = false;
    if (isset($_POST['ident']))
    {
        //Variables que retornan los datos
        $apellidos = "";
        $nombres = "";
        $correo = "";
        $identb = $_POST['ident'];
        $consulta = mysqli_query($cnx,"Select apellidos,nombres,correo From Estudiante Where ident = '$identb'");
        if (mysqli_num_rows($consulta) > 0) //encontró identificación
        {

            //Recorrer los registros que devuelve la instrucción SQL
            $sw = true;
            while ($reg = mysqli_fetch_array($consulta))
            {
                $apellidos = $reg['apellidos'];
                $nombres = $reg['nombres'];
                $correo = $reg['correo'];
            }
        }
                   
    }
    //Chequear la variable $sw para verificar qué se devuelve (datos o vacío)
    if ($sw)
    {
        echo $apellidos.",".$nombres.",".$correo;
    }
    else
    {
        echo "";
    }
?>