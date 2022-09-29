<?php
/*

 */
echo "Introduce un número: ";
$numero = trim(fgets(STDIN));
for ($i = 0; $i < $numero; $i++) {
    for ($j = 0; $j < $numero; $j++) {
        if($i==$numero-1){
            echo "*****";
        }else{
            echo "**** ";
        }
    }
    echo "\n";
  }
?>