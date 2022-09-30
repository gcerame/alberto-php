<?php


function generate_throw(): int
{
    return rand(1, 6);
}
function generate_dice_throws(): array
{
    $dice_throws = array_fill(0, 5, 0);
    return array_map('generate_throw', $dice_throws);
}

function get_emoji($number): string
{
    return match ($number) {
        1 => '&#9856',
        2 => '&#9857',
        3 => '&#9858',
        4 => '&#9859',
        5 => '&#9860',
        6 => '&#9861',
        default => 'Error',
    };
}
function get_winner($player1, $player2): string{
    if($player1 ===$player2) return 'Empate';
    if($player1 > $player2) return 'Gana el Jugador 1';
    if($player1 < $player2)
        return 'Gana el Jugador 2';
    return 'Error';
}
function calculate_sum($play){
    $sum = array_sum($play);
    $max = max($play);
    $min = min($play);
    return $sum - $max - $min;
}

?>