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

                                <span class="badge bg-primary rounded-pill position-absolute top-0 end-0">Prioridad <?php echo $tarea->prioridad; ?></span>
                                <div class=" ">
                                    <a href="eliminar/<?php echo $tarea->id ?>">
                                        <button type="button" class="btn btn-danger">Eliminar</button>
                                    </a>
                                    <?php if (!$tarea->hecha) { ?>
                                        <a href="realizada/<?php echo $tarea->id ?>">
                                            <button type="button" class="btn btn-success">Realizada</button>
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

                        <span class="badge bg-primary rounded-pill position-absolute top-0 end-0">Prioridad <?php echo $tarea->prioridad; ?></span>

                        <p class="card-text"> <b>Descripción:</b> <?php echo $tarea->descripcion; ?></p>


                        <a href="eliminar/<?php echo $tarea->id ?>">
                            <button type="button" class="btn btn-danger">Eliminar</button>
                        </a>
                        <?php if (!$tarea->hecha) { ?>
                            <a href="realizada/<?php echo $tarea->id ?>">
                                <button type="button" class="btn btn-success">Realizada</button>
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
