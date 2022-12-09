<?php
session_start();

include_once 'app/funciones.php';
include_once 'app/acciones.php';
include_once 'app/AccesoDatos.php';
const FILAS_POR_PAGINA = 10;

$db = AccesoDatos::getModelo();
$totalFilas = $db->getNumClientes();



if ( $totalFilas % FILAS_POR_PAGINA == 0){
    $posicionFinal = $totalFilas - FILAS_POR_PAGINA;
} else {
    $posicionFinal = $totalFilas - $totalFilas % FILAS_POR_PAGINA;
}


if ( !isset($_SESSION['posicionInicial']) ){
    $_SESSION['posicionInicial'] = 0;
}
$posicionInicial = $_SESSION['posicionInicial'];


// Div con contenido
$contenido="";
if ($_SERVER['REQUEST_METHOD'] == "GET" ){
    
    if ( isset($_GET['orden'])){
        switch ($_GET['orden']) {
            case "Nuevo"    : accionAlta(); break;
            case "Borrar"   : accionBorrar   ($_GET['id']); break;
            case "Modificar": accionModificar($_GET['id']); break;
            case "Detalles" : accionDetalles ($_GET['id']);break;
            case "Terminar" : accionTerminar(); break;
            case "Primero"  : $posicionInicial = 0; break;
            case "Siguiente": $posicionInicial +=FILAS_POR_PAGINA; if ($posicionInicial > $posicionFinal) $posicionInicial=$posicionFinal; break;
            case "Anterior" : $posicionInicial -=FILAS_POR_PAGINA; if ($posicionInicial < 0) $posicionInicial =0; break;
            case "Ultimo"   : $posicionInicial = $posicionFinal; break;
        }
    }
}
// POST Formulario de alta o de modificación
else {
    if (  isset($_POST['orden'])){
         switch($_POST['orden']) {
             case "Nuevo"    : accionPostAlta(); break;
             case "Modificar": accionPostModificar(); break;
             case "Detalles":; // No hago nada
         }
    }
}
$_SESSION['posicionInicial'] = $posicionInicial;

$contenido .= mostrarDatos($posicionInicial, FILAS_POR_PAGINA);
// Muestro la página principal
include_once "app/layout/principal.php";




