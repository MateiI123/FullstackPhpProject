<?php 

	$router->get('/' ,'HomeController@index');
	$router->get('/listings' ,'ListingController@index');
	$router->get('/listings/create' ,'ListingController@create');
    $router->get('/listing' , 'ListingController@show');
	$router->get('/listing/edit' , 'ListingController@edit');


	$router->put('/listing' , 'ListingController@update');
	$router->post('/listings' ,'ListingController@store');
	$router->delete('/listing' , 'ListingController@destroy');


	$router->get('/auth/register' , 'UserController@create');
	$router->get('/auth/login' , 'UserController@login');
	$router->post('/auth/register' , 'UserController@store');
	$router->post('/auth/logout' , 'UserController@logout');
	$router->post('/auth/login' , 'UserController@authentificate');



?>