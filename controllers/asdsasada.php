<?php

class loadMethodos{
    public function load_Methot($class,$method) {
		$obj= new $class;
		return $obj->$method();
		

	}
}



?>