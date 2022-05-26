<?php

class Autoload{
    public function __construct()
    {       
        spl_autoload_register(function($class_name){
            $modelPaht= './models/'. $class_name . '.php';
            $controller_path= './controllers/'. $class_name . '.php';
            if(file_exists($modelPaht)){
                require_once $modelPaht;
            }
            if(file_exists($controller_path)){
                require_once $controller_path;
            }
        });
    }


}


?>