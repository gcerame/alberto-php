<?php
function usuarioOk($usuario, $contraseña): bool
{
    if (strlen($usuario)>=8 ) {
        $usuario_reversed=strrev($usuario);
        if ($usuario_reversed===$contraseña) {
            return true;
        }
    }
    return false;

}

function removeInjectedCode($string){
    return trim(htmlspecialchars($string, ENT_QUOTES, 'UTF-8'));
}

function mostRepeatedWord($string){
    $stringLowerCase = strtolower($string);
    $frequencies = array_count_values(str_word_count($stringLowerCase,1));
    ksort($frequencies);
    return $frequencies[array_key_first($frequencies)];
}
