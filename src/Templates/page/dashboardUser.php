<?php

require_once _ROOTPATH_ . '/src/Templates/header.php';
?>

<div class="max-w-6xl mx-auto">
        <!-- En-tête de la page -->
        <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Mon Espace Utilisateur</h1>

        <!-- Section Photo de Profil et Informations Basiques -->
        <div class="profile-section flex flex-col md:flex-row items-center md:items-start gap-6">
            <!-- Photo de profil -->
            <div class="flex-shrink-0">
                <img src="https://placehold.co/128x128/a78bfa/ffffff?text=Avatar" alt="Photo de profil" class="w-32 h-32 rounded-full object-cover border-4 border-purple-300 shadow-md">
            </div>
            <!-- Informations de base -->
            <div class="flex-grow text-center md:text-left">
                <h2 class="text-2xl font-semibold text-gray-900">John Doe</h2>
                <p class="text-gray-600">Passager / Chauffeur (exemple de statut)</p>
                <button class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors shadow-sm">
                    Modifier le profil
                </button>
            </div>
        </div>

        <!-- Section Informations Personnelles -->
        <div class="profile-section">
            <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-user-circle mr-2 text-blue-500"></i> Mes Informations Personnelles
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-700">
                <div><span class="font-medium">Nom :</span> <span class="text-gray-900">Doe</span></div>
                <div><span class="font-medium">Prénom :</span> <span class="text-gray-900">John</span></div>
                <div><span class="font-medium">Âge :</span> <span class="text-gray-900">30 ans</span></div>
                <div><span class="font-medium">E-mail :</span> <span class="text-gray-900">john.doe@example.com</span></div>
                <div><span class="font-medium">Téléphone :</span> <span class="text-gray-900">+33 6 12 34 56 78</span></div>
            </div>
            <button class="mt-6 px-4 py-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-600 transition-colors shadow-sm">
                Modifier mes informations
            </button>
        </div>

        <!-- Section Préférences de Trajet -->
        <div class="profile-section">
            <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-sliders-h mr-2 text-green-500"></i> Mes Préférences de Trajet
            </h3>
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
            <button class="mt-6 px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 transition-colors shadow-sm">
                Modifier mes préférences
            </button>
        </div>

        <!-- Section Véhicule (visible uniquement si l'utilisateur est chauffeur) -->
        <!-- Vous pouvez contrôler la visibilité de cette section avec JavaScript/votre backend -->
        <div class="profile-section">
            <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-car mr-2 text-red-500"></i> Mon Véhicule (si chauffeur)
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-700">
                <div><span class="font-medium">Marque :</span> <span class="text-gray-900">Renault</span></div>
                <div><span class="font-medium">Modèle :</span> <span class="text-gray-900">Clio</span></div>
                <div><span class="font-medium">Année :</span> <span class="text-gray-900">2020</span></div>
                <div><span class="font-medium">Énergie :</span> <span class="text-gray-900">Essence</span></div>
            </div>
            <button class="mt-6 px-4 py-2 bg-orange-500 text-white rounded-md hover:bg-orange-600 transition-colors shadow-sm">
                Modifier mon véhicule
            </button>
        </div>

        <!-- Bouton de déconnexion -->
        <div class="text-center mt-8">
            <button class="px-6 py-3 bg-gray-700 text-white rounded-md hover:bg-gray-800 transition-colors shadow-md">
                <i class="fas fa-sign-out-alt mr-2"></i> Se déconnecter
            </button>
        </div>
    </div>

<?php
require_once _ROOTPATH_ . '/src/Templates/footer.php'; ?>