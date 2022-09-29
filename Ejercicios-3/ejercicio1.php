<?php

function random()
{
    return rand(1, 10);
}
function generateRandomArray($size)
{

    $aleatorios = array_fill(0, 20, 0);
    return array_map('random', $aleatorios);
}

?>