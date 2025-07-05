<?php  

//insertion données dans mongoDB
require _ROOTPATH_ . 'vendor/autoload.php';
use MongoDB\Client;
date_default_timezone_set('Europe/Paris');

$input = json_decode(file_get_contents("php://input"), true);

$name = $input['nameReviewEcoride'] ?? '';
$email = $input['emailReviewEcoride'] ?? '';
$note = (int)($input['selectedRating'] ?? 0);
$comment = $input['textReviewEcoride'] ?? '';
$date = (new DateTime())->format(DateTime::ATOM);

$client = new Client("mongodb://mongodb:27017");
$collection = $client->ecoride->reviews;

$insertResult = $collection->insertOne([
    'name' => $name,
    'email' => $email,
    'note' => $note,
    'comment' => $comment,
    'created_at' => (new DateTime())->format(DateTime::ATOM)

]);



?>