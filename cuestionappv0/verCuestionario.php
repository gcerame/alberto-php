<?php
require_once('funciones.php');
session_start();
$hayfichero = false;
$tpreguntas = [];
$claveok = false;
if (isset($_GET['clave']) && $_GET['clave'] == "abretesesamo") {
  $claveok = true;
}

if ($claveok && isset($_GET['nombrefichero'])) {
  $nombrefichero = $_GET['nombrefichero'];
  $_SESSION['nombrefichero'] = $nombrefichero;
  if (is_readable("dat/" . $nombrefichero)) {
    $tpreguntas = leerpreguntas("dat/" . $nombrefichero);
    if (count($tpreguntas) > 0) {
      $hayfichero = true;
    }
  }

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
      <h1>Ver Cuestionario</h1>
    </div>
    <div id="content">
      <?php if ($hayfichero) : ?>
        <p> Preguntas el fichero: <?= $nombrefichero ?> </p>
        <table style="border: 2px solid black;">
          <tr>
            <th>Nº</th>
            <th></th>
            <th>V</th>
            <th>F</th>
          </tr>
          <?php for ($i = 0; $i < count($tpreguntas); $i++) : ?>
            <tr>
              <td><?= ($i+1)."º " ?></td><td><?=$tpreguntas[$i][0] ?></td>
              <td><input type="radio" name="r<?= $i ?>" value="V" <?= ($tpreguntas[$i][1] == 'V') ? "checked='checked'" : "" ?>>
              <td><input type="radio" name="r<?= $i ?>" value="F" <?= ($tpreguntas[$i][1] === 'F') ? "checked='checked'" : "" ?>>
              </td>
            </tr>
          <?php endfor ?>
          <tr><td> </td></tr>
        </table>
        <button onclick="history.back()"> Volver </button>
      <?php else : ?>
        <form>
          Indique el nombre del fichero de cuestionario:
          <input type="text" name="nombrefichero"><br>
          Contraseña de acceso:
          <input type="password" name="clave">
          <button type="submit" name="procesar"> Enviar </button>
        </form>

      <?php endif ?>
    </div>
</body>

</html>