<?php
/*
 * - Definir dos variables asignándoles un valor entero aleatorio entre 1 y 10 y mostrar su suma,
 *  su resta, su división, su multiplicación, módulo y potencia
 */
$a = rand(1, 10);
$b = rand(1, 10);
echo "a = $a, b = $b\n" ;
echo "Suma: " . ($a + $b). "\n";
echo "Resta: " . ($a - $b). "\n";
echo "División: " . ($a / $b). "\n";
echo "Multiplicación: " . ($a * $b). "\n";
echo "Módulo: " . ($a % $b). "\n";
echo "Potencia: " . ($a ** $b). "\n";
?>