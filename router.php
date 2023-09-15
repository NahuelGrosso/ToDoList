<?php

define('BASE_URL', '//'.$_SERVER['SERVER-NAME'] . ':' .$_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

//Falta agregar en el HEAD html=>          <base href="'.BASE_URL.'">

$action = 'home'; // Accion por defecto
if (!empty ($_GET{'action'})){
    $action = $_GET['action'];
}

//Parsea la accion para separar la accion real de los paramentros
$params = explode('/',$action);

switch($params[0]){
    
    default:
    echo "ERROR 404";
    break;
}