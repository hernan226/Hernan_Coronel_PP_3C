<?php

function ListarMaterias()
{
    $listado = "MATERIAS: \n";
    $materias = Leer(PATHMATERIA);

    foreach ($materias as $value) {
        $listado =
            $listado
            . "\tNombre: " . $value['nombre'] . "\n"
            . "\tCuatrimestre: " . $value['cuatrimestre'] . "\n";
    }
}

function ListarProfesores()
{
    $listado = "PROFESORES: \n";
    $profesores = Leer(PATHPROFESOR);

    foreach ($profesores as $value) {
        $listado =
            $listado
            . "\tNombre: " . $value['nombre'] . "\n"
            . "\tLegajo: " . $value['legajo'] . "\n";
    }
}

function ListarAsignaciones()
{
    $listado = "ASIGNACIONES: \n";
    $profesores = Leer(PATHPROFESOR);
    $asignaciones = Leer(PATHMATERIA_PROFESOR);

    foreach ($profesores as $value) {
        $listado =
            $listado
            . "\tNombre: " . $value['nombre'] . " Legajo: " .  $value['legajo'] . "\n"
            . "MATERIAS: \n";
        foreach ($asignaciones as  $value2) {
            if ($value['legajo'] == $value2["legajoprofesor"]) {
                $listado =
                    $listado . "\tNombre: " . $value['nombre'] . " "
                    . "Cuatrimestre: " . $value['cuatrimestre'] . "\n";
            }
        }
    }
}
