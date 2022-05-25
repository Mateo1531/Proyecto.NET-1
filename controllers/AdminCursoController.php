<?php 
class AdminCursoController{

    public function crearCurso(){
        if(isset($_SESSION['acceso'])){
            try {
                unset($a_data['op']);
                $idIntructor=array('idIntructor'=>$_SESSION['id_usuario']);
                array_splice($a_data, 1, 0, $idIntructor );
                $a_data["idIntructor"]=$a_data[0];
                unset($a_data[0]);    
                /** Instanciando  Modelo  Curso*/    
                $o_Curso= new adminCurso();
                $aResponse['code']= $o_Curso->crearCurso($a_data);
                echo json_encode($aResponse, JSON_FORCE_OBJECT);
            } catch (Exception $error){
                die($error->getMessage());
            }
        }else{
            $aResponse['code']= "noSession";
            echo json_encode($aResponse, JSON_FORCE_OBJECT);
        }
    }
    public function listarCurso(){
        $o_modelCurso= new adminCurso;
        return $o_modelCurso->listCurso();
    }
}


?>