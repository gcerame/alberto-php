<?php
const MAX_FALLOS=5;
$fallosMaximosAlcanzados = false;
$palabraResuelta = false;
function controller()
{
    session_start();
    if (!isset($_SESSION['palabraSecreta'])) {
        $_SESSION['palabraSecreta'] = elegirPalabra();
        $palabraSecreta = &$_SESSION['palabraSecreta'];
        $_SESSION['palabraHuecos'] = generarPalabraConHuecos(strlen($_SESSION['palabraSecreta']));
        $palabraHuecos = &$_SESSION['palabraHuecos'];
        $_SESSION['fallos'] = 0;
        $fallos = &$_SESSION['fallos'];

    }
    if (isset($_POST['letra']) ){
        $palabraSecreta = &$_SESSION['palabraSecreta'];
        $palabraHuecos = &$_SESSION['palabraHuecos'];
        $fallos = &$_SESSION['fallos'];
        $letra = $_POST['letra'];
        if (comprobarLetra($letra,$palabraSecreta)){
            $palabraHuecos = rellenarHuecos($letra, $palabraHuecos, $palabraSecreta);
        }else{
            $fallos++;
            if ($fallos>MAX_FALLOS){
                $fallosMaximosAlcanzados = true;
            }
        }

    }
    vistaGeneral(vistaJuego());
}



function elegirPalabra(): string
{

    $palabras = array('Madrid', 'Barcelona', 'Paris');
    return $palabras[array_rand($palabras, 1)];
}

function comprobarLetra($letra, $palabra): bool
{
    return str_contains($palabra, $letra);
}

function generarPalabraConHuecos($tamano): array
{
    return array_fill(0,$tamano, '-');


}
function rellenarHuecos ($letra, $palabraHuecos, $solucion): array {
    $arraySolucion = str_split($solucion);
    if(in_array($letra, $arraySolucion)){
        $posiciones = array_keys($arraySolucion, $letra);
        foreach ($posiciones as $posicion){
            $palabraHuecos[$posicion]= $letra;
        }
    }
    return $palabraHuecos;
}

function vistaGeneral($contenido): void {
    echo '
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
'. $contenido. ' 
</body>
</html>
    
    ';

}

function vistaJuego(): string{
    $vista = '<p>Palabra: ' . implode($_SESSION['palabraHuecos']) . '</p>';
        $vista .= '<p>Has cometido ' . $_SESSION['fallos'] .' fallos.</p>';
    $vista .= '<form action="ahorcado.php" method="post"><label>Introduzca una letra<input name="letra"></label></form>';
    return $vista;

}
controller();
