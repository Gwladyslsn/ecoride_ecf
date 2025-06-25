<?php

require_once _ROOTPATH_ . '/src/Templates/header.php';
require_once _ROOTPATH_ . '/src/Entity/pdo.php';
require_once _ROOTPATH_ . '/src/Entity/users.php';


//affichage info perso
if (isset($_SESSION['user'])) {
    $user = getDataUser($pdo, $_SESSION['user']);

    //affichage role
    $id_role = $user["id_role"];
    $role = getRole($pdo, $id_role);

    //affichage voiture
    $id_user = $user["id_user"];
    $car = getDataCar($pdo, $id_user);

    //affichage voiture   

    $avatarPath = !empty($user['avatar_user'])
        ? '/asset/uploads/avatars/' . htmlspecialchars($user['avatar_user'])
        : 'https://placehold.co/128x128/a78bfa/ffffff?text=Avatar';
}



?>

<div class="max-w-6xl mx-auto">
    <h1 class="text-3xl font-bold mb-8 text-center">Mon Espace Utilisateur</h1>
    <div class="profile-section flex flex-col md:flex-row items-center md:items-start gap-6">
        <div class="flex-shrink-0">
            <img
                src="<?= $avatarPath ?>"
                alt="Photo de profil"
                class="w-32 h-32 rounded-full object-cover border-4 border-purple-300 shadow-md">
        </div>
        <div class="flex-grow text-center md:text-left">
            <h2 class="text-2xl font-semibold text-gray-900"><?= $user["name_user"]; ?></h2>
            <p class="text-gray-600"><?= $role['name_role']; ?></p>
            <button id="edit-photo" class="btn rounded-md">Modifier ma photo</button>
            <form action="http://localhost:8000/?controller=page&action=updateUser" method="POST" enctype="multipart/form-data" class="mt-4">
                <input id="file-input" type="file" name="avatar" accept="image/*" class="mb-2 hidden text-gray-600">
                <button id="submit-btn" type="submit" name="upload_avatar" class="hidden px-3 py-1 bg-indigo-600 text-white rounded">
                    Mettre à jour la photo
                </button>
            </form>
        </div>
    </div>

    <div class="profile-section">
        <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">Mes Informations Personnelles</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-700 ">
            <div><span class="font-medium">Nom :</span> <span class="text-gray-900 edit-info" data-field="lastname_user"><?= $user["lastname_user"]; ?></span></div>
            <div><span class="font-medium">Prénom :</span> <span class="text-gray-900 edit-info" data-field="name_user"><?= $user["name_user"]; ?></span></div>
            <div><span class="font-medium">Date de naissance :</span> <span class="text-gray-900 edit-info" data-field="dob_user"><?= $user["dob_user"]; ?></span></div>
            <div><span class="font-medium">E-mail :</span> <span class="text-gray-900 edit-info" data-field="email_user"><?= $user["email_user"]; ?></span></div>
            <div><span class="font-medium">Téléphone :</span> <span class="text-gray-900 edit-info" data-field="phone_user"><?= $user["phone_user"]; ?></span></div>
        </div>
        <button id="edit-user-btn" class="mt-6 px-4 py-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-600 transition-colors shadow-sm edit-btn">
            Modifier mes informations
        </button>
    </div>

    <div class="profile-section">
        <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">Mes Préférences de Trajet</h3>
        <div class="space-y-3">
            <div class="flex items-center justify-between">
                <span class="text-gray-700">Tabac :</span>
                <label class="toggle-switch">
                    <input type="checkbox" checked>
                    <span class="slider"></span>
                </label>
            </div>
            <div class="flex items-center justify-between">
                <span class="text-gray-700">Animaux :</span>
                <label class="toggle-switch">
                    <input type="checkbox">
                    <span class="slider"></span>
                </label>
            </div>
            <div class="flex items-center justify-between">
                <span class="text-gray-700">Musique :</span>
                <label class="toggle-switch">
                    <input type="checkbox" checked>
                    <span class="slider"></span>
                </label>
            </div>
            <div class="flex items-center justify-between">
                <span class="text-gray-700">Parler :</span>
                <label class="toggle-switch">
                    <input type="checkbox" checked>
                    <span class="slider"></span>
                </label>
            </div>
        </div>
    </div>

    <div class="profile-section car-section">
        <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">Mon Véhicule</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-700">
            <div><span class="font-medium">Marque :</span> <span class="text-gray-900"><?= $car["brand_car"]; ?></span></div>
            <div><span class="font-medium">Modèle :</span> <span class="text-gray-900"><?= $car["model_car"]; ?></span></div>
            <div><span class="font-medium">Année :</span> <span class="text-gray-900"><?= $car["year_car"]; ?></span></div>
            <div><span class="font-medium">Énergie :</span> <span class="text-gray-900"><?= $car["energy_car"]; ?></span></div>
        </div>
        <button class="mt-6 px-4 py-2 bg-orange-500 text-white rounded-md hover:bg-orange-600 transition-colors shadow-sm">
            Modifier mon véhicule
        </button>
    </div>

    <div class="text-center mt-8">
        <button class="px-6 py-3 bg-gray-700 text-white rounded-md hover:bg-gray-800 transition-colors shadow-md">
            <i class="fas fa-sign-out-alt mr-2"></i> Se déconnecter
        </button>
    </div>
</div>


<?php
$page_script = '/asset/js/dashboardUser.js';
require_once _ROOTPATH_ . '/src/Templates/footer.php';
?>