<?php

const PATHMATERIA_PROFESOR = "./data/materia-profesores.json";


function GuardarMateriasProfesores($legajo, $idMateria, $turno)
{
    $flag = true;
    if (
        strtolower($turno) == "mañana"
        || strtolower($turno) == "noche"
        || strtolower($turno) == "manana"
    ) {

        $dato["legajoprofesor"] = $legajo;
        $dato["idMateria"] = $idMateria;
        $dato["turno"] = $turno;

        $archivo = Leer(PATHMATERIA_PROFESOR);

        foreach ($archivo as  $value) {
            if (
                $legajo == $value['legajo']
                && $idMateria == $value['idMateria']
                && $turno == $value['turno']
            ) {
                $flag = false;
                break;
            }
        }
        if ($flag) {
            Escribir($dato, PATHMATERIA_PROFESOR);
        }
    } else {
        echo "Turno invalido.";
    }
}
