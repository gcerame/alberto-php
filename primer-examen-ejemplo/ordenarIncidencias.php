<?php
require_once "incidencias.php";
function leerIncidencias(){
    $file = fopen("incidencias.txt", "r");
    $incidencias = [];
    while(!feof($file)){
        $linea = fgets($file);
        if($linea != ""){
            $linea = str_replace(PHP_EOL, "", $linea);
            $arrayLinea = explode(",", $linea);
            $incidencias[] = new Incidencia($arrayLinea[1], $arrayLinea[2], $arrayLinea[3], $arrayLinea[4]);
        }
    }
    fclose($file);
    return $incidencias;
}

//Function that sorts the Incidencia array by prioridad

function ordenarIncidencias($incidencias){
    usort($incidencias, function($a, $b){
        return $a->getPrioridad() - $b->getPrioridad();
    });
    return $incidencias;
}
//Function that writes the Incidencia array to incidencias.txt overwriting the file
function escribirIncidencias($incidencias): void
{
    $file = fopen("incidencias.txt", "w");
    foreach($incidencias as $incidencia){
        fwrite($file, $incidencia . PHP_EOL);
    }
    fclose($file);
}

$incidencias= leerIncidencias();
$incidencias = ordenarIncidencias($incidencias);
escribirIncidencias($incidencias);