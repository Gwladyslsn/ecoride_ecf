<?php
session_start();
header('Content-Type: application/json');

$json = file_get_contents('php://input');
$data = json_decode($json, true);

if (!$data) {
    echo json_encode(['success' => false, 'message' => 'Données invalides']);
    exit;
}

require_once _ROOTPATH_ . 'src/Entity/pdo.php';
if (!isset($pdo)) {
    echo json_encode(['success' => false, 'message' => 'Erreur : connexion PDO non établie']);
    exit;
}

$allowedFields = ['brand_car', 'model_car', 'year_car', 'phone_user', 'energy_car'];
$updateFields = [];
$params = [];

foreach ($allowedFields as $field) {
    if (isset($data[$field])) {
        $value = trim($data[$field]);
        if ($value === '') {
            $value = null;
        }
        $updateFields[] = "$field = :$field";
        $params[$field] = $value;
    }
}

if (empty($updateFields)) {
    echo json_encode(['success' => false, 'message' => 'Aucune donnée à mettre à jour']);
    exit;
}

$params['id_user'] = $_SESSION['user'];

$sql = "UPDATE car SET " . implode(', ', $updateFields) . " WHERE id_user = :id_user";

try {
    $stmt = $pdo->prepare($sql);
    $success = $stmt->execute($params);

    if ($success) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erreur lors de la mise à jour']);
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Erreur BDD : ' . $e->getMessage()]);
}


