<?php
require_once 'db.php';


// ==> Funcion para mostrar las tareas!!!
function verTareas()
{
    require_once 'templates/header.php';

    $tareas = traerTareas();
?>

    <div class="container">
        <?php require_once 'templates/formulario.php';
        ?>
        <div class="row">
            <div class="col">
                <?php
                echo "<h1> Tareas a Realizar </h1>";
                ?>
                <div class="tareas">
                    <ul class="list-group">
                        <?php foreach ($tareas as $tarea) { ?>
                            <li class="list-group-item">

                                <!-- POR MI CUENTA con ese link ir a una card donde muestre toda la info de la tarea-->
                                <a href="mostrar/<?php echo $tarea->id ?>">
                                    <b><?php echo $tarea->tarea; ?></b>
                                </a>
                                <!-- FIN POR MI CUENTA -->
                                <?php

                                //si prioridad es == 1 => verde     text-bg-secondary
                                //si es           == 2 => celeste   text-bg-info
                                //si es           == 3 => azul      text-bg-primary
                                //si es           == 4 => amarillo  text-bg-warning
                                //si es           == 5 => rojo      text-bg-danger

                                switch ($tarea->prioridad) {
                                    case $tarea->prioridad == 1:
                                        echo "bg-secondary";
                                        break;
                                    case $tarea->prioridad == 2:
                                        echo "bg-info";
                                        break;
                                    case $tarea->prioridad == 3:
                                        echo "bg-primary";
                                        break;
                                    case $tarea->prioridad == 4:
                                        echo "bg-warning";
                                        break;
                                    case $tarea->prioridad == 5:
                                        echo "bg-danger";
                                        break;
                                }
                                ?>

                                <span class="badge <?php

                                                    //si prioridad es == 1 => verde     text-bg-secondary
                                                    //si es           == 2 => celeste   text-bg-info
                                                    //si es           == 3 => azul      text-bg-primary
                                                    //si es           == 4 => amarillo  text-bg-warning
                                                    //si es           == 5 => rojo      text-bg-danger

                                                    switch ($tarea->prioridad) {
                                                        case $tarea->prioridad == 1:
                                                            echo "bg-secondary";
                                                            break;
                                                        case $tarea->prioridad == 2:
                                                            echo "bg-info";
                                                            break;
                                                        case $tarea->prioridad == 3:
                                                            echo "bg-primary";
                                                            break;
                                                        case $tarea->prioridad == 4:
                                                            echo "bg-warning";
                                                            break;
                                                        case $tarea->prioridad == 5:
                                                            echo "bg-danger";
                                                            break;
                                                    }
                                                    ?> rounded-pill position-absolute top-0 end-0">Prioridad <?php echo $tarea->prioridad; ?></span>
                                <div class=" ">
                                    <a href="eliminar/<?php echo $tarea->id ?>">
                                        <button type="button" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                            </svg> Eliminar</button>
                                    </a>
                                    <?php if (!$tarea->hecha) { ?>
                                        <a href="realizada/<?php echo $tarea->id ?>">
                                            <button type="button" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                    <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                                </svg> Realizada</button>
                                        </a>
                                    <?php } ?>
                                </div>

                            </li>

                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="col">
                <!-- Aca va la card de la tarea seleccionada -->
                <?php
                /*if (!empty($_GET[1])) {
                    $id = $_GET[1];
                    $tarea = traerTareas($id);
                    */
                ?>
                <!-- card  -->
                <h1> Informacion de la tarea </h1>
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h4 class="card-title">
                            <b><?php echo $tarea->tarea; ?></b>
                        </h4>

                        <span class="badge <?php

                                            //si prioridad es == 1 => verde     text-bg-secondary
                                            //si es           == 2 => celeste   text-bg-info
                                            //si es           == 3 => azul      text-bg-primary
                                            //si es           == 4 => amarillo  text-bg-warning
                                            //si es           == 5 => rojo      text-bg-danger

                                            switch ($tarea->prioridad) {
                                                case $tarea->prioridad == 1:
                                                    echo "bg-secondary";
                                                    break;
                                                case $tarea->prioridad == 2:
                                                    echo "bg-info";
                                                    break;
                                                case $tarea->prioridad == 3:
                                                    echo "bg-primary";
                                                    break;
                                                case $tarea->prioridad == 4:
                                                    echo "bg-warning";
                                                    break;
                                                case $tarea->prioridad == 5:
                                                    echo "bg-danger";
                                                    break;
                                            }
                                            ?> rounded-pill position-absolute top-0 end-0">Prioridad <?php echo $tarea->prioridad; ?></span>

                        <p class="card-text"> <b>Descripción:</b> <?php echo $tarea->descripcion; ?></p>


                        <a href="eliminar/<?php echo $tarea->id ?>">
                            <button type="button" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                </svg> Eliminar</button>
                        </a>
                        <?php if (!$tarea->hecha) { ?>
                            <a href="realizada/<?php echo $tarea->id ?>">
                                <button type="button" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                        <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                    </svg> Realizada</button>
                            </a>
                        <?php } ?>
                    </div>
                </div>


            <?php
            require_once 'templates/footer.php';
        }
            ?>
            </div>
        </div>
    </div>



    <?php

    // ==> Funcion para agregar tareas a la BBDD!!!
    function agregarTarea()
    {
        //VALIDACION DE DATOS!!!
        if (
            !empty($_POST['tarea']) &&
            !empty($_POST['prioridad'])
        ) {

            //Obtencion de los datos del formulario.
            $tarea = $_POST['tarea'];
            $descripcion = $_POST['descripcion'];
            $prioridad = $_POST['prioridad'];

            //Enviar los datos a la BBDD
            $id = insertarTarea($tarea, $descripcion, $prioridad);

            require_once 'templates/header.php';

            if ($id) {
                echo "Tarea cargada correctamente id= $id";
                //Yo lo quiero hacer con un boton que me envie a la pagina de inicio...
                // <button type="button" class="btn btn-secondary">Secondary</button>
                header('Location: ' . BASE_URL);
            } else {
                echo "Error al insertar la tarea!";
            }

            require_once 'templates/footer.php';
        } else {
            require_once 'templates/header.php';
            echo "<h2>Falta completar campos obligatorios del formulario</h2>";
            require_once 'templates/footer.php';
        }
    }

    // ==> Funcion para eliminar tareas!!!

    function eliminarTarea($id)
    {
        eliminaTarea($id);
        //Una vez eliminada la tarea renderiza el rout
        header('Location: ' . BASE_URL);
    }

    // ==> Funcion Tarea realizada!!!
    function tareaRealizada($id)
    {
        realizada($id);

        //Una vez eliminada la tarea renderiza el rout
        header('Location: ' . BASE_URL);
    }
