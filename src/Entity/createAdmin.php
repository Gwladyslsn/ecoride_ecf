<?php 

require_once _ROOTPATH_ . '/src/Entity/pdo.php';

function createAdmin(PDO $pdo)
{
    $hashedPassword = password_hash('mdp2jose', PASSWORD_DEFAULT);

    $sql = "INSERT INTO admin (name_admin, lastname_admin, email_admin, password_admin, id_role)
            VALUES (:name, :lastname, :email, :password, :role)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':name' => 'José',
        ':lastname' => 'jojo',
        ':email' => 'jose@email.com',
        ':password' => $hashedPassword,
        ':role' => 4
    ]);

    echo "Admin créé avec succès.";
}

createAdmin($pdo);




