<?php

//Funcion para conectar con la BBDD
function conexionBBD(){
    return new PDO('mysql:host=localhost;dbname=db_lista_de_tareas;charset=UTF8', 'root', '');
}
//Funcion para obtener y devolver las tareas de la BBDD

function traerTareas(){
    //1- Abrimos conexion con la BBDD
    $db = conexionBBD();

    //2- Enviamos y recibimos los resultados de la consulta
    $consulta = $db->prepare('SELECT * FROM tareas');
    $consulta->execute();

    //Se obtienen todos los datos que nos da la consulta
    $tareas = $consulta->fetchAll(PDO::FETCH_OBJ);

   return $tareas;
}

//Funcion para insertar los datos provenientes del formularios
//en la BBD

function insertarTarea($tarea, $descripcion, $prioridad){
    //1- Abrimos conexion con la BBDD
    $db = conexionBBD();

    //2- Enviamos y recibimos los resultados de la consulta
    $consulta = $db->prepare('INSERT INTO tareas(tarea, descripcion, prioridad) VALUES (?,?,?)');
    $consulta->execute([$tarea, $descripcion, $prioridad]);
    
    return $db->lastInsertId();
}