<?php
/**
 *  Devuelve con la preguntas del cuestionario.
 *  Si no puede abrir el cuestionario devuelve un array de tamaño 0
 * @param fichero: ruta y nombre del archivo json
 */
function leerpreguntas ($fichero):array{
    $tabla=[];
    $preguntas = @file_get_contents($fichero);
    if ( $preguntas){
    $tabla = json_decode($preguntas);
    }
    return $tabla;
  }

  function comprobarPreguntas ($preguntas, $respuestas) {
        $soluciones = array_map(function($element) {
            return $element[1];
        }, $preguntas);
        $noContestadas = sizeof(array_diff_key($soluciones, $respuestas));

        $correctas = sizeof(array_intersect_assoc($soluciones, $respuestas));
        $incorrectas = sizeof(array_diff_assoc($soluciones, $respuestas));
        return array($correctas, $incorrectas, $noContestadas);

  }



