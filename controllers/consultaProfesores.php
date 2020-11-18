<?php
require_once("../funciones.php");
require_once("../reports/consultaProfesoresPDF.php");

//Profesores
$nombreProfesor = filter_input(INPUT_POST, 'nombre');
$apellidos = filter_input(INPUT_POST, 'apellidos');
$email = filter_input(INPUT_POST, 'email');
$direccion = filter_input(INPUT_POST, 'direccion');
$cp = filter_input(INPUT_POST, 'cp');
$poblacion = filter_input(INPUT_POST, 'poblacion');
$provincia = filter_input(INPUT_POST, 'provincia');

//Imparte
$clase = filter_input(INPUT_POST,'clase');

//Asignaturas
$nombreAsignatura = filter_input(INPUT_POST,'nombreAsignaturas');
$curso = filter_input(INPUT_POST,'curso');

$sql="
    SELECT 
        profesores.nombre AS nombre_profesor,
        profesores.apellidos,
        profesores.email,
        profesores.direccion,
        profesores.cp,
        profesores.poblacion,
        profesores.provincia,

        impartir.clase,

        asignaturas.nombre AS nombre_asignatura,
        asignaturas.curso 

    FROM profesores 
        JOIN impartir ON profesores.profesor_id = impartir.profesor_id
        JOIN asignaturas ON asignaturas.asignatura_id = impartir.asignatura_id ";

        $sql2="";
        $argo=false;
        if(
        !empty($nombreProfesor)||
        !empty($apellidos)||
        !empty($email)||
        !empty($direccion)||
        !empty($cp)||
        !empty($poblacion)||
        !empty($provincia)||
        !empty($clase) ||
        !empty($nombreAsignatura)||
        !empty($curso)){
            $sql2= $sql2." WHERE ";
            $argo=true;
        }

        if(!empty($nombreProfesor)){
        $sql2= $sql2."profesores.nombre = '".$nombreProfesor."' AND ";
        //echo $nombreProfesor;
        }
        if(!empty($apellidos)){
        $sql2= $sql2."profesores.apellidos = '".$apellidos."' AND ";
        }
        if(!empty($email)){
        $sql2= $sql2."profesores.email = '".$email."' AND ";
        }
        if(!empty($direccion)){
        $sql2= $sql2."profesores.direccion = '".$direccion."' AND ";
        }
        if(!empty($cp)){
        $sql2= $sql2."profesores.cp = '".$cp."' AND ";
        }
        if(!empty($poblacion)){
        $sql2= $sql2."profesores.poblacion = '".$poblacion."' AND ";
        }
        if(!empty($provincia)){
        $sql2= $sql2."profesores.provincia = '".$provincia."' AND ";
        }

        if(!empty($provincia)){
        $sql2= $sql2."impartir.clase = '".$provincia."' AND ";
        }

        if(!empty($nombreAsignatura)){
        $sql2= $sql2."asignaturas.nombre = '".$nombreAsignatura."' AND ";
        }
        if(!empty($curso)){
        $sql2= $sql2."asignaturas.curso = '".$curso."' AND ";
        }
        
        if($argo){
            $sql2=$sql2."1=1;";
        }else{
            $sql2=$sql2.";";
        }
        $sql=$sql.$sql2;
        //echo $sql;
    
        $filtroPdf = new filtrosPDF();
        $filtroPdf->empezar($sql);
    ?>
?>

