<?php
const FILENAME = 'incidencias.txt';


function escribirIncidencia($incidencia): bool
{
    $incidencia = implode(',', $incidencia);
    return file_put_contents(FILENAME, $incidencia . PHP_EOL, FILE_APPEND);
}

function crearIncidencia()
{
    $nombre = $_POST['nombre'];
    $resumen = $_POST['resumen'];
    $prioridad = $_POST['prioridad'];
    $fecha = date('d:m:Y H:i');
    $ip = $_SERVER['REMOTE_ADDR'];
    return [ $fecha,$nombre, $resumen, $prioridad, $ip];
}

//User can't create more than 3 incidencias in 2 minutes using session
session_start();
if (!isset($_SESSION['incidencias'])) {
    $_SESSION['incidencias'] = 0;
}
if ($_SESSION['incidencias'] >= 3) {
    echo 'No puedes crear más de 3 incidencias en 2 minutos';
    die();
}

if (!empty($_POST)) {
    $incidencia = crearIncidencia();
    $escrituraOK = escribirIncidencia($incidencia);

    if ($escrituraOK) {
        $_SESSION['incidencias']++;

        echo 'Incidencia registrada';
    } else {
        echo 'Error al registrar la incidencia';
    }
}