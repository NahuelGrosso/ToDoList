<?php

require_once 'app/tareas.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' .$_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

//Falta agregar en el HEAD html=>          <base href="'.BASE_URL.'">

$action = 'mostrar'; // Accion por defecto
if (!empty ($_GET{'action'})){
    $action = $_GET['action'];
}

//Mostrar todas las tareas -->       verTareas();
//Agregar tarea nueva      -->       agregarTarea();
//Eliminar tarea/:id       -->       eliminarTarea($id);  
//Tarea  Realizada/:id     -->       tareaRealizada($id);

//Parsea la accion para separar la accion real de los paramentros
$params = explode('/',$action);

switch($params[0]){
    case 'mostrar':
        verTareas();
        break;
    case 'agregarTarea':
        agregarTarea();
        break;
    case 'eliminar':
        eliminarTarea($params[1]);
        break;
    case 'realizada':
        tareaRealizada($params[1]);
        break;    
    default:
    echo "ERROR 404";
    break;
}