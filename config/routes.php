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

	'/history' => [
		'controller' => App\Controller\Controller::class,
		'method' => 'history'
	],

	'/updateUser' => [
		'controller' => App\Controller\Controller::class,
		'method' => 'updateUser'
	],

	'/updateCar' => [
		'controller' => App\Controller\Controller::class,
		'method' => 'updateCar'
	],

	'/addCarpooling' => [
		'controller' => App\Controller\Controller::class,
		'method' => 'addCarpooling'
	],

	'/searchCarpooling' => [
		'controller' => App\Controller\Controller::class,
		'method' => 'searchCarpooling'
	],

	'/newCarpooling' => [
		'controller' => App\Controller\Controller::class,
		'method' => 'newCarpooling'
	],

	'/searchTripAPI' => [
		'controller' => App\Controller\Controller::class,
		'method' => 'searchTripAPI'
	],

		'/contactUser' => [
		'controller' => App\Controller\Controller::class,
		'method' => 'contactUser'
	],

		'/reviewEcoride' => [
		'controller' => App\Controller\Controller::class,
		'method' => 'reviewEcoride'
	],

		'/addReviewEcoride' => [
		'controller' => App\Controller\Controller::class,
		'method' => 'addReviewEcoride'
<<<<<<< HEAD
	],

		'/createAdmin' => [
		'controller' => App\Controller\Controller::class,
		'method' => 'createAdmin'
		],
=======
	]
>>>>>>> 69bd41a72e75f684893640bbdeade5b395d36ba3

];


