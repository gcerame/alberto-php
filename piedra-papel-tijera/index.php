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
            font-family: sans-serif;
        }
        .juego{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap:20px;
            padding: 20px;
        }
        .jugadores{
            display:flex;
            gap:20px;
        }
        .jugador{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap:20px;
            padding: 20px;
            border: 1px solid;
            border-radius: 10px;
            background: darkgray;
        }
        .emoji{
            font-size: 50px;
        }
        h2{
            margin:0;
        }
        .resultado{
            font-size: 30px;
            padding: 20px;
            border: 1px solid;
            border-radius: 10px;
            background: darkgray;

        }
    </style>
</head>
<body>
<?php
include "juego.php";
$jugador1 = randomPlay();
$jugador2 = randomPlay();
$emojiJugador1 = get_emoji($jugador1);
$emojiJugador2 = get_emoji($jugador2);
$resultado = get_winner($jugador1, $jugador2);
echo '
<div class="juego">
    <div class="jugadores">
        <div class="jugador">
                <h2>Jugador 1</h2>
                <div class="emoji">' . $emojiJugador1 . '</div>
        </div>
        <div class="jugador">
            <h2>Jugador 2</h2>
            <div class="emoji">' . $emojiJugador2 . '</div>
        </div>
    </div>
    <div class="resultado">' . $resultado . '</div>
</div>
';
?>
</body>
</html>