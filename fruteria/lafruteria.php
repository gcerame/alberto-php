
<?php
include_once 'vistas.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    if(isset($_SESSION['usuario'])){
        mostrarPagina(mostrarFormularioPedido($_SESSION['usuario']));
    }else{
        if (isset($_GET['usuario'])){
            $_SESSION['usuario'] = $_GET['usuario'];
            mostrarPagina(mostrarFormularioPedido($_SESSION['usuario']));
        }else{
            mostrarPagina(mostrarLogin());

        }
    }
}elseif ($_SERVER['REQUEST_METHOD']==='POST'){
    if($_POST['submit']==='anotar'){
        $fruta= $_POST['frutas'];
        $cantidad= $_POST['cantidad'];
        $_SESSION['pedido'][$fruta] += $cantidad;
        $contenido = mostrarPedido().mostrarFormularioPedido($_SESSION['usuario']);
        mostrarPagina($contenido);
    }
}

?>
