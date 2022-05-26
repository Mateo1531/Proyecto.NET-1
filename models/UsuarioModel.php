<?php
    require_once './core/model.master.php';
    class UsuarioModel extends ModelMaster{

        public function login(array $datosRespuesta){
            try {
                return parent::execProcedure($datosRespuesta, "sp_user_login", true);
            } catch (Exception $error){
                die($error->getMessage());
            }
        }

        public function changepassword(array $datosRespuesta){
            try {
                return parent::execProcedure($datosRespuesta, "sp_change_password", false);
            } catch (Exception $error){
                die($error->getMessage());
            }
        }

        public function template(array $datosRespuesta){
            try {
                return parent::execProcedure($datosRespuesta, "stored_procedure", true);
            } catch (Exception $error){
                die($error->getMessage());
            }
        }

    }
?>