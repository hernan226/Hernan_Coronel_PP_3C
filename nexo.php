<?php
include_once './vendor/autoload.php';
include_once './clases/Usuario.php';
include_once './clases/Materia.php';
include_once './clases/Profesor.php';
include_once './funciones/JsonWebToken.php';
include_once './funciones/archivos.php';
include_once './funciones/GuardarMateriasPofesores.php';
include_once './funciones/Listar.php';

const PATHUSR = "./data/users.json";
const VALIDADOR_EMAIL = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";
const PATHPROFESOR = "./data/profesores.json";
const PATHMATERIA = "./data/materias.json";

use \Firebase\JWT\JWT;

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    switch ($_GET['opcion']) {

        case 'materia':
            if (ValidarToken())
                ListarMaterias();
            else
                echo "TOKEN INVALIDO";
            break;
        case 'profesor':
            if (ValidarToken())
                ListarProfesores();
            else
                echo "TOKEN INVALIDO";
            break;

        case 'asignacion':
            if (ValidarToken())
                ListarAsignaciones();
            else
                echo "TOKEN INVALIDO";
            break;

        default:
            break;
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch ($_POST['opcion']) {

        case 'usuario':
            Registrar(
                new Usuario(
                    $_POST['email'],
                    $_POST['clave']
                )
            );
            break;
        case 'login':
            echo Login(
                array(
                    'email' => $_POST['email'],
                    'clave' => $_POST['clave']
                )
            );
            die();
            break;
        case 'materia':
            if (ValidarToken())
                GuardarMateria(
                    new Materia(
                        $_POST['nombre'],
                        $_POST['cuatrimestre']
                    )
                );
            else
                echo "TOKEN INVALIDO";
            break;
        case 'profesor':
            if (ValidarToken())
                GuardarProfesor(
                    new Profesor(
                        $_POST['nombre'],
                        $_POST['legajo'],
                        $_POST['nombre'] . "-" . $_POST['legajo'] . "." . pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION)
                    )
                );
            else
                echo "TOKEN INVALIDO";
            break;

        case 'asignacion':
            if (ValidarToken())
                GuardarMateriasProfesores(
                    $_POST['legajo'],
                    $_POST['idMateria'],
                    $_POST['turno']
                );
            else
                echo "TOKEN INVALIDO";
            break;

        default:
            break;
    }
}
