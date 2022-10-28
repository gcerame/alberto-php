<?php
include_once 'header.php';


session_start();

if (!isset($_SESSION['usuario'])) header("Location: lafruteria.php");

$usuario = $_SESSION['usuario'];

echo "
<h2>Realice su compra " . $usuario . "</h2>
";

echo '
<span>Seleccione la fruta</span>
 <form action="pedido.php" method="post">
 ';

echo '
<select name="frutas" id="frutas">
<option value="naranjas">Naranjas</option>
<option value="limones">Limones</option>
<option value="platanos">Plátanos</option>
<option value="manzanas">Manzanas</option>
</select>
<input type="number" name="cantidad" id="cantidad" min="0">
<button type="">Anotar</button>
<button type="">Terminar</button>

</form>
';