<?php

class Profesor
{
    public  $nombre;
    public  $legajo;
    public  $foto;

    function __construct($nombre, $legajo, $foto)
    {
        $this->nombre = $nombre;
        $this->legajo = $legajo;
        $this->foto = $foto;
    }
}

function GuardarProfesor($dato)
{
    Escribir((array) $dato, PATHPROFESOR);
    GuardarFoto($_FILES, $dato->foto);
}
