<?php

	
	require '../helpers.php';
	require(basePath('Framework/Router.php'));
	require(basePath('Framework/Database.php'));
    require (basePath('Framework/Session.php'));


	Session::start();


	$router = new Router();

	require basePath('routes.php'); // adaugam rutele in clasa router


	$uri = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH); //www.localhost/ceva -> uri = ceva 
	$method = $_SERVER['REQUEST_METHOD']; //daca e get put etc..

	if($method == 'POST' && isset($_POST['_method']))
		$method = strtoupper($_POST['_method']);		


	
	// se verifica daca url-ul este se afla in routes , daca nu -> redirectionat catre eroare 404
	$router -> route($uri , $method);
?>
