<?php
require_once _ROOTPATH_ . '/src/Entity/pdo.php';
require_once _ROOTPATH_ . '/src/Entity/searchTrip.php';

global $pdo;
error_log('Valeur de $pdo dans searchTripAPI.php : ' . var_export($pdo, true));

$json = file_get_contents('php://input');
$data = json_decode($json, true);

$departure = $data['departureCitySearch'] ?? null;
$arrival = $data['arrivalCitySearch'] ?? null;
$date = $data['dateSearch'] ?? null;

if (!$departure || !$arrival || !$date) {
    echo json_encode(['success' => false, 'message' => 'Champs manquants']);
    exit;
}

$trips = showTripsSearched($pdo, $departure, $arrival, $date);

if (empty($trips)) {
    echo json_encode(['success' => false, 'message' => 'Aucun trajet trouvé']);
    exit;
}

echo json_encode(['success' => true, 'trips' => $trips]);
exit;
