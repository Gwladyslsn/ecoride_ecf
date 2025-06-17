<?php 

const routes = [
	'/' => [
		'controller' => App\Controller\Controller::class,
		'method' => 'home', 
        
	],

    '/register' => [
		'controller' => App\Controller\Controller::class,
		'method' => 'register'
	]
];

?>
