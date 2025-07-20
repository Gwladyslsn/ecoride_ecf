<?php
require_once __DIR__ . '/../../vendor/autoload.php'; // adapte le chemin si besoin

$uri = getenv('MONGODB_URI') ?: null;

if (!$uri) {
    die("Erreur : MONGODB_URI non défini\n");
}
echo "URI MongoDB : $uri\n";

try {
    $client = new MongoDB\Client($uri);
    $db = $client->selectDatabase('ecoride');

    echo "Connexion réussie !\n";

    $collections = $db->listCollections();

    echo "Collections dans la base ecoride :\n";
    foreach ($collections as $collection) {
        echo "- " . $collection->getName() . "\n";
    }
} catch (Exception $e) {
    echo "Erreur de connexion : " . $e->getMessage() . "\n";
}


/*
require_once __DIR__ . '/../../vendor/autoload.php';

use MongoDB\Client;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

$uri = $_ENV['MONGODB_URI'];
echo "URI MongoDB : " . $_ENV['MONGODB_URI'] . "\n";

if (!$uri) {
    die("Erreur : MONGODB_URI non défini dans .env\n");
}

try {
    $client = new Client($uri);
    $db = $client->selectDatabase("ecoride");
    $collection = $db->selectCollection("reviews");

    $count = $collection->countDocuments();
    echo "Nombre total de documents dans 'reviews' : $count\n";

    $reviews = $collection->find([], ['limit' => 5])->toArray();
    foreach ($reviews as $review) {
        echo json_encode($review, JSON_PRETTY_PRINT) . "\n";
    }
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . "\n";
}*/


