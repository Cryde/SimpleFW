<?php
/* Coeur de ce mini FrameWork */

define('_SFW_INIT_DSG_', 'wrapper');

function initialize($sitesInit){
	
	foreach ($sitesInit as $site){

		foreach($site as $key => $param){
			
			switch($key){
				
				case _SFW_INIT_DSG_:
					loadDesignGlobalFile($param);
				break;
			}
		}
	}	
}

function loadServices($services){
	
	foreach($services as $service){
		
		include_once $service . '.inc.php';	
	}
}



function loadDesignGlobalFile($file){
	
	echo 'lol';
}

/**
 * On affiche le site
 * @param string $ajaxMode
 */
function displaySite($ajaxMode){

	
}


/**
 * Charge un fichier en fonction de son context
 * @param string $str 
 * @param string $context
 */
function load($str, $context = ''){

	$context = (!empty($context))? $context.'/' : '';
	
	$tabStr = explode(':', $str);
	if(count($tabStr) == 3){ // site:module:file
		include 'src/'. $tabStr[0] .'/'.$tabStr[1].'/'.$context.''.$tabStr[2];
	}
}


function loadRoutes($routeFile){
	load($routeFile);
}

/**
 * 	Rend une vue
 * @param string $view La vue a retournée
 * @param array $data	Les données a passer à la vue
 */
function render($view, $data = array()){

	extract($data);
	load($view, 'Views');
}


/**
 * Charge un modèle
 * @param string $modelName
 * @param string $module
 */
function loadModel($modelName){

	load($view, 'Models');
}

/**
 * Redirige vers la page passé en paramètre
 * @param string $page
 */
function redirect($page){

	header('Location: '.$page);
}


