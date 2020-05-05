<?php


use \Firebase\JWT\JWT;

const KEY = "pro3-parcial";

function CrearToken($data)
{
    $tiempo = time();
    $payload = array(

        'email' => $data['email'],
        'clave' => $data['clave']
    );
    return JWT::encode($payload, KEY);
}

function ValidarToken()
{
    $retorno = false;
    $token = getallheaders()['token'] ?? '';

    try {
        $usuarios = Leer(PATHUSR);
        $decoded = JWT::decode($token, KEY, array('HS256'));
        foreach ($usuarios as $value) {
            if ($value['email'] == $decoded->email && $value['clave'] == $decoded->clave) {
                $retorno = true;
                break;
            }
        }
    } catch (\Throwable $th) {
        echo $th->getMessage();
    }
    return $retorno;
}
