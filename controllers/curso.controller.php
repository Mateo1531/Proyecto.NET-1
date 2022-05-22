<?php 
session_start();

if(isset($_GET)){
    require_once '../models/curso.php';
    /** Instanciando  Modelo  Curso*/
    $o_Curso= new Curso();
    
}

?>