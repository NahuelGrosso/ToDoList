<?php
require_once 'db.php';

function verTareas()
{
    require_once 'templates/header.php';

    $tareas = traerTareas();
?>
   
    <div class="container">
        <div class="row">
            <div class="col">
                <?php require_once 'templates/formulario.php';
                ?>
            </div>
            <div class="col">
                <?php
                echo "<h1> Tareas a Realizar </h1>";
                ?>
                <div class="tareas">
                    <ul class="list-group">
                        <?php foreach ($tareas as $tarea) { ?>
                            <li class="list-group-item">
                                <b><?php echo $tarea->tarea; ?></b>
                                <span class="badge bg-primary rounded-pill position-absolute top-0 end-0">Prioridad <?php echo $tarea->prioridad; ?></span>
                            </li>

                        <?php } ?>
                    </ul>
                </div>
            <?php
            require_once 'templates/footer.php';
        }
            ?>
            </div>
        </div>
    </div>

<?php
    function agregarTarea()
    {
    //VER VALIDACION DE DATOS!!!

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
    }