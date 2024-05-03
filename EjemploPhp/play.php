<?php

$disco = array(
    "cancion"=>$_POST['txttitulo'],
    "gener"=>$_POST['txtgenero'],
    10=>$_POST['txtduracion'],
    "cantante"=>$_POST['txtinterprete']
);

//var_dump($disco);

//Requerimiento: Dependiendo del titulo de la cancion,
//mostrar la letra
$letraCancion = array('tusa'=>'¿Qué pasa contigo?
Dímelo
Rrrr…
O-O-Ovy On The Drums

Ya no tiene excusa
Hoy salió con su amiga
Disque pa’ matar la tusa (Tusa)

Que porque un hombre le pagó mal
Esta dura y abusa (Ey)
Se cansó de ser buena
Ahora es ella quien los usa (Mmm, mmm)

Que porque un hombre le pagó mal (Mal)
Ya no se le ve sentimental (-tal)
Dice que por otro man no llora (Llora)
No',
'miFuerza'=>'A veces los sueños son
un mar de preguntas que no sé responder
Me pierdo una y otra vez
y no encuentro salidas a mi alrededor
pero este amor tan real cósmico universal
que yo siento por ti
me acelera y me enamora me lleva hacia ti
contigo solo quiero vivir

Y a veces creo que soy feliz como soy
mi fuerza eres tú
y no hay nadie que me entregue más amor
más calor y más luz
Mi fuerza eres tú
y a tu lado solo quiero estar');

//var_dump($letraCancion);
if (strtoupper($disco["cancion"]) == "TUSA") {
    echo "<p>";
        print('<iframe width="560" height="315" src="https://www.youtube.com/embed/tbneQDc2H3I" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
    echo "</p>";
    echo "<p>";
        echo ($letraCancion['tusa']);
    echo "</p>";
} else if (strtoupper($disco["cancion"]) == "MI FUERZA ERES TU") {
    echo "<pre>";
        echo ($letraCancion['miFuerza']);
    echo "</pre>";
} else {
    echo "No aplica";
}


