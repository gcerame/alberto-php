<?php

session_start();
if (!isset($_SESSION['saldo'])) {
    $_SESSION['saldo'] = 0;
}

$mensaje = '';
$importe = $_POST['importe'];

switch ($_POST['Orden']) {

    case 'Ingreso':
        $mensaje = ingresar($importe);
        break;
    case 'Reintegro':
        $mensaje = reintegrar($importe);
        break;
    case 'Ver saldo':
        $mensaje = leerSaldo();
        break;
    case 'Terminar':
        session_destroy();
        break;


}
header("Location: minibanco.php?msg=" . $mensaje);

function ingresar(): string
{
    $importe = intval($_POST['importe']);
    if ($importe > 0) {
        $_SESSION['saldo'] += $importe;
        return 'Operación realizada';

    } else {
        return 'Importe erróneo o importe menor de 0';
    }

}
function reintegrar(): string
{
    $importe = intval($_POST['importe']);
    if ($importe <= $_SESSION['saldo']) {
        $_SESSION['saldo'] -= $importe;
        return 'Operación realizada';
    } else {
        return 'Importe erroneo o superior al saldo';
    }
}
function leerSaldo(): string {
    return 'Su saldo actual es: '.$_SESSION['saldo'].' euros';
}