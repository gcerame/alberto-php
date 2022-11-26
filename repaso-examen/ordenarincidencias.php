<?php
const FILENAME = 'incidencias.txt';

function ordenarIncidencias($incidencias){
    //Ordena por prioridad
    usort($incidencias, function ($a, $b) {
        return $a[3] - $b[3];
    });
}
function reescribirArchivo($incidencias){
  //Put each incidencia in a new line
   $file = fopen(FILENAME, 'w');
    foreach ($incidencias as $incidencia) {
         fputcsv($file, $incidencia);
    }
}
function leerArchivoIncidencias($filename): array
{
    $incidencias = file($filename);
    //Si no existe el archivo, devolvemos un array vacío
    if ($incidencias === false) {
        return [];
    }
    foreach ($incidencias as $key => $incidencia) {
        $incidencias[$key] = explode(',', $incidencia);
    }
    return $incidencias;

}


$incidencias = leerArchivoIncidencias(FILENAME);
ordenarIncidencias($incidencias);
reescribirArchivo($incidencias);