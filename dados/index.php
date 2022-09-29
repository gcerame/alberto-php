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
$jugador1_emojis = array_map('get_emoji', $jugador1);
$jugador1_suma = array_sum($jugador1);
$jugador2 = generate_dice_throws();
$jugador2_emojis = array_map('get_emoji', $jugador2);
$jugador2_suma = array_sum($jugador2);

echo '<div class="jugador">';

foreach ($jugador1_emojis as $value) {
    echo '<span>' . $value . '</span>';
};
echo 'Suma Jugador 1 ' . $jugador1_suma;

echo '</div>';

echo '<div class="jugador">';
foreach ($jugador2_emojis as $value) {
    echo '<span>' . $value . '</span>';
};
echo 'Suma Jugador 2 ' . $jugador2_suma;
echo '</div>';
echo '
<div>
'.get_winner($jugador1_suma, $jugador2_suma).'
</div>';

?>
</body>
</html>