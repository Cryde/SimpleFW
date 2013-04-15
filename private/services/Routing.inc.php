<?php

class Routing{
	
	static function loadRoutesFile($files){
		
		foreach ($files as $file){
			loadRoutes($file);
		}
	}
}

class Route{
	
	private $name;
	private $uri;
	private $controller;
	
	public function __construct($name){
		$this->name = $name;
	}
	
	public function getName(){
		return $this->name;
	}
	
	public function getUri(){
		return $this->uri;
	}
	
	public function getController(){
		return $this->controller;
	}

	
	public function setUri($uri){
		$this->uri = $uri;
		return $this;
	}
	
	public function setParams($params){
		$this->params = $params;
		return $this;
	}
	
	public function setController($controller){
		$this->controller = $controller;
		return $this;
	}
	
}

class RouteCollection{
	
	static private $routes = array();
	
	/**
	 * On ajoute une route à la collection des routes dispo
	 * @param string $routeName
	 * @param array $route tableau de paramètre des routes
	 */
	static public function add($routeName, $routeArray){
		
		$route = new Route($routeName);
		$route->setUri($routeArray['uri'])
			  ->setController($routeArray['controller']);
		self::$routes[$route->getName()] = $route;
	}
	
	/**
	 * Retourne la route courante de l'url
	 * @return string
	 */
	static private function getRouteUri(){
		
		return ($_SERVER['QUERY_STRING'])
			? substr($_SERVER['REQUEST_URI'], 0, -(strlen($_SERVER['QUERY_STRING']) + 1))
			: $_SERVER['REQUEST_URI'];
	}
	
	static public function match(){
		
		$routeUri = RouteCollection::getRouteUri();
		$currentInfo = self::getRouteName($routeUri);
		if($currentInfo){
			
			$route = self::getRouteInfo($currentInfo[0]);
			
			$params = !empty($currentInfo[1])? $currentInfo[1] : array();
			
			loadController($route->getController(), $params);
		}
		else die('PAGE INEXISTANTE');
	}
	
	/**
	 * Retourne le nom d'une route en fonction de l'url
	 * @param string $routeUri
	 * @return string retourne le nom de la route
	 */
	static private function getRouteName($routeUri){
		
		// On parcours toutes les routes
		foreach(self::$routes as $routeName => $route){
			
			// Cas trivial
			if($route->getUri() == $routeUri){
				
				return array($routeName);
			}
			else{
				
				$route_uri = trim($route->getUri(), '/');
				$request_uri = trim($routeUri, '/');
					
				$route_items = explode('/', $route_uri);
				$request_items = explode('/', $request_uri);
				$nb_route_items = count($route_items);
					
				if ($nb_route_items === count($request_items)) {
					
					for ($i = 0; $i < $nb_route_items; ++$i) {
						
						if ($route_items[$i][0] === ':') {
							
							$params[substr($route_items[$i], 1)] = $request_items[$i];					
						}
					}
					return array($routeName, $params);
				}
			}
		}
		
		return false;
	}
	

	static private function getRouteInfo($routeName){
		
		return self::$routes[$routeName];
	}
}
