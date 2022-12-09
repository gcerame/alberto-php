<?php
include_once "Usuario.php";
include_once "Cliente.php";

function accionBorrar ($login){    
    $db = AccesoDatos::getModelo();
    $tuser = $db->borrarUsuario($login);
}

function accionTerminar(){
    AccesoDatos::closeModelo();
    session_destroy();
}
 
function accionAlta(){
    $user = new Cliente();
    $user->id  = "";
    $user->first_name   = "";
    $user->last_name   = "";
    $user->email = "";
    $user->gender="";
    $user->ip_address="";
    $user->telefono="";
    $orden= "Nuevo";
    include_once "layout/formulario.php";
}

function accionDetalles($login){
    $db = AccesoDatos::getModelo();
    $user = $db->getUsuario($login);
    $orden = "Detalles";
    include_once "layout/formulario.php";
}


function accionModificar($login){
    $db = AccesoDatos::getModelo();
    $user = $db->getUsuario($login);
    $orden="Modificar";
    include_once "layout/formulario.php";
}

function accionPostAlta(){
    limpiarArrayEntrada($_POST); //Evito la posible inyección de código
    $user = new Usuario();
    $user->id  = $_POST['id'];
    $user->first_name   = $_POST['first_name'];
    $user->last_name  = $_POST['last_name'];
    $user->email = $_POST['email'];
    $user->gender = $_POST['gender'];
    $user->ip_address = $_POST['ip_address'];
    $user->telefono = $_POST['telefono'];
    $db = AccesoDatos::getModelo();
    $db->addUsuario($user);
    
}

function accionPostModificar(){
    limpiarArrayEntrada($_POST); //Evito la posible inyección de código
    $user = new Usuario();
    $user->id  = $_POST['id'];
    $user->first_name   = $_POST['first_name'];
    $user->last_name  = $_POST['last_name'];
    $user->email = $_POST['email'];
    $user->gender = $_POST['gender'];
    $user->ip_address = $_POST['ip_address'];
    $user->telefono = $_POST['telefono'];

    $db = AccesoDatos::getModelo();
    $db->modUsuario($user);
    
}

