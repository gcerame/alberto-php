<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .jugador span {
            font-size: 50px;
        }
    </style>
    <title>Document</title>
</head>
<body>
<?php

include "dados.php";

$player1 = generate_dice_throws();
$player1_emojis = array_map('get_emoji', $player1);
$player1_total = calculate_sum($player1);
$player2 = generate_dice_throws();
$player2_emojis = array_map('get_emoji', $player2);
$player2_total = calculate_sum($player2);

echo '<div class="jugador">';
echo 'Jugador 1: ';
foreach ($player1_emojis as $value) {
    echo '<span>' . $value . '</span>';
};
echo $player1_total;

echo '</div>';

echo '<div class="jugador">';
echo 'Jugador 2: ';
foreach ($player2_emojis as $value) {
    echo '<span>' . $value . '</span>';
};
echo $player2_total;
echo '</div>';

echo '
<div>
Resultado:'.get_winner($player1_total, $player2_total).'
</div>';

?>
</body>
</html>