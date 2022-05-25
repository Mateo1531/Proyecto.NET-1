<?php 


class RouteIndexController{
    public function __construct($route)
    {   
        $this->route=$route;
        if(!isset($_SESSION)){
            session_start([
                'use_only_cookies'=>1,
                'read_and_close'=> true
            ]);
            $_SESSION['acceso']==false;
        }
        $controller = new ViewController();
        if($_SESSION['acceso']){
            // $this->route = isset($_GET['r']) ? $_GET['r'] : 'home';
            // var_dump($this->route);die;
            if(!isset( $_POST['op'] )){
                $controller->load_view($this->route);
            }else{

            }

        }else{
            $controller->load_view('login');
        }
    }

}

?>