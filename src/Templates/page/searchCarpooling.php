<?php

require_once _ROOTPATH_ . '/src/Templates/header.php';
require_once _ROOTPATH_ . '/src/Entity/trip.php';

$trips = getAllTrips();
?>

<!--SearchBar-->
<section class="body-font">
    <div class="container px-5 py-12 mx-auto">
        <div class="flex flex-col text-center w-full mb-8">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2">Trouvez votre trajet dès maintenant grâce à Eco'ride!</h1>
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

<section class="default-trip">
    <?php foreach ($trips as $trip): ?>
        <?php include _ROOTPATH_ . 'src/Templates/trip_item.php'; ?>
    <?php endforeach; ?>
</section>






<?php
//$page_script = '/asset/js/dashboardUser.js';
require_once _ROOTPATH_ . '/src/Templates/footer.php';
?>