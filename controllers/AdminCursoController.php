<?php 
class AdminCursoController{

    public function crearCurso(){
        if($_SESSION['acceso']){
            try {
                // var_dump($_FILES);die;
                $o_Curso= new adminCurso();
                $a_data=array(
                    'nombreCurso'=>$_POST['nombreCurso'],
                    'idIntructor'=>$_SESSION['id_usuario'],
                    'descripcion'=>$_POST['descripcion'],
                    'tiempoCurso'=>$_POST['tiempoCurso'],
                    'Precio'=>$_POST['Precio']
                );
                $o_Curso->crearCurso($a_data);
                $id_Instructor= array('Id_instructor'=>$_SESSION['id_usuario']);
                $data= $o_Curso->UltimoCurso($id_Instructor);
                // obteniendo id del curso registrado para renombrar archivo
                $idCurso=$data[0]['id_curso'];
                $tipoArchivo = strtolower(pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION));
                $rutaFile="views/img/imgPublic/".$idCurso.".".$tipoArchivo;
                $fle="UPDATE curso SET imgRuta='".$rutaFile."' WHERE id_curso=$idCurso";
                $o_Curso->query($fle,false);
                move_uploaded_file($_FILES["file"]["tmp_name"], $rutaFile);

                /** Instanciando  Modelo  adminCurso*/    
                // Usando el metod del modelo atravez del objeto instanciado
                $aResponse['code']= 'success';
                return $aResponse['code'];
            } catch (Exception $error){
                die($error->getMessage());
            }
        }else{
            $aResponse['code']= "noSession";
            return  $aResponse['code'];
        }
    }
    public function listarMisCursos(){
        $o_modelCurso= new adminCurso;
        $id_Instructor= array('Id_instructor'=>$_SESSION['id_usuario']);
        return $o_modelCurso->listCurso($id_Instructor);
    }
    public function listaTodoslosCurso(){
        $o_modelCurso= new adminCurso;
        return $o_modelCurso->listTodosCurso();
    }

    public function getListcategoria(){     
        $o_modelCurso= new adminCurso;
        return $o_modelCurso->listCategoria();
    }

    public function getUltimoCurso(){     
        $o_modelCurso= new adminCurso;
        $id_Instructor= array('Id_instructor'=>$_SESSION['id_usuario']);
        return $o_modelCurso->UltimoCurso($id_Instructor);
    }
    public function getCursoById(){
        $idCurso= $_POST['id_curso'];
        $o_Curso= new adminCurso;
        $query="SELECT * FROM curso WHERE id_curso=$idCurso";
        return $o_Curso->query($query,true);
    }
}


?>