<?php
      
class UsuarioController{
    // public function
    // metodo para realizar login
    public function login(){
        if ($_GET['op'] == 'login'){
            $usuario = new Usuario();
            //Array asociativo
            $datos = ["username" => $_GET['username']];
            $resultado = $usuario->login($datos);
            //Acceso al sistema
            if ($resultado){
                //Acceso correcto
                $registro = $resultado[0];
                $claveValidar = $_GET['contraseña'];
    
                //Validar contraseña
                if (password_verify($claveValidar, $registro['contraseña'])){
                    //Contraseña correcta
                    $_SESSION['acceso'] = true;
                    $_SESSION['id_usuario'] = $registro['id_usuario'];
                    $_SESSION['nombre_completo'] = $registro['nombre_completo'];
                    $_SESSION['nombre_usuario'] = $registro['nombre_usuario'];
                    $_SESSION['contraseña'] = $registro['contraseña'];
                    return "success";
                } else {
                    //Contraseña incorrecta
                    $_SESSION['acceso'] = false;
                    $_SESSION['id_usuario'] = '';
                    $_SESSION['nombre_completo'] = '';
                    $_SESSION['nombre_usuario'] = '';
                    $_SESSION['contraseña'] = '';
    
                    return "Password invalid";
                }
                
            } else {
                //Acceso fallido
                $_SESSION['acceso'] = false;
                $_SESSION['id_usuario'] = '';
                $_SESSION['nombre_completo'] = '';
                $_SESSION['nombre_usuario'] = '';
                $_SESSION['contraseña'] = '';
    
                return "User not exist";
            }
        }
    }
    // metodo para cierre sesion
    public function logout(){
        session_destroy();
        session_unset();
        header('Location:../');
    }
    // metodo para cambio de contraseña
    public function changepassword(){
        $oldpassword = $_GET['clave1'];
        $newpassword = $_GET['clave2'];
        $usuario = new Usuario();
        //Desencriptando variables
        if (password_verify($oldpassword, $_SESSION['contraseña'])){
            //Las variables coinciden
            $datosenviar = [
                "id_usuario" => $_SESSION['id_usuario'], 
                "password" => password_hash($newpassword, PASSWORD_BCRYPT)
            ];
            $usuario->changepassword($datosenviar);
            return "";
        } else {
            //Las variables no coinciden
            return "La contraseña ingresada no es correcta";
        }
    }
}
if(isset($_POST)){
    $o_load_Methot= new loadMethodos();
    $clase= $_POST['op'];
    $action= $_POST['class'];
    $o_load_Methot->load_Methot($clase,$action);
    
}


?>