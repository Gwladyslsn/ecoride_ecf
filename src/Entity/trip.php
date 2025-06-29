<?php


function getAllTrips(): array
{
    require_once _ROOTPATH_ . 'src/Entity/pdo.php';

    $sql = "
        SELECT carpooling.*, user.name_user, user.avatar_user
        FROM carpooling
        JOIN car ON carpooling.id_car = car.id_car
        JOIN user ON car.id_user = user.id_user
        WHERE carpooling.departure_date >= CURRENT_DATE
        ORDER BY carpooling.departure_date ASC;";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $trips = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!$trips) {
        echo json_encode(['success' => false, 'message' => 'Aucun trajet']);
        exit;
    }

    return $trips;
}
