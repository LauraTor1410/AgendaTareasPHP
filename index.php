<?php

include_once('tareas.php');
// Verificar si el usuario ha iniciado sesión, si no, redirigirlo a la página de inicio de sesión
if (!isset($_SESSION['nombre_usuario'])) {
    header("Location: inicio_sesion.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link  rel="stylesheet" href=style.css type="text/css">
        <title>Agenda de Tareas</title>
    </head>
    <body>
        <h1>Agenda de Tareas</h1>
        <form method="POST" action="<?= $_SERVER['PHP_SELF']?>" >
            
            <fieldset id="nuevaTarea">
                <legend>Nueva Tarea:</legend>
                <label for="tarea">Tarea:</label>
                <input type="text" name="tarea" id="tarea"/>
                <?php
                    //Si pulsamos añadir pero esta vacio
                    if(isset($_POST['añadir']) && empty($_POST['tarea'])){
                        echo $tareavacia;
                    }
                ?>
                <br>
                <br>
                <button type="submit" name="añadir" class="botonEnviar">Añadir Tarea</button>
                <button type="reset" class="botonReset">Limpiar Campos</button>  
            </fieldset>           
            <br>
            <?php
                //Incluimos el listado de tareas
                include_once('listado_tareas.php');
            ?>
            <br>
            <br>
            <fieldset id="accionesTarea">
                <label for="selecTarea">Num Tarea:</label>
                <input type="number" name="selecTarea" min="1" max="<?= count($listado) ?>"/>
                <input type="submit" name="completarTarea" class="botonEnviar" value="Tarea Completada"> 
                <input type="submit" name="borrarTarea" class="botonEnviar" value="Tarea Borrada"/>
                <br>
                <input type="submit" name="vaciar" class="botonBorrar" formmethod="GET" value="Vaciar Agenda"/>
               
            </fieldset>
        </form>
    </body>
</html>
