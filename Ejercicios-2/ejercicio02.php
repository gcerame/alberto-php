<?php
require_once 'funcionesvar.php';
/*
 * Definir dos variables asignándoles un valor entero aleatorio entre 1 y 10, mostrar su suma,
 *  su resta, su división, su multiplicación, su módulo y su potencia.Crea un archivo llamado funcionesvar.php donde
 * estén definidas las cinco operaciones: suma, resta, división, producto, módulo y potencia. Incluir ese fichero dentro
 *  de fichero principal (require_once) y llamar  a las funciones para obtener el resultado.
 */
$a = rand(1, 10);
$b = rand(1, 10);



echo "a = $a, b = $b"  ."\n";
echo "Suma: " . sumar($a, $b) ."\n";
echo "Resta: " . restar($a,$b)."\n";
echo "División: " . dividir($a,$b)."\n";
echo "Multiplicación: " . multiplicar($a,$b)."\n";
echo "Módulo: " . modulo($a,$b);
echo "Potencia: " . potencia($a,$b);

?>