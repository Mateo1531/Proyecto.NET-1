<?php
    require_once './core/model.master.php';

    class adminCurso extends ModelMaster{

        public function crearCurso(array $datosRespuesta){
            try {
                // var_dump($datosRespuesta);die;
                parent::execProcedure($datosRespuesta, "sp_create_Curso", false);
                return "success";
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

        public function listCurso(){
            try {
               $data= parent::getRows("sp_listCurso");
               return  $data;
            } catch (Exception $error){
                die($error->getMessage());
            }
        }
        // public function crearCurso(){
        //     try {
        //         // var_dump($datosRespuesta);die;
        //         return  parent::execProcedure($datosRespuesta, "sp_listCurso ", true);
               
        //     } catch (Exception $error){
        //         die($error->getMessage());
        //     }
        // }
        
        // public function template(array $datosRespuesta){
        //     try {
        //         return parent::execProcedure($datosRespuesta, "stored_procedure", true);
        //     } catch (Exception $error){
        //         die($error->getMessage());
        //     }
        // }

    }
?>