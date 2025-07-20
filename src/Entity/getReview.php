<?php
function getAllReview()
{
    $uri = getenv('MONGODB_URI');
    if (!$uri) {
        die("Erreur : MONGODB_URI non défini\n");
    }

    $client = new MongoDB\Client($uri);
    $collection = $client->ecoride->reviews;

    $cursor = $collection->find();

    $reviews = [];
    foreach ($cursor as $review) {
        $reviews[] = $review;
    }

    return $reviews;
}

