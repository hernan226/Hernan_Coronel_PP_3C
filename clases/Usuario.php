<?php

class Usuario
{
    public  $email;
    public  $clave;

    function __construct($email, $clave)
    {
        $this->email = $email;
        $this->clave = $clave;
    }
}

function ValidarEmail($dato)
{
    $retorno = false;

    if (1 == preg_match(VALIDADOR_EMAIL, $dato))
        $retorno = true;

    return $retorno;
}


function Registrar($dato)
{
    if (ValidarEmail($dato->email)) {
        Escribir((array) $dato, PATHUSR);
    } else
        echo "EMAIL INVALIDO";
}


function Login($data)
{
    $jwt = "No se encontro usuario";

    $archivo = Leer(PATHUSR);
    foreach ($archivo as  $value) {
        if ($data['email'] == $value['email'] && $data['clave'] == $value['clave']) {
            $jwt = CrearToken($data);
            break;
        }
    }
    return $jwt;
}
