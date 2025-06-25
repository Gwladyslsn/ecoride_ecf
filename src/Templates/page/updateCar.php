<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['user'])) {
    echo json_encode(['success' => false, 'message' => 'Utilisateur non connecté']);
    exit;
}

$json = file_get_contents('php://input');
$data = json_decode($json, true);

if (!$data) {
    echo json_encode(['success' => false, 'message' => 'Données invalides']);
    exit;
}

require_once _ROOTPATH_ . 'src/Entity/pdo.php';
if (!isset($pdo)) {
    echo json_encode(['success' => false, 'message' => 'Erreur PDO non établie']);
    exit;
}

$id_user = $_SESSION['user'];
$allowedFields = ['brand_car', 'model_car', 'year_car', 'energy_car'];
$params = [];

foreach ($allowedFields as $field) {
    if (isset($data[$field])) {
        $value = trim($data[$field]);
        $params[$field] = ($value === '') ? null : $value;
    } else {
        $params[$field] = null;
    }
}

try {
    // Verif si deja voiture
    $checkSql = "SELECT COUNT(*) FROM car WHERE id_user = :id_user";
    $checkStmt = $pdo->prepare($checkSql);
    $checkStmt->execute(['id_user' => $id_user]);
    $carExists = $checkStmt->fetchColumn() > 0;

    if ($carExists) {
        /* Maj */
        $sql = "UPDATE car SET brand_car = :brand_car, model_car = :model_car, year_car = :year_car, energy_car = :energy_car WHERE id_user = :id_user";
    } else {
        /* Add */
        $sql = "INSERT INTO car (brand_car, model_car, year_car, energy_car, id_user) VALUES (:brand_car, :model_car, :year_car, :energy_car, :id_user)";
    }

    $params['id_user'] = $id_user;

    $stmt = $pdo->prepare($sql);
    $success = $stmt->execute($params);

    if ($success) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erreur lors de l\'enregistrement']);
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Erreur BDD : ' . $e->getMessage()]);
}



