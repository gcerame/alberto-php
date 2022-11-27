<?php
const FILENAME = 'incidencias.txt';

function ordenarIncidencias($incidencias){
    usort($incidencias, function ($a, $b) {
        return $a[3] - $b[3];
    });
}
function reescribirArchivo($incidencias){
   $file = fopen(FILENAME, 'w');
    foreach ($incidencias as $incidencia) {
         fputcsv($file, $incidencia);
    }
}
function leerArchivoIncidencias($filename): array
{
    $incidencias = file($filename);
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