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

function removeInjectedCode(&$string){
    return $string = htmlspecialchars($string);
}

function mostRepeatedWord($string){
    $stringLowerCase = strtolower($string);
    $frequencies = array_count_values(str_word_count($stringLowerCase,1));
    ksort($frequencies);
    return array_key_first($frequencies);
}

function mostRepeatedChar($string){
    $chars = array_count_values(str_split($string));
    ksort($chars);
    return array_key_first($chars);
}

echo mostRepeatedChar('abbbbbccc');


