<?php
    //Iniciamos sesion para guardar datos
    session_start();
    
    //Si no hay datos guardados se crea el array
    if(!isset($_SESSION['datos'])){
        $_SESSION['datos']= array();
        $listado = array();
    }else{
    //Si hubiera datos los guardamos para conservarlos
        $listado = $_SESSION['datos'];
    }
    
    // si se introduce una tarea y no esta vacia 
    if(!empty($_POST['tarea'])){
        //La saneamos y la introducimos en el listado
        $nuevatarea = filter_input(INPUT_POST, 'tarea', FILTER_SANATIZE_STRING);
        $listado[]=[
            "nombre"=>$nuevatarea,
            "estado"=>"No"
        ];
        //actualizamos los datos
        $_SESSION['datos'] = $listado;
    //Si la tarea esta vacia
    }else{
        $tareavacia ="(*)Nombre Obligatorio";
    }
    
    //Si pulsamos el boton de borrar tarea
    if(isset($_POST['borrarTarea']) && !empty($_POST['selecTarea'])){
        $numeroTarea = ($_POST['selecTarea'])-1; //restamos uno por que los array empiezan en 0
        unset($listado[$numeroTarea]); //borramos y actualizamos
        $listado = array_values($listado);
        //actualizamos
        $_SESSION ['datos'] = $listado;
    }
    //Si pulsamos el boton commpletar tarea 
    
    if(isset($_POST['completarTarea']) && !empty($_POST['selecTarea'])){
       $numeroTarea = ($_POST['selecTarea'])-1; //restamos uno por que los array empiezan en 0
       $listado[$numeroTarea]["estado"]="Si"; // cambiamos ese elemento
       //actualizamos
       $_SESSION['datos']=$listado;
    }
       //Si pulsamos el boton vaciar se envia un atributo get en method
    if (isset($_GET['vaciar'])) {  
        $listado=array(); //reseteamos  el array;
        
        //Siempre guardamos/actualizamos los datos 
        $_SESSION['datos']=$listado;
    }
?>  