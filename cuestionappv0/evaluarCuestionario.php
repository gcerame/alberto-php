<?php
session_start();
require_once('funciones.php');
if(isset($_SESSION['preguntas'])){
    $resultados = comprobarPreguntas($_SESSION['preguntas'], $_POST);

}else{
    header('Location: hacerCuestionario.php');
}


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>CUESTIONARIO</title>
    <link href="web/default.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container" style="width: 800px;">
    <div id="header" style="background:gray;">
        <h1>Resultados:</h1>

    </div>
    <div>
        <p>Preguntas correctas: </p><?= $resultados[0] ?>
        <p>Preguntas incorrectas: </p><?= $resultados[1] ?>
        <p>Preguntas no contestadas: </p><?= $resultados[2] ?>
        <p></p>
        <a href="hacerCuestionario.php"><button>Volver</button></a>

    </div>
</body>

</html>