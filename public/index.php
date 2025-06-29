<?php 

define('_ROOTPATH_', __DIR__ . '/../'); // Pour se baser sur le chemin racine 

require_once _ROOTPATH_ . 'vendor/autoload.php';

use App\Controller\Controller;

$controller = new Controller();
$controller->route();