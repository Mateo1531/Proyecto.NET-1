<?php
    require_once './core/model.master.php';

    class adminCurso extends ModelMaster{

        public function crearCurso(array $datosRespuesta){
            try {
                parent::execProcedure($datosRespuesta, "sp_create_Curso", false);
            } catch (Exception $error){
                die($error->getMessage());
            }
        }
        public function listCategoria(){
            try {
                return parent::getRows("sp_listCategoria");
            } catch (Exception $error){
                die($error->getMessage());
            }
        }

        public function listCurso(array $datos){
            try {      
               return parent::getRows("sp_listartodoscurso");
            } catch (Exception $error){
                die($error->getMessage());
            }
        }
        public function listTodosCurso(){
            try {
                return parent::getRows("listaTodosCursos");
            } catch (Exception $error){
                die($error->getMessage());
            }
        }
        public function UltimoCurso($datosRespuesta){
            try {
               return  parent::execProcedure($datosRespuesta, "sp_listUltimoCurso", true);
            } catch (Exception $error){
                die($error->getMessage());
            }
        }
        public function executeQuery($query,$return){
            try {
                return  parent::query($query,$return);
             } catch (Exception $error){
                 die($error->getMessage());
             }
        }

    }
?>