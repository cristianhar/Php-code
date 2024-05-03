<?php

class Vehiculo{

    //Atributos - Propiedades
    var $placa;
    var $marca;
    var $linea;
    var $matricula;
    var $modelo;

    //Funcion - Metodo
    function estado(){
        print("Tu " . $this->marca .
            " " . $this->linea .
            " esta Melo!!");
    }
}