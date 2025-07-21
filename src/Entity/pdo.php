<?php

//Connexion à la base de données

try
{
    $config = parse_ini_file(_ROOTPATH_ . ".env");
    global $pdo;
    $pdo = new PDO(
        'mysql:host=' . getenv('db_host') . ';dbname=' . getenv('db_name') . ';charset=utf8mb4',
        getenv('db_user'),
        getenv('db_password')
    );

    if (!isset($pdo)) {
    die("La connexion PDO n'a pas été créée !");
}
}
catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
}
