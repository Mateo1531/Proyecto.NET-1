<?php
class UsuarioController{
    // public function
    // metodo para realizar login
    public function login(){
        if ($_REQUEST['op'] == 'login'){
            $usuario = new UsuarioModel();
            //Array asociativo
            $datos = ["username" => $_REQUEST['username']];
            $resultado = $usuario->login($datos);
            //Acceso al sistema
            if ($resultado){
                //Acceso correcto
                $registro = $resultado[0];
                $claveValidar = $_REQUEST['contraseña'];
                //Validar contraseña
                if (password_verify($claveValidar, $registro['contraseña'])){
                    //Contraseña correcta
                    $_SESSION['acceso'] = true;
                    $_SESSION['id_usuario'] = $registro['id_usuario'];
                    $_SESSION['nombre_completo'] = $registro['nombre_completo'];
                    $_SESSION['nombre_usuario'] = $registro['nombre_usuario'];
                    $_SESSION['contraseña'] = $registro['contraseña'];                   
                    return "successLogin";
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
        return "success";
    }
    // metodo para cambio de contraseña
    public function changepassword(){
        $oldpassword = $_REQUEST['clave1'];
        $newpassword = $_REQUEST['clave2'];
        $usuario = new UsuarioModel();
        //Desencriptando variables
        if (password_verify($oldpassword, $_SESSION['contraseña'])){
            //Las variables coinciden
            $datosenviar = [
                "id_usuario" => $_SESSION['id_usuario'], 
                "password" => password_hash($newpassword, PASSWORD_BCRYPT)
            ];
            $usuario->changepassword($datosenviar);
            return "successUpdate";
        }
    }
    // metodo crear usuario
    public function reguser(){
        $usuario = new UsuarioModel();
        $rpassword = $_REQUEST['password'];
        //Array asociativo
        $datos = [
            //=> : asignar el valor a algo desde un array
            "name" => $_REQUEST['name'],
            "email" => $_REQUEST['email'],
            "phone" => $_REQUEST['phone'],
            "password" => password_hash($rpassword, PASSWORD_BCRYPT)
        ];
        //-> : navegar en un objeto
        $usuario->reguser($datos);
        
            $usuario = new UsuarioModel();
            //Array asociativo
            $datos = ["username" => $_REQUEST['email']];
            $resultado = $usuario->login($datos);
            //Acceso al sistema
            if ($resultado){
                //Acceso correcto
                $registro = $resultado[0];
                $claveValidar = $_REQUEST['password'];
                //Validar contraseña
                if (password_verify($claveValidar, $registro['contraseña'])){
                    //Contraseña correcta
                    $_SESSION['acceso'] = true;
                    $_SESSION['id_usuario'] = $registro['id_usuario'];
                    $_SESSION['nombre_completo'] = $registro['nombre_completo'];
                    $_SESSION['nombre_usuario'] = $registro['nombre_usuario'];
                    $_SESSION['contraseña'] = $registro['contraseña'];
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
        
        return "successreg";
    }
}
?>