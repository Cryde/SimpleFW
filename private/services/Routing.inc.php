<?php

class Routing{
	
	static function loadRoutesFile($files){
		
		foreach ($files as $file){
			loadRoutes($file);
		}
	}
}

class RouteCollection{
	
	private $routes;
	
	public function __construct(){
		
		$this->routes = array();
	}

	public function add($route){
		
		$this->routes[] = $route;
		return $this;
	}
	
	public function match(){
		return 'SUPER CONTENU';
	}
}