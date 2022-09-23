<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
            background: darkgray;
        }
        .contenedor{
            display: inline-flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            align-items: center;
            border: 1px solid;
            background: white;
        }
        table{
            border: 1px solid;
        }
        td{
            border: 1px solid;
        }
        .titulo{
            background: blue;
            padding: 10px;
        }
        .tabla{
            padding: 10px;
        }
    </style>
</head>
<body>
<div class="contenedor">
    <div class="titulo">
        <h1>Tabla de multiplicar</h1>
    </div>
    <div class="tabla"><?php
        $numero = rand(1, 10);
        echo "<table>";
        for ($i = 1; $i <= 10; $i++) {
            echo "<tr><td>$numero x $i=</td><td>" . $numero * $i . "</td></tr>";
        }
        ?></div>

</div>


</body>
</html>