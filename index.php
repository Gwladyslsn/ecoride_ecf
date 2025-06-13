<?php 

define('_ROOTPATH_', __DIR__); // Pour se baser sur le chemin racine 

spl_autoload_register(function ($class) {
    $file = _ROOTPATH_ . '/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require_once $file;
    } else {
        echo "❌ Classe introuvable : $class → $file";
    }
});

use App\Controller\Controller;

$controller = new Controller();
$controller->route();