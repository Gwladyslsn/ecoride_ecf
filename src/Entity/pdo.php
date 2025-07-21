<?php

//Connexion à la base de données

try
{
    $config = parse_ini_file(_ROOTPATH_ . ".env");
    global $pdo;
    $pdo = new PDO("mysql:dbname={$config["db_name"]};host={$config["db_host"]};charset=utf8mb4", $config["db_user"], $config["db_password"]);

    if (!isset($pdo)) {
    die("La connexion PDO n'a pas été créée !");
}
}
catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
}
