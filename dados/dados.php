<?php


function generate_throw(): int
{
    return rand(1, 6);
}
function generate_dice_throws(): array
{
    $dice_throws = array_fill(0, 6, 0);
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


?>