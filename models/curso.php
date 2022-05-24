<?php
    require_once '../core/model.master.php';

    class Curso extends ModelMaster{

        public function crearCurso(array $datosRespuesta){
            try {
                // var_dump($datosRespuesta);die;
                parent::execProcedure($datosRespuesta, "sp_create_Curso", false);
                return "succes";
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

        // public function template(array $datosRespuesta){
        //     try {
        //         return parent::execProcedure($datosRespuesta, "stored_procedure", true);
        //     } catch (Exception $error){
        //         die($error->getMessage());
        //     }
        // }

    }
?>