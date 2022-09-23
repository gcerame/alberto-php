<?php

/*
 * Realizar un programa en php que genere 50 números aleatorios en 1 y 100 y que muestre en una tabla
 *   html el valor máximo, el mínimo y la media con el siguiente formato:
  Nota definir los valores 50 y 100 como constantes en PHP
 */
function generar_aleatorios($min, $max, $cantidad)
{
    $aleatorios = array();
    for ($i = 0; $i < $cantidad; $i++) {
        $aleatorios[] = rand($min, $max);
    }
    return $aleatorios;
}
function mostrar_tabla($aleatorios,$borde)
{
    $maximo = max($aleatorios);
    $minimo = min($aleatorios);
    $media = array_sum($aleatorios) / count($aleatorios);
    echo "<table border='.$borde.'>";
    echo "<tr><th>Generación de 50 valores aleatorios</th></tr>";
    echo "<tr><td>Maximo: $maximo</td></tr>";
    echo "<tr><td>Minimo: $minimo</td></tr>";
    echo "<tr><td>Media: $media</td></tr>";
    echo "</table>";
}
mostrar_tabla(generar_aleatorios(1, 100, 50),20);

?>