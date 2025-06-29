<?php
session_start();
header('Content-Type: application/json');

$json = file_get_contents('php://input');
$data = json_decode($json, true);

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

// Étape 2 : Récupérer l'id_car de la voiture liée à cet utilisateur
$sqlCar = "SELECT id_car FROM car WHERE id_user = :id_user";
$stmtCar = $pdo->prepare($sqlCar);
$stmtCar->execute(['id_user' => $id_user]);
$id_car = $stmtCar->fetchColumn();

if (!$id_car) {
    echo json_encode(['success' => false, 'message' => 'Aucune voiture trouvée pour cet utilisateur']);
    exit;
}

// Champs à insérer dans carpooling
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
