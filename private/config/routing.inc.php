<?php
/*
	On défini ici les fichiers de routes qui doivent être chargés
 */

$routes = new RouteCollection();
Routing::loadRoutesFile(array(
	'Site1:Home:routes.php',
	'Site1:Article:routes.php',	
));

//$content = $routes->match();