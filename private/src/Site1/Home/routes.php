<?php

RouteCollection::add('_site1_home_', 
		array(
			'uri' => '/',
			'controller' => 'Site1:Home:page_accueil.php'
		)
);
RouteCollection::add('_site_coucou_',
		array(
				'uri' => '/coucou-toi',
				'controller' => 'Site1:Home:dire_coucou.php'		
		)
);

RouteCollection::add('_site_coucou_pseudo_',
	array(
			'uri' => '/coucou-toi/:pseudo',
			'controller' => 'Site1:Home:dire_coucou.php'
			)
);
