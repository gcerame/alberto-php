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
<?php
/*
 * Obtener un número al azar entre 1 y 9 y generar una la escalera numérica del tamaño indicado alternando colores entre
 * rojo y azul.
 */
$numero = rand(1, 9);
for ($i = 1; $i <= $numero; $i++) {
    for($j=1;$j<=$i;$j++){
        if($i%2==0){
            echo "<span style='color: red'>$i</span>";
        }else{
            echo "<span style='color: blue'>$i</span>";
        }

    }
    echo "<br>";
}
?>

</body>
</html>