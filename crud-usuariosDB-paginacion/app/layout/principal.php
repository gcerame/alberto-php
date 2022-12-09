<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CRUD DE USUARIOS</title>
    <link href="web/default.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="web/js/funciones.js"></script>
</head>
<body>
<div id="container">
    <div id="header">
        <h1>GESTIÓN DE USUARIOS versión 1.1 + BD</h1>
    </div>
    <div id="content">
        <div id="tabla">
            <?= $contenido ?>
        </div>
        <form>
            <input type="submit" name="orden" value="Nuevo">
            <input type="submit" name="orden" value="Terminar">
            <input type="submit" name="orden" value="Primero">
            <input type="submit" name="orden" value="Siguiente">
            <input type="submit" name="orden" value="Anterior">
            <input type="submit" name="orden" value="Ultimo">
        </form>
    </div>
</div>
</body>
