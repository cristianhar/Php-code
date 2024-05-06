<?php
    include 'conexionbd.php';
    $consulta = mysqli_query($cnx,"Select * From Estudiante");
    //Validar que la tabla tenga o no datos
    if (mysqli_num_rows($consulta)>0)
    {
        echo "<table border='1'>";
            echo "<th>Identificación</th>";
            echo "<th>Apellidos</th>";
            echo "<th>Nombres</th>";
            echo "<th>Correo</th>";
            while ($fila = mysqli_fetch_array($consulta))
            {
                echo "<tr>";
                    echo "<td>".$fila['ident']."</td>";
                    echo "<td>".$fila['apellidos']."</td>";
                    echo "<td>".$fila['nombres']."</td>";
                    echo "<td>".$fila['correo']."</td>";
                echo "</tr>";    
            }
            echo "</table>";
    }
    else
    {
        echo "No hay estudiantes registrados, hasta el momento";
    }
?>