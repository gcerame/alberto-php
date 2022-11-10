<?php
require_once('dat/datos.php');
/**
 *  Devuelve true si el código del usuario y contraseña se
 *  encuentra en la tabla de usuarios
 * @param $login : Código de usuario
 * @param $clave : Clave del usuario
 * @return true o false
 */
function userOk($login, $clave): bool
{
    global $usuarios;

    if (isset($usuarios[$login])) {
        if ($usuarios[$login][1] === $clave) {
            return true;
        }
    }
    return false;
}

/**
 *  Devuelve el rol asociado al usuario
 * @param $login : código de usuario
 */
function getUserRol($login)
{
    global $usuarios;
    if (isset($usuarios[$login])) {
        return $usuarios[$login][2];
    }
    return false;
}

/**
 *  Muestra las notas del alumno indicado.
 * @param $codigo : Código del usuario
 * @return $devuelve una cadena con una tabla html con los resultados
 */
function verNotasAlumno($codigo): string
{
    $msg = "";
    global $nombreModulos;
    global $notas;
    global $usuarios;

    $msg .= " Bienvenido/a alumno/a: " . $usuarios[$codigo][0];
    $msg .= "<table>";
    $msg .= "<thead>
            <tr><td>Nombre modulo</td>
            <td>Nota</td></tr>
            </thead>";
    // Completar
    foreach ($nombreModulos as $clave => $modulo) {
        $msg .= "<tr>";
        $msg .= "<td>" . $modulo . "</td>";
        $msg .= "<td> " . $notas[$codigo][$clave] . "</td>";

    }
    $msg .= "</table>";
    return $msg;
}

/**
 *  Muestra las notas de todos alumnos.
 * @param $codigo : Código del profesor
 * @return $devuelve una cadena con una tabla html con los resultados
 */
function verNotaTodas($codigo): string
{
    $msg = "";
    global $nombreModulos;
    global $notas;
    global $usuarios;
    $msg .= " Bienvenido Profesor: " . $usuarios[$codigo][0];
    $msg .= "<table>";
    // Header tabla
    $msg .= "<thead>
    <tr>
    <td>Nombre</td>
";
    foreach ($nombreModulos as $nombreModulo) {
        $msg .= "<td>" . $nombreModulo . "</td>";
    }
    $msg .= "</tr>
</thead>";
    //Contenido tabla
    foreach ($notas as $index => $notasIndividuales) {
        $msg .= "<tr>";
        $msg .= "<td>" . $usuarios[$index][0] . "</td>";
        foreach ($notasIndividuales as $notaPorAsignatura) {
            $msg .= "<td>$notaPorAsignatura</td>";
        }
    }
    $msg .= "</table>";
    return $msg;
}
