<?php

function getAllReview()
{
    $client = new MongoDB\Client("mongodb://mongodb:27017");
    $collection = $client->ecoride->reviews;

    $cursor = $collection->find();

    $reviews = [];
    foreach ($cursor as $review) {
        $reviews[] = $review;
    }

    return $reviews; 
}
