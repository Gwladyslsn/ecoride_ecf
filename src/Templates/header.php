<?php
require_once _ROOTPATH_ . '/src/Entity/auth.php';
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/asset/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <meta description="Voyagez, partagez grâce à l'écologie">
    <title>Eco'ride</title>
</head>

<body>

    <div class="navbar bg-base-100 shadow-sm">
        <div class="navbar-start">
            <a href="/asset/Templates/page/home.php">
                <img src="/asset/image/logoEcoride.png" alt="Logo Ecoride" class="rounded-full logo">
            </a>
            <div class="dropdown">
                <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                    Menu
                </div>
                <ul
                    tabindex="0"
                    class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                    <li>
                        <a href="" class="text-lg">Covoiturages</a>
                    </li>
                    <li>
                        <a href="" class="text-lg">Historique</a>
                    </li>
                    <li><a href="http://localhost:8000/?controller=page&action=contact" class="text-lg">Contact</a></li>
                </ul>
            </div>
        </div>
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1 justify-around">
                <li>
                        <a href="" class="text-lg">Covoiturages</a>
                    </li>
                    <li>
                        <a href="" class="text-lg">Historique</a>
                    </li>
                    <li><a href="http://localhost:8000/?controller=page&action=contact" class="text-lg">Contact</a></li>
            </ul>
        </div>
        <div class="navbar-end">
            <?php  if (isset($_SESSION['user'])): ?>
                <a href="http://localhost:8000/?controller=page&action=logout" class="btn">Déconnexion</a>
            <?php else: ?>
                <a href="?controller=page&action=register" class="btn">Connexion</a>
            <?php endif; ?>
        </div>
    </div>