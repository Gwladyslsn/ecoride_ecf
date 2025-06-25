<?php
session_start();
header('Content-Type: application/json');

/* Modification photo de profil */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['upload_avatar'])) {
    require_once _ROOTPATH_ . 'src/Entity/pdo.php';

    if (!isset($_SESSION['user'])) {
        echo "Vous devez être connecté.";
        exit;
    }

    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = _ROOTPATH_ . 'public/asset/uploads/avatars/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $tmpName = $_FILES['avatar']['tmp_name'];
        $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
        $filename = uniqid('avatar_') . '.' . $ext;
        $target = $uploadDir . $filename;

        if (move_uploaded_file($tmpName, $target)) {
            $stmt = $pdo->prepare("UPDATE user SET avatar_user = :avatar WHERE id_user = :id_user");
            $stmt->execute([
                'avatar' => $filename,
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
}



/* Modification info perso */
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

$allowedFields = ['lastname_user', 'name_user', 'dob_user', 'email_user', 'phone_user'];
$updateFields = [];
$params = [];

foreach ($allowedFields as $field) {
    if (isset($data[$field])) {
        $value = trim($data[$field]);
        if ($value === '') {
            $value = null;
        }
        if ($field === 'email_user' && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
            echo json_encode(['success' => false, 'message' => 'Email invalide']);
            exit;
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

$sql = "UPDATE user SET " . implode(', ', $updateFields) . " WHERE id_user = :id_user";

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
