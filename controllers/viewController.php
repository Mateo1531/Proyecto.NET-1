<?php 


class ViewController {
	private static $view_path = './views/';
	public function load_view($view) {
		$ruta= self:: $view_path . $view . '.php';
		if(file_exists($ruta)){
			require_once( self::$view_path . 'nav.php' );
			require_once( $ruta );
		}
		// require_once( self::$view_path . 'footer.php' );
	}

}

?>

