<?php

function mostrarLogin()
{
    return '
    <form method="get">
    <label for="nombre">
    <span>Introduzca su nombre de cliente:</span>
    <input type="text" name="usuario" id="usuario">
    <input type="submit" value="Enviar" >
    </label>
    </form>
';
}

function mostrarPedido ()
{
    $salida = '<div>';
    $salida .= '<ul>';

    foreach ($_SESSION['pedido'] as $fruta => $cantidad) {
        $salida .= '<li>' . $fruta . ' ' . $cantidad . '</li>';
    }
    $salida .= '</ul>';
    $salida .= '</div>';

    return $salida;
}

function mostrarFormularioPedido($usuario)
{
    $pedido = "";
    $pedido .= '
<h2>Realice su compra ' . $usuario . '</h2>
';

    $pedido .= '
<span>Seleccione la fruta</span>
 <form method="post">
 ';

    $pedido .=
        '
<select name="frutas" id="frutas">
<option value="naranjas">Naranjas</option>
<option value="limones">Limones</option>
<option value="platanos">Plátanos</option>
<option value="manzanas">Manzanas</option>
</select>
<input type="number" name="cantidad" id="cantidad" min="0">
<button type="submit" name="submit" value="anotar">Anotar</button>
<button type="submit" name="submit" value="terminar">Terminar</button>

</form>
';

    return $pedido;
}

function mostrarPagina(string $contenido)
{
    echo '
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Frutería del siglo XXI</title>
</head>
<body>
<h1>La frutería del Siglo XXI</h1>
    <h2>Bienvenido a nuestra frutería del siglo XXI</h2>' . $contenido . '
</body>
</html>';
}