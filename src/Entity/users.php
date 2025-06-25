<?php 


function addUser(PDO $pdo,string $name_user, string $lastname_user, string $email_user, string $password_user, string $id_role):bool
{
    $query = $pdo->prepare("INSERT INTO `user`(`name_user`, `lastname_user`, `email_user`, `password_user`, `id_role`) VALUES (:name_user, :lastname_user, :email_user, :password_user, :id_role)");

    $password = password_hash($password_user, PASSWORD_DEFAULT);

    $query->bindValue(':name_user', $name_user);
    $query->bindValue(':lastname_user', $lastname_user);
    $query->bindValue(':email_user', $email_user);
    $query->bindValue(':password_user', $password);
    $query->bindValue(':id_role', $id_role);

    return $query->execute();
}



function verifyUserInput(array $user):array
{
    $errors = [];

    if($user["name_user"] === ""){
            $errors["name_user"] = "Le champ Prénom ne doit pas etre vide";
    }
    if($user["lastname_user"] === ""){
            $errors["lastname_user"] = "Le champ Nom ne doit pas etre vide";
    }
    if($user["email_user"] === ""){
            $errors["email_user"] = "Le champ Email ne doit pas etre vide";
    }
    if($user["password_user"] === ""){
            $errors["password_user"] = "Le champ Mot de passe ne doit pas etre vide";
    }
    if($user["id_role"] === ""){
            $errors["id_role"] = "Le champ Rôle ne doit pas etre vide";
    }
    if(count($errors)){
        return $errors;
    }
    return $errors;
};

function emailExists($pdo, $email_user){
    $sql = "SELECT COUNT(*) FROM user WHERE email_user = :email_user";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email_user' => $email_user]);
    return $stmt->fetchColumn() > 0;
}

function verifUserExists(PDO $pdo, string $email_user, string $password) {
    $sql = "SELECT id_user, password_user FROM user WHERE email_user = :email_user";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email_user' => $email_user]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password_user'])) {
        return $user['id_user'];
    } else {
        return false;
    }
}

function getDataUser(PDO $pdo, string $id_user){
    $sql = "SELECT * FROM user WHERE id_user = :id_user";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id_user' => $id_user]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return $user ?: null;
}



function getRole(PDO $pdo, int $id_role){
    $sql = "SELECT name_role FROM role WHERE id_role= :id_role";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id_role' => $id_role]);
    $role = $stmt->fetch(PDO::FETCH_ASSOC);
    return $role ?: null;
}



function getDataCar(PDO $pdo, int $id_user){
    $sql = "SELECT * FROM car WHERE id_user= :id_user";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id_user' => $id_user]);
    $car = $stmt->fetch(PDO::FETCH_ASSOC);
    return $car ?: null;
}

function updateUser($pdo, $name_user, $lastname_user, $email_user, $phone_user, $dob_user, $id_user) {
    try {
        $sql = "UPDATE user SET 
                name_user = :name_user, 
                lastname_user = :lastname_user, 
                email_user = :email_user, 
                phone_user = :phone_user, 
                dob_user = :dob_user 
                WHERE id_user = :id_user";
        
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute([
            ':name_user' => $name_user,
            ':lastname_user' => $lastname_user,
            ':email_user' => $email_user,
            ':phone_user' => $phone_user,
            ':dob_user' => $dob_user,
            ':id_user' => $id_user
        ]);
        
        return $result;
    } catch (Exception $e) {
        error_log("Erreur updateUser: " . $e->getMessage());
        return false;
    }
}


/* Utilisation de requete preparé + de parametre nommé pour eviter les injections SQL */

