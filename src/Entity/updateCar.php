<?php
session_start();
header('Content-Type: application/json');

/* Modifier photo voiture */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['photo_car'])) {
    require_once _ROOTPATH_ . 'src/Entity/pdo.php';

    if (!isset($_SESSION['user'])) {
        echo "Vous devez être connecté.";
        exit;
    }
    if (isset($_FILES['photo_car']) && $_FILES['photo_car']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = _ROOTPATH_ . 'public/asset/uploads/car/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $tmpName = $_FILES['photo_car']['tmp_name'];
        $ext = pathinfo($_FILES['photo_car']['name'], PATHINFO_EXTENSION);
        $filename = uniqid('car_') . '.' . $ext;
        $target = $uploadDir . $filename;

        if (move_uploaded_file($tmpName, $target)) {
            $stmt = $pdo->prepare("UPDATE car SET photo_car = :photo_car WHERE id_user = :id_user");
            $stmt->execute([
                'photo_car' => $filename,
                'id_user' => $_SESSION['user']
            ]);

            header('Location: http://localhost:8000/?controller=page&action=dashboardUser');
            exit;
        } else {
            echo "Erreur lors de l’upload.";
            exit;
        }
    } else {
        echo "Aucun fichier reçu.";
        exit;
    }

    if (!isset($_SESSION['user'])) {
        echo json_encode(['success' => false, 'message' => 'Utilisateur non connecté']);
        exit;
    }
}


/* Modif info voiture */
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
