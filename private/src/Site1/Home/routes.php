<?php

$routes
->add('_site1_home_', 
		array(
			'uri' => '/',
			'controller' => 'Site1:Home:page_accueil.php'
		)
)
->add('_site_coucou_',
		array(
				'uri' => '/coucou-toi',
				'controller' => 'Site1:Home:dire_coucou.php'		
		)
);