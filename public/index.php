<?php

define('_ROOTPATH_', __DIR__ . '/../'); // Pour se baser sur le chemin racine

require_once _ROOTPATH_ . 'vendor/autoload.php';
require_once _ROOTPATH_ . 'config/config.php';

use App\Controller\Controller;

$controller = new Controller();
$controller->route();

echo "Contrôleur demandé : " . $controller . "<br>";
echo "Action demandée : " . $action . "<br>";

