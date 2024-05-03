<?php

class Persona{

    //Atributos - propiedades
    var $id;
    var $nombre;

    function estado(){
        print("Corriendo");
    }

    //Metodos - funciones
    //Mod Acc
    function arrancar()
    {
        echo $this->parada;
    }

    function correr($p){
        $this->parada=$p;
    }
    
}