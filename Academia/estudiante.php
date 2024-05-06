<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Estudiante</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<span style="color:red">
        <?php
            if (isset($_SESSION['usuario'])) //Se inició sesión
            {
                echo "Bienvenido (a): ".$_SESSION['usuario']." - ".$_SESSION['email'];
            }
            else
            {
                header('location: iniciarsesion.php'); //Envia el control a la página iniciarsesion
            }
        ?>
</span>
    <script>
        function mensaje(activo) 
        {
            if (activo)//true es para mostrar, en false para ocultar
            {
                $("#mensaje").show(); 
            }
            else
            {
                setTimeout(function(){ 
                $("#mensaje").hide(); 
                }, 3000); 
            }
        }
        $(document).ready(function(){
            //Nuevo
            $("#btnnuevo").click(function(){
                $("#txtident").val("");
                $("#txtapellidos").val("");
                $("#txtnombres").val("");
                $("#txtcorreo").val("");
                $("#txtcontrasena").val("");
                $("#txtcontrasenaconf").val("");
                $("#txtident").focus();
                //ocultar el div con id listado
                $("#listado").hide();


            });
            //Guardar
            $("#btnguardar").click(function(){
                //Asignar datos a variables
                $ident = $("#txtident").val();
                $apellidos = $("#txtapellidos").val();
                $nombres = $("#txtnombres").val();
                $correo = $("#txtcorreo").val();
                $contrasena = $("#txtcontrasena").val();
                $contrasenaconf = $("#txtcontrasenaconf").val();
                //Validar que los datos se hayan llenado completamente
                if ($ident != "" && $apellidos != "" && $nombres != "" && $correo != "" && $contrasena != "" && $contrasenaconf != "")
                {
                    //Validar que las contraseñas sean iguales
                    if ($contrasena === $contrasenaconf )
                    {
                        //Guardar el registro del estudiante
                        $.ajax({
                            type: "POST",
                            url: "agestudiante.php",
                            data:{
                                ident: $ident,
                                apellidos: $apellidos,
                                nombres:$nombres,
                                correo:$correo,
                                contrasena:$contrasena
                            },
                            success:function(respuesta){
                                mensaje(true);
                                if (respuesta == "ok")
                                {
                                    //alert('El estudiante se guardó correctamente...');
                                    //Mostrar mensaje en el objeto con id mensaje
                                    $("#mensaje").css('color','green');
                                    $("#mensaje").text("El estudiante se guardó correctamente...");
                                }
                                else
                                {
                                    //alert('La identificación existe. Inténtelo con otra');
                                    $("#mensaje").css('color','red');
                                    $("#mensaje").text("La identificación existe. Inténtelo con otra");
                                }
                                mensaje(false);
                            }
                        });
                    }
                    else
                    {
                        alert('Las contraseñas no son iguales. Verifique!');
                    }
                }
                else
                {
                    alert('Debe ingresar todos los datos!');
                }

            });
            //Listar
            $("#btnlistar").click(function(){
                $.ajax({
                    type:"post",
                    url:"listadoestudiantes.php",
                    success:function(resp){
                        if (resp !="")
                        {
                            //Mostrar el objeto con el id listado
                            $("#listado").show();
                            //Mostrar el contenido de resp en el id listado
                            $("#listado").html(resp);
                        }
                        else
                        {
                            alert('No hay estudiantes para mostrar');
                        }
                    }
                });
            });
            //Buscar
            $("#btnbuscar").click(function(){
                $("#listado").hide();
                $('#txtapellidos').val("");
				$('#txtnombres').val("");
                $('#txtcorreo').val("");
                $ident = $("#txtident").val();
                if ($ident != "")
                {
                    //utilizar el método ajax para invocar el archivos buscarestudiante.php
                    $.ajax({
                        type:'POST',
                        url:'buscarestudiante.php',
                        data:{
                            ident:$ident
                        },
                        success:function(response){
                            if (response != "")
                            {
                                var datosest = response.split(",");
								$('#txtapellidos').val(datosest[0]);
								$('#txtnombres').val(datosest[1]);
                                $('#txtcorreo').val(datosest[2]);
                            }
                            else
                            {
                                mensaje(true);
                                $("#mensaje").css('color','red');
                                $("#mensaje").text("La identificación a buscar NO existe!!");
                                mensaje(false);
                            }
                        }
                    });
                }
                else
                {
                    mensaje(true);
                    $("#mensaje").css('color','orange');
                    $("#mensaje").text("Debe ingresar una identificación a buscar");
                    mensaje(false);
                }
            });
            //Editar
            $("#btneditar").click(function(){
                //Asignar datos a variables
                $ident = $("#txtident").val();
                $apellidos = $("#txtapellidos").val();
                $nombres = $("#txtnombres").val();
                $correo = $("#txtcorreo").val();
                $contrasena = $("#txtcontrasena").val();
                $contrasenaconf = $("#txtcontrasenaconf").val();
                //Validar que los datos se hayan llenado completamente
                if ($ident != "" && $apellidos != "" && $nombres != "" && $correo != "" && $contrasena != "" && $contrasenaconf != "")
                {
                    //Validar que las contraseñas sean iguales
                    if ($contrasena === $contrasenaconf )
                    {
                        //Guardar el registro del estudiante
                        $.ajax({
                            type: "POST",
                            url: "edestudiante.php",
                            data:{
                                ident: $ident,
                                apellidos: $apellidos,
                                nombres:$nombres,
                                correo:$correo,
                                contrasena:$contrasena
                            },
                            success:function(rta){
                                mensaje(true);
                                if (rta)
                                {
                                    //alert('El estudiante se guardó correctamente...');
                                    //Mostrar mensaje en el objeto con id mensaje
                                    $("#mensaje").css('color','green');
                                    $("#mensaje").text("El estudiante se actualizó correctamente...");
                                }
                                else
                                {
                                    //alert('La identificación existe. Inténtelo con otra');
                                    $("#mensaje").css('color','red');
                                    $("#mensaje").text("La identificación NO existe. Inténtelo con otra");
                                }
                                mensaje(false);
                            }
                        });
                    }
                    else
                    {
                        alert('Las contraseñas no son iguales. Verifique!');
                    }
                }
                else
                {
                    alert('Debe ingresar todos los datos!');
                }
            });
            //Eliminar
            $("#btneliminar").click(function(){
                //Confirmar el borrado del estudiante
                if (confirm("Está seguro de eliminar el estudiante"))
                {
                    mident = $("#txtident").val();
                    $.ajax({
                        type:'POST',
                        url: 'elestudiante.php',
                        data:{
                            ident:mident
                        },
                        success:function(confirmado){
                           mensaje(true); 
                           $("#mensaje").css('color','red');
                           if (confirmado)
                           {
                               $("#mensaje").text("El estudiante ha sido eliminado correctamente...");
                           }
                           else
                           {
                               $("#mensaje").text("El estudiante No se puede eliminar porque posee notas...");
                           }     
                           mensaje(false);
                        }
                    });
                }
            });
        });
    </script>
    <a href="cerrarsesion.php">Cerrar Sesión</a>
    <h1>Actualización de Estudiantes</h1>
    <form>
        <div class="form-group col-sm-6">
            Identificación
            <input type="text" id="txtident" name="txtident" class="form-control">
            <span id="mensaje">
                
            </span>
            <small id="idHelp" class="form-text text-muted">Nunca compartiremos su identificación</small>
        </div>
        <div class="form-group col-sm-6">    
            Apellidos
            <input type="text" id="txtapellidos" name="txtapellidos" class="form-control">
        </div>    
        <div class="form-group col-sm-6">
            Nombres
            <input type="text" id="txtnombres" name="txtnombres" class="form-control">
        </div>    
        <div class="form-group col-sm-6">
            Correo
            <input type="text" id="txtcorreo" name="txtcorreo" class="form-control">
        </div>    
        <div class="form-group col-sm-6">
            Contraseña
            <input type="password" id="txtcontrasena" name="txtcontrasena" class="form-control">
        </div>
        <div class="form-group col-sm-6">    
            Confirmar Contraseña
            <input type="password" id="txtcontrasenaconf" name="txtcontrasenaconf" class="form-control">
        <div> 
        <br>
        <button type="button" id="btnnuevo" name="btnnuevo" class="btn btn-primary">Nuevo</button>   
        <button type="button" id="btnguardar" name="btnguardar" class="btn btn-info">Guardar</button>
        <button type="button" id="btnbuscar" name="btnbuscar" class="btn btn-primary">Buscar</button>
        <button type="button" id="btneditar" name="btneditar" class="btn btn-primary">Editar</button>      
        <button type="button" id="btneliminar" name="btneliminar" class="btn btn-danger">Eliminar</button>   
        <button type="button" id="btnlistar" name="btnlistar" class="btn btn-primary">Listar</button>   
    </form>
    <br>
    <div id="listado">

    </div>
</body>
</html>