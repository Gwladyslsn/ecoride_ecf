<?php 


function addUser(PDO $pdo,string $name_user, string $lastname_user, string $email_user, string $password_user):bool
{
    $query = $pdo->prepare("INSERT INTO `user`(`name_user`, `lastname_user`, `email_user`, `password_user`) VALUES (:name_user, :lastname_user, :email_user, :password_user)");

    $password = password_hash($password_user, PASSWORD_DEFAULT);

    $query->bindValue(':name_user', $name_user);
    $query->bindValue(':lastname_user', $lastname_user);
    $query->bindValue(':email_user', $email_user);
    $query->bindValue(':password_user', $password);

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

function verifUserExists($pdo, $email_user, $password) {
    $sql = "SELECT password_user FROM user WHERE email_user = :email_user";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email_user' => $email_user]);
    $hash = $stmt->fetchColumn();

    if ($hash && password_verify($password, $hash)) {
        return true;
    } else {
        return false;
    }
}


