<?php
// On lance le coeur du site 
include_once 'services/core.inc.php';
include_once 'config/services.inc.php';


initialize(array(
	'Site1' => array(
		'routesPath' => 'routing.inc.php', // Contien le loader des routes
		'wrapper' => 'design-site1.dsg', // Contien le design global

	), 
));