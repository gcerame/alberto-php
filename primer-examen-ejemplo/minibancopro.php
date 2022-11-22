<?php
const ERROR = -1;
session_start();
if (!isset ($_SESSION['saldo'])){
    $_SESSION['saldo'] = 0;
}
$saldo = &$_SESSION['saldo'];

if (isset($_POST['Orden'])){
    $importe = $_POST['importe'] ?? ERROR;
    $mensaje = '';
    switch ($_POST['Orden']){
        case "Ingreso":
            if ($importe>=0){
                $saldo+=$importe;
                $mensaje= 'Operación realizada';
            }else{
                $mensaje='Importe Erróneo o importe menor de 0';
            }
            break;
        case "Reintegro":
            if ($importe>=0 && $importe < $saldo){
                $saldo-=$importe;
                $mensaje= 'Operación realizada';
            }else{
                $mensaje='Importe Erróneo o importe superior al saldo';
            }
            break;
        case "Ver saldo":
            $mensaje= 'Su saldo actual es de '.$saldo.' euros';
            break;
        case "Terminar":
            session_destroy();
            break;
    }
    header("Location: minibanco.php?msg=".urlencode($mensaje));

}