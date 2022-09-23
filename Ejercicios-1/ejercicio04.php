<?php
/*
 * Generar números al azar entre 1 y 10 hasta que se generen 3 veces el valor 6 de forma consecutiva en ese caso se
 * mostrará cuantos número se han generado.

Han salido tres 6 seguidos tras genera 1343 números en 1.002 milisegundos

Para obtener los segundos utilizamos la función microtime(true)  para obtener la fecha actual en segundos.
 */
function generar_aleatorios($min, $max){
    return rand($min, $max);
}
$aleatorios = array();
$contador_aleatorios= 0;

while(sizeof($aleatorios)<=3){
    $aleatorio= generar_aleatorios(1, 10);
    if($aleatorio==6){
        $aleatorios[]=$aleatorio;
        }
    $contador_aleatorios++;
}

echo "Han salido tres 6 seguidos tras genera $contador_aleatorios números en ".(microtime(true)-$_SERVER["REQUEST_TIME_FLOAT"])." milisegundos";

?>