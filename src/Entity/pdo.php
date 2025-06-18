<?php 

#Connexion à la base de données

try
{
    $config = parse_ini_file(_ROOTPATH_ . "/.env");
    $pdo = new PDO("mysql:dbname={$config["db_name"]};host={$config["db_host"]};charset=utf8mb4", $config["db_user"], $config["db_password"]);
}
catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
}