<?php

function Escribir($dato, $path)
{
    $archivo = Leer($path);

    if (count($archivo) > 0)
        $dato["id"] =  $archivo[count($archivo) - 1]["id"] + 1;
    else
        $dato["id"] = 1;

    $archivo[] = $dato;

    $file = fopen($path, "w");
    fwrite($file, json_encode($archivo));
    fclose($file);
}

function Leer($path)
{
    $archivo = file_get_contents($path);
    return json_decode($archivo, true);
}

function GuardarFoto($file, $nombre)
{
    $tmp = $file["foto"]["tmp_name"];
    $foto = "imagenes/" . $nombre;

    move_uploaded_file($tmp, $foto);
}
