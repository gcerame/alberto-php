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

include "dados.php";

$jugador1 = generate_dice_throws();
$jugador2 = generate_dice_throws();
echo 'Jugador 1' . foreach ($jugador1 as $value){
    return '<span>'. $value.'</span>';
};
echo 'Suma' . array_sum($jugada);

?>
</body>
</html>