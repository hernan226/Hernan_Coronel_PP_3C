<?php

class Materia
{
    public  $nombre;
    public  $cuatrimestre;

    function __construct($nombre, $cuatrimestre)
    {
        $this->nombre = $nombre;
        $this->cuatrimestre = $cuatrimestre;
    }
}

function GuardarMateria($dato)
{
    Escribir((array) $dato, PATHMATERIA);
}
