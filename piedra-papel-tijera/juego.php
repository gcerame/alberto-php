<?php

function randomPlay()
{
    return rand(1, 3);
}

const PIEDRA = 1;
const PAPEL = 2;
const TIJERA = 3;

function get_emoji($option)
{
    switch ($option) {
        case PIEDRA:
            return "🗿";
        case PAPEL:
            return "📃";
        case TIJERA:
            return "✂️";
        default:
            return "Error";
    }
}


function get_winner($option1, $option2)
{
    if ($option1 == $option2) {
        return "Empate";
    }
    if ($option1 == PIEDRA && $option2 == PAPEL) {
        return "Gana jugador 2";
    }
    if ($option1 == PIEDRA && $option2 == TIJERA) {
        return "Gana jugador 1";
    }
    if ($option1 == PAPEL && $option2 == PIEDRA) {
        return "Gana jugador 1";
    }
    if ($option1 == PAPEL && $option2 == TIJERA) {
        return "Gana jugador 2";
    }
    if ($option1 == TIJERA && $option2 == PIEDRA) {
        return "Gana jugador 2";
    }
    if ($option1 == TIJERA && $option2 == PAPEL) {
        return "Gana jugador 1";
    }
    return "Error";

}

?>

