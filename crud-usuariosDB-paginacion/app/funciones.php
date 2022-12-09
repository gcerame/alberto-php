<?php
include_once 'app/config.php';
include_once 'app/AccesoDatos.php';



// MUESTRA TODOS LOS USUARIOS
function mostrarDatos ($posicionInicial, $posicionFinal){
    
    $titulos = ["id", "Nombre", "Apellido", "Email", "Género", "IP", "Teléfono"];
    $msg = "<table>\n";
     // Identificador de la tabla
    $msg .= "<tr>";
    for ($j=0; $j < count($titulos); $j++){
        $msg .= "<th>$titulos[$j]</th>";
    }  
    $msg .= "</tr>";
    $auto = $_SERVER['PHP_SELF'];
    $db = AccesoDatos::getModelo();
    $tuser = $db->getUsuarios($posicionInicial,$posicionFinal);
    foreach ($tuser as $user) {
        $msg .= "<tr>";
        $msg .= "<td>$user->id</td>";
        $msg .= "<td>$user->first_name</td>";
        $msg .= "<td>$user->last_name</td>";
        $msg .= "<td>$user->email</td>";
        $msg .= "<td>$user->gender</td>";
        $msg .= "<td>$user->ip_address</td>";
        $msg .= "<td>$user->telefono</td>";


        $msg .="<td><a href=\"#\" onclick=\"confirmarBorrar('$user->nombre','$user->id');\" >Borrar</a></td>\n";
        $msg .="<td><a href=\"".$auto."?orden=Modificar&id=$user->id\">Modificar</a></td>\n";
        $msg .="<td><a href=\"".$auto."?orden=Detalles&id=$user->id\" >Detalles</a></td>\n";
        $msg .="</tr>\n";
        
    }
    $msg .= "</table>";
   
    return $msg;    
}

/*
 *  Funciones para limpiar la entreda de posibles inyecciones
 */

function limpiarEntrada(string $entrada):string{
    $salida = trim($entrada); // Elimina espacios antes y después de los datos
    $salida = strip_tags($salida); // Elimina marcas
    return $salida;
}
// Función para limpiar todos elementos de un array
function limpiarArrayEntrada(array &$entrada){
 
    foreach ($entrada as $key => $value ) {
        $entrada[$key] = limpiarEntrada($value);
    }
}

