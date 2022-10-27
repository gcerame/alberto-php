<?php

if (!isset($_SESSION)) {
    session_start();
    $_SESSION['usuario'] = $_POST['usuario'];
    include 'pedido.php';

}
