<?php

class Incidencia
{
    private $fecha;
    private $usuario;
    private $descripcion;
    private $prioridad;
    private $ip;

    public function __construct( $usuario, $descripcion, $prioridad, $ip)
    {
        //Get current date and time and put them in fecha
        $this->fecha = date('m:d:Y h:i', time());
        $this->usuario = htmlspecialchars($usuario);
        $this->descripcion = htmlspecialchars($descripcion);
        $this->prioridad = htmlspecialchars($prioridad);
        $this->ip = $ip;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getPrioridad()
    {
        return $this->prioridad;
    }

    public function getIp()
    {
        return $this->ip;
    }

    public function __toString()
    {
        return $this->fecha . "," . $this->usuario . "," . $this->descripcion . "," . $this->prioridad . "," . $this->ip;
    }

}

function escribirIncidencia(Incidencia $incidencia){
    $file = fopen("incidencias.txt", "a");
    fwrite($file, $incidencia . PHP_EOL);
    fclose($file);

}
function leerIncidenciaPost(){
   return new Incidencia($_POST['nombre'], $_POST['resumen'], $_POST['prioridad'], $_SERVER['REMOTE_ADDR']);
}

if(isset($_POST['nombre']) && isset($_POST['resumen']) && isset($_POST['prioridad'])){
    if(!isset($_COOKIE['incidencias'])){
        escribirIncidencia(leerIncidenciaPost());
        setcookie('incidencias', 1, time() + 120);
    }else{
        if($_COOKIE['incidencias'] < 3){
            escribirIncidencia(leerIncidenciaPost());
            setcookie('incidencias', $_COOKIE['incidencias'] + 1, time() + 120);
        }else{
            echo "No puedes añadir más incidencias";
        }
    }
}


escribirIncidencia(leerIncidenciaPost());