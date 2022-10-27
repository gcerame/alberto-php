<?php

if (!isset($_SESSION['usuario'])) {
    session_start();
    $_SESSION['usuario'] = $_POST['usuario'];
    header("Location: pedido.php");
}else{
    header("Location: pedido.php");

}
