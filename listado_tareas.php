<?php
    echo '<fieldset id="listaTarea">
                <legend>Lista Tareas:</legend>';
    //Si no hay nada en el array 
    if(count($listado)==0){
        echo "No hay tareas";
    }else{
        echo '<table>
                    <thead>
                        <th>Número de Tarea</th>
                        <th>Tarea</th>
                        <th>Completado</th>
                    </thead>
                    <tbody>';
        //Con un foreach recorro el array y muestro todo en una tabla 
        foreach ($listado as $numeroTarea => $tarea ){
            $nombre=$tarea['nombre']; 
            $estado=$tarea['estado'];
            $numeroTarea+=1;
            echo "<tr>";
            echo "<td>$numeroTarea</td>";
            echo "<td>$nombre</td>";
            echo "<td>$estado</td>";
            echo "</tr>";
        }         
        echo '  </tbody>
                </table>
            </fieldset>';
    }
?>

