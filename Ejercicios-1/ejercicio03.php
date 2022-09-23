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
<code>
    <?php
    /*
     * Obtener un número al azar entre 1 y 9 y generar una pirámide con ese número de peldaños.
     * Número generado 5

        *
       ***
      *****
     *******
    *********
     */
    $numero = rand(1, 9);
    for ($i = 1; $i <= $numero; $i++) {
        for ($j = 1; $j <= $numero - $i; $j++) {
            echo "&nbsp;";
        }
        for ($j = 1; $j <= $i * 2 - 1; $j++) {
            echo "*";
        }
        echo "<br>";
    }
    ?>
</code>
</body>
</html>