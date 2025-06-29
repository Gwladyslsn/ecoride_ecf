<section class="text-gray-600 body-font">
    <div class="container px-5 py-6 mx-auto flex flex-wrap">
        <div class="flex flex-wrap -m-4 w-full bg-white">
            <div class="p-4 lg:w-full md:w-full">
                <div class="flex border-2 rounded-lg border-gray-200 border-opacity-50 p-6 sm:flex-row flex-col">
                    <div class="w-16 h-16 sm:mr-8 sm:mb-0 mb-4 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 flex-shrink-0 overflow-hidden">
                        <img src="<?= $trip['avatar_user'] ?? 'https://via.placeholder.com/64' ?>" alt="Photo de <?= htmlspecialchars($trip['firstname']) ?>" class="w-full h-full object-cover rounded-full">
                    </div>
                    <div class="flex-grow">
                        <h2 class="text-gray-900 text-lg title-font font-semibold mb-2">
                            Trajet proposé par <?= htmlspecialchars($trip['name_user']) ?>
                        </h2>

                        <div class="mb-2">
                            <p class="text-sm text-gray-600 font-semibold uppercase">Départ</p>
                            <p class="text-base">
                                <?= htmlspecialchars($trip['departure_city']) ?> -
                                le <?= date('d/m/Y', strtotime($trip['departure_date'])) ?> à <?= htmlspecialchars($trip['departure_hour']) ?>
                            </p>
                        </div>

                        <div class="mb-2">
                            <p class="text-sm text-gray-600 font-semibold uppercase">Arrivée</p>
                            <p class="text-base">
                                <?= htmlspecialchars($trip['arrival_city']) ?> -
                                le <?= date('d/m/Y', strtotime($trip['arrival_date'])) ?> à <?= htmlspecialchars($trip['arrival_hour']) ?>
                            </p>
                        </div>

                        <a href="#" class="mt-3 text-indigo-500 inline-flex items-center">
                            Voir le détail
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>