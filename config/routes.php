<?php 

const routes = [
	'/' => [
		'controller' => App\Controller\Controller::class,
		'method' => 'home', 
        
	],

    '/register' => [
		'controller' => App\Controller\Controller::class,
		'method' => 'register'
	],

	'/contact' => [
		'controller' => App\Controller\Controller::class,
		'method' => 'contact'
	],

	'/about' => [
		'controller' => App\Controller\Controller::class,
		'method' => 'about'
	],

	'/mentions' => [
		'controller' => App\Controller\Controller::class,
		'method' => 'mentions'
	],

	'/dashboardUser' => [
		'controller' => App\Controller\Controller::class,
		'method' => 'dashboardUser'
	],

	'/logout' => [
		'controller' => App\Controller\Controller::class,
		'method' => 'logout'
	],
];


