<?php
include_once 'header.php';

$usuario = $_SESSION['usuario'];
echo "
<h2>Realice su compra ". $usuario . "</h2>";