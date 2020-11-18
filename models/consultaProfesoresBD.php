<?php
include_once('Cbd.php');
class cconsultasbs extends cbd
{

    public function seleccionar($sql){
        //echo $sql;
        $this->filas=$this->_consultar($sql);
        if($this->filas==null){
            return false;
            
        }       
        return true;

    }
}  
?>