<?php
/*
 * Realizar un programa que genere una tabla html de 10x10 con casillas de 30x30 px donde cada casilla tenga un color aleatorio
 * obtenido mediante una función que genera un color diferente en cada casilla.
 */
$generar_color = function () {
    $color = "#";
    for ($i = 0; $i < 6; $i++) {
        $color .= dechex(rand(0, 15));
    }
    return $color;
};
$generar_rgbwb = function () {
    $colores = array("red", "green", "blue", "white", "black");
    return $colores[rand(0, 4)];

};
$generar_tabla = function ($filas, $columnas, $funcion_color) use ($generar_color, $generar_rgbwb) {
    echo "<table border='1'>";
    for ($i = 0; $i < $filas; $i++) {
        echo "<tr>";
        for ($j = 0; $j < $columnas; $j++) {
            $color = $funcion_color();
            echo "<td width='30px' height='3'px' bgcolor='" . $color . "'></td>";
        }
        echo "</tr>";
    }
    echo "</table>";
};

$generar_tabla(10, 10, 30, 30, $generar_color());
$generar_tabla(10, 10, 30, 30, $generar_rgbwb());
?>