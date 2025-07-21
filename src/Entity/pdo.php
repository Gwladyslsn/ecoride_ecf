<?php

//Connexion à la base de données

try {
    global $pdo;
    
    // Vérifier si on est sur Heroku (variable JAWSDB_URL existe)
    $jawsdb_url = getenv('JAWSDB_URL');
    
    if ($jawsdb_url) {
        // Configuration Heroku - Parser l'URL JawsDB
        $url = parse_url($jawsdb_url);
        
        $db_host = $url['host'];
        $db_user = $url['user'];
        $db_password = $url['pass'];
        $db_name = ltrim($url['path'], '/');
        $db_port = isset($url['port']) ? $url['port'] : 3306;
        
        // Créer la connexion PDO pour Heroku
        $pdo = new PDO(
            "mysql:host={$db_host};port={$db_port};dbname={$db_name};charset=utf8mb4",
            $db_user,
            $db_password,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]
        );
    } else {
        // Configuration locale - Vérifier d'abord les variables Heroku locales, puis le fichier .env
        $db_host = getenv('db_host');
        $db_user = getenv('db_user');
        $db_password = getenv('db_password');
        $db_name = getenv('db_name');
        $db_port = getenv('db_port') ?: 3306;
        
        if ($db_host && $db_user && $db_password && $db_name) {
            // Utiliser les variables d'environnement (Docker/local)
            $pdo = new PDO(
                "mysql:host={$db_host};port={$db_port};dbname={$db_name};charset=utf8mb4",
                $db_user,
                $db_password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false
                ]
            );
        } else {
            // Fallback sur le fichier .env
            $config = parse_ini_file(_ROOTPATH_ . ".env");
            
            $pdo = new PDO(
                "mysql:dbname={$config["db_name"]};host={$config["db_host"]};charset=utf8mb4",
                $config["db_user"],
                $config["db_password"],
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false
                ]
            );
        }
    }

    if (!isset($pdo)) {
        die("La connexion PDO n'a pas été créée !");
    }
    
} catch (Exception $e) {
    // En production, éviter d'afficher les détails de l'erreur
    if (getenv('JAWSDB_URL')) {
        error_log('Erreur de connexion BDD: ' . $e->getMessage());
        die('Erreur de connexion à la base de données');
    } else {
        die('Erreur : ' . $e->getMessage());
    }
}
