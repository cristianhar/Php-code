<?php
   $servidor="localhost";
   $usuario = "root";
   $contrasena = "";
   $basedatos = "academia"; 
   //$cnx = mysqli_connect("localhost","root","","academia");
   $cnx = mysqli_connect($servidor,$usuario,$contrasena,$basedatos);
   if (!$cnx)
	{
		die ('Conexión fallída!!'.mysqli_connect_error());
	}
?>
