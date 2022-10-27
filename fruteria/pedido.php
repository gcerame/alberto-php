<?php
include_once 'header.php';


session_start();

if(!isset($_SESSION['usuario'])) header("Location: lafruteria.php");

$usuario = $_SESSION['usuario'];
echo "
<h2>Realice su compra ". $usuario . "</h2>";