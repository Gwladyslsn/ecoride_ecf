<?php

require_once _ROOTPATH_ . '/src/Templates/header.php'; 
require_once _ROOTPATH_ . '/src/Entity/pdo.php';

//var_dump($pdo);

?>



<section class="text-gray-600 body-font pt-20 flex justify-center sectionLog">
    
    <div class="container containerLog">
        <div class="lg:w-5/6 md:w-2/2 bg-gray-100 rounded-lg p-10 flex flex-col mt-10 md:mt-0">
            <h2 class="text-gray-900 text-lg font-medium title-font text-center mb-5">Connexion</h2>
            <div class="relative mb-4">
                <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                <input type="email" id="email" name="email" class="w-full bg-white rounded border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="relative mb-4">
                <label for="password" class="leading-7 text-sm text-gray-600">Mot de passe</label>
                <input type="password" id="password" name="password" class="w-full bg-white rounded border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <button class="text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">Se connecter</button>
        </div>
    </div>


    <div class="divider divider-horizontal">OU</div>

    
    <div class="container containerLog">
        <div class="lg:w-5/6 md:w-2/2  bg-gray-100 rounded-lg p-10 flex flex-col mt-10 md:mt-0">
            <h2 class="text-gray-900 text-lg font-medium title-font text-center mb-5">Inscription</h2>
            <div class="relative mb-4">
                <label for="full-name" class="leading-7 text-sm text-gray-600">Prénom</label>
                <input type="text" id="full-name" name="full-name" class="w-full bg-white rounded border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="relative mb-4">
                <label for="first-name" class="leading-7 text-sm text-gray-600">Nom</label>
                <input type="text" id="first-name" name="first-name" class="w-full bg-white rounded border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="relative mb-4">
                <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                <input type="email" id="email" name="email" class="w-full bg-white rounded border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="relative mb-4">
                <label for="password" class="leading-7 text-sm text-gray-600">Mot de passe</label>
                <input type="password" id="password" name="password" class="w-full bg-white rounded border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <button class="text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">S'inscrire</button>
        </div>
    </div>
</section>

<?php
require_once _ROOTPATH_ . '/src/Templates/footer.php'; ?>