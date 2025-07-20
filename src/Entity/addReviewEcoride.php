<?php  

require_once _ROOTPATH_ . 'vendor/autoload.php';
use MongoDB\Client;
date_default_timezone_set('Europe/Paris');

$input = json_decode(file_get_contents("php://input"), true);

$name = $input['nameReviewEcoride'] ?? '';
$email = $input['emailReviewEcoride'] ?? '';
$note = (int)($input['selectedRating'] ?? 0);
$comment = $input['textReviewEcoride'] ?? '';
$date = (new DateTime())->format(DateTime::ATOM);

// Récupérer l'URI MongoDB Atlas depuis la variable d'environnement
$uri = getenv('MONGODB_URI');
if (!$uri) {
    die("Erreur : MONGODB_URI non défini\n");
}

$client = new Client($uri);
$collection = $client->ecoride->reviews;

$insertResult = $collection->insertOne([
    'name' => $name,
    'email' => $email,
    'note' => $note,
    'comment' => $comment,
    'created_at' => $date
]);

// Tu peux éventuellement renvoyer un retour JSON ici
echo json_encode([
    'success' => true,
    'insertedId' => (string)$insertResult->getInsertedId()
]);
