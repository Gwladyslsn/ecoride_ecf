<?php

require_once _ROOTPATH_ . '/src/Templates/header.php'; 
require_once _ROOTPATH_ . '/src/Entity/auth.php';?>


<div class="hero w-auto min-h-dvh bg-image">
    <div class="hero-overlay"></div>
    <div class="hero-content text-neutral-content text-center">
        <div class="max-w-lg text-home">
            <h1 class="mb-5 text-5xl font-bold">Avec Eco'ride, voyagez proprement</h1>
            <p class="text-xl mt-8">
                Chez Ecoride, on croit qu’il est possible de se déplacer tout en respectant la planète. Notre plateforme de covoiturage met en relation conducteurs et passagers pour partager un trajet, réduire leur empreinte carbone et faire des économies, tout simplement.<br>
                        Que vous soyez conducteur avec des places disponibles ou passager à la recherche d’un trajet pratique et économique, Ecoride vous accompagne à chaque étape.<br><br>
                        🔍 Recherchez un trajet en quelques clics<br>
                        🚗 Réservez votre place grâce à un système de crédits simple et sécurisé<br>
                        🤝 Rencontrez des personnes qui partagent vos valeurs<br>
            </p>
            <button class="btn btn-home mt-5">
                <?php  if (isset($_SESSION['user'])): ?>
                        <a href="?controller=page&action=about">A propos de nous ..</a>
                    <?php else: ?>
                        <a href="http://localhost:8000/?controller=page&action=register" rel="noopener noreferrer">Nous rejoindre</a>
                    <?php endif; ?>
            </button>
        </div>
    </div>
</div>

<!--Galerie ville accessible par Ecoride-->
<section class="body-font">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-col text-center w-full mb-20">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4">Visitez ces villes grace à Eco'ride</h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-lg">De nouveaux trajets sont proposés régulièrement grace à notre grande communauté d'Eco'Rider! </p>
        </div>
        <div class="flex flex-wrap -m-4">
            <div class="lg:w-1/3 sm:w-1/2 md:w-1/2 p-4">
                <div class="flex relative">
                    <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center rounded-md" src="/asset/image/paris.webp">
                    <div class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 opacity-0 hover:opacity-100 card-city rounded-md">
                        <h1 class="title-font text-lg font-medium card-name mb-3">Paris</h1>
                        <p class="leading-relaxed">Une balade romantique à chaque coin de rue, entre monuments iconiques et terrasses ensoleillées</p>
                    </div>
                </div>
            </div>
            <div class="lg:w-1/3 sm:w-1/2 md:w-1/2 p-4">
                <div class="flex relative">
                    <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center rounded-md" src="/asset/image/lille.webp">
                    <div class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 opacity-0 hover:opacity-100 card-city rounded-md">
                        <h1 class="title-font text-lg font-medium mb-3">Lille</h1>
                        <p class="leading-relaxed">Un concentré de bonne humeur, de culture et d’authenticité dans le Nord au grand cœur.<br></p>
                    </div>
                </div>
            </div>
            <div class="lg:w-1/3 sm:w-1/2 md:w-1/2 p-4">
                <div class="flex relative">
                    <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center rounded-md" src="/asset/image/lyon.webp">
                    <div class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100 card-city rounded-md">
                        <h1 class="title-font text-lg font-medium mb-3">Lyon</h1>
                        <p class="leading-relaxed">Un mélange parfait de gastronomie, patrimoine et douceur de vivre au bord des deux fleuves.</p>
                    </div>
                </div>
            </div>
            <div class="lg:w-1/3 sm:w-1/2 md:w-1/2 p-4">
                <div class="flex relative">
                    <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center rounded-md" src="/asset/image/nice.webp">
                    <div class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 opacity-0 hover:opacity-100 card-city rounded-md">
                        <h1 class="title-font text-lg font-medium mb-3">Nice</h1>
                        <p class="leading-relaxed">Soleil, mer turquoise et palmiers… l’évasion méditerranéenne par excellence.</p>
                    </div>
                </div>
            </div>
            <div class="lg:w-1/3 sm:w-1/2 md:w-1/2 p-4">
                <div class="flex relative">
                    <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center rounded-md" src="/asset/image/strasbourg.webp">
                    <div class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 opacity-0 hover:opacity-100 card-city rounded-md">
                        <h1 class="title-font text-lg font-medium mb-3">Strasbourg</h1>
                        <p class="leading-relaxed">Un souffle de tradition et de charme alsacien au fil des canaux.<br></p>
                    </div>
                </div>
            </div>
            <div class="lg:w-1/3 sm:w-1/2 md:w-1/2 p-4">
                <div class="flex relative">
                    <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center rounded-md" src="/asset/image/toulouse.webp">
                    <div class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 opacity-0 hover:opacity-100 card-city rounded-md">
                        <h1 class="title-font text-lg font-medium mb-3">Toulouse</h1>
                        <p class="leading-relaxed">Une ville chaleureuse au charme du Sud, entre briques roses et ambiance conviviale.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--SearchBar-->
<section class="body-font">
    <div class="container px-5 py-12 mx-auto">
        <div class="flex flex-col text-center w-full mb-8">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2">Trouvez votre trajet dès maintenant !</h1>
        </div>
        <div class="flex lg:w-1/1 w-full sm:flex-row flex-col mx-auto px-8 sm:space-x-4 sm:space-y-0 space-y-4 sm:px-0 items-end">
            <div class="relative flex-grow w-full">
                <label for="full-name" class="leading-7 text-lg">Ville de départ</label>
                <input type="text" id="full-name" name="full-name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 text-base outline-none text-black py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="relative flex-grow w-full">
                <label for="email" class="leading-7 text-lg">Ville d'arrivée</label>
                <input type="email" id="email" name="email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 text-base outline-none text-black py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="relative flex-grow w-full">
                <label for="date" class="leading-7 text-lg">date</label>
                <input type="date" id="date" name="date" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-green-500 focus:bg-transparent focus:ring-2 focus:ring-green-200 text-base outline-none text-black py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <button class="border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg btn-search">
                <a href="">Rechercher</a>
            </button>
        </div>
    </div>
</section>



<?php
require_once _ROOTPATH_ . '/src/Templates/footer.php'; ?>