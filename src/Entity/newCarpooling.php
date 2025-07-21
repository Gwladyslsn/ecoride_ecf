<?php
session_start();
header('Content-Type: application/json');

$json = file_get_contents('php://input');
$data = json_decode($json, true);

function checkCityExists($city) {
    $url = "https://geocode.maps.co/search?q=" . urlencode($city) . "&countrycodes=fr&limit=1";

    $options = [
        "http" => [
            "header" => "User-Agent: EcorideBackend/1.0"
        ]
    ];

    $context = stream_context_create($options);
    $response = @file_get_contents($url, false, $context);

    if ($response === false) {
        return false;
    }

    $dataCity = json_decode($response, true);
    return !empty($dataCity); // si on a au moins un résultat, la ville est valide
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Méthode non autorisée, utilisez POST']);
    exit;
}

if (!$data) {
    echo json_encode(['success' => false, 'message' => 'Données JSON invalides']);
    exit;
}

require_once _ROOTPATH_ . 'src/Entity/pdo.php';
if (!isset($pdo)) {
    echo json_encode(['success' => false, 'message' => 'Connexion à la BDD échouée']);
    exit;
}


if (!isset($_SESSION['user'])) {
    echo json_encode(['success' => false, 'message' => 'Utilisateur non connecté']);
    exit;
}

$id_user = $_SESSION['user'];


if (!$id_user) {
    echo json_encode(['success' => false, 'message' => 'Utilisateur introuvable']);
    exit;
}

/* Récupérer id_car liée à utilisateur */
$sqlCar = "SELECT id_car FROM car WHERE id_user = :id_user";
$stmtCar = $pdo->prepare($sqlCar);
$stmtCar->execute(['id_user' => $id_user]);
$id_car = $stmtCar->fetchColumn();

if (!$id_car) {
    echo json_encode(['success' => false, 'message' => 'Aucune voiture trouvée pour cet utilisateur']);
    exit;
}

/* Champs à ajouter dans bdd*/
$allowedFields = [
    'departure_city',
    'departure_date',
    'departure_hour',
    'arrival_city',
    'arrival_date',
    'arrival_hour',
    'nb_place',
    'price_place'
];

$params = [];
foreach ($allowedFields as $field) {
    $params[$field] = isset($data[$field]) && trim($data[$field]) !== '' ? trim($data[$field]) : null;
}

if (!checkCityExists($params['departure_city'])) {
    $errors[] = "La ville de départ n'existe pas.";
    echo json_encode(['success' => false, 'message' => "La ville de départ n'existe pas."]);
    exit;
}

sleep(1);

if (!checkCityExists($params['arrival_city'])) {
    $errors[] = "La ville d'arrivée n'existe pas.";
    echo json_encode(['success' => false, 'message' => "La ville d'arrivée n'existe pas."]);
    exit;
}

$params['id_car'] = $id_car;

$checkTripExist = "SELECT COUNT(*) FROM carpooling WHERE id_car = :id_car AND departure_date = :departure_date AND departure_hour = :departure_hour";

$checkStmt = $pdo->prepare($checkTripExist);
$checkStmt->execute(['id_car' => $params['id_car'], 'departure_date' => $params['departure_date'], 'departure_hour' => $params['departure_hour']]);
$count = $checkStmt->fetchColumn();

if ($count > 0) {
    echo json_encode(['success' => false, 'message' => 'Un trajet avec cette voiture à cette date existe deja']);
    exit;
} else {
    $sql = "INSERT INTO carpooling (
    departure_city, departure_date, departure_hour,
    arrival_city, arrival_date, arrival_hour,
    nb_place, price_place, id_car
) VALUES (
    :departure_city, :departure_date, :departure_hour,
    :arrival_city, :arrival_date, :arrival_hour,
    :nb_place, :price_place, :id_car
)";



    try {
        $stmt = $pdo->prepare($sql);
        $success = $stmt->execute($params);

        echo json_encode(['success' => $success]);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Erreur SQL : ' . $e->getMessage()]);
    }
}
