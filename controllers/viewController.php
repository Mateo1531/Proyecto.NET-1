<?php 


class ViewController {
	private static $view_path = './views/';
	public function load_view($view) {
		$ruta= self:: $view_path . $view . '.php';
		if(file_exists($ruta)){
			if($view!='login'  && $view!='registro-usuario'){
				require_once( self::$view_path . 'nav.php' );
			}
			require_once( $ruta );
			if($view!='login' && $view!='registro-usuario'){
				require_once( self::$view_path . 'footer.php' );
			}
		}
		// require_once( self::$view_path . 'footer.php' );
	}
	public function load_controller() {
		spl_autoload_register(function($class_name){
            $modelPaht= './models/'. $class_name . '.php';
            $controller_path= './controllers/'. $class_name . '.php';
			$viewr_path= './models/'. $class_name . '.php';
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

