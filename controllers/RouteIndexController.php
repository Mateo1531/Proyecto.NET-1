<?php

use RouteIndexController as GlobalRouteIndexController;

class RouteIndexController{
    public function __construct($route)
    {   
        $this->route=$route;
        if(!isset($_SESSION)){
            if( !isset($_SESSION) )  session_start();            
		    if( !isset($_SESSION['acceso']) )  $_SESSION['acceso'] = false;
        }
        $controller = new ViewController();
        if(isset($_REQUEST['class'])){
            $class= $_REQUEST['class'];
            $methodt= $_REQUEST['op'];
            $objeto= new $class;
            $aResponse=$objeto->$methodt();
            echo json_encode($aResponse, JSON_FORCE_OBJECT);
        }else{
            $this->route = isset($_REQUEST['ruta']) ? $_REQUEST['ruta'] : 'home';
            // var_dump($this->route);die;
            if($this->route=='home'){
                $controller->load_view('home');
            }
            if(!isset( $_REQUEST['op'] )){
                $controller->load_view($this->route);
            }
        }   
    }
}

?>