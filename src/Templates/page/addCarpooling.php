<?php

require_once _ROOTPATH_ . '/src/Templates/header.php';

?>

<section class="new-carpooling ">
        <div class="header">
            <div class="text-white mb-15 mt-10 text-center sm:text-xl md:text-3xl">Proposez votre trajet</div>
        </div>

        <form id="tripForm" class="max-w-6xl mx-auto">
            <!-- Départ -->
            <div class="form-section rounded-lg">
                <div class="section-title text-black">
                    <div class="section-icon">📍</div>
                        Départ
                </div>
                <div class="form-row">
                    <div class="form-group full-width">
                        <label for="departure-location">Lieu de départ</label>
                        <input type="text" id="departure-location" placeholder="Ex: Paris, 75001" required>
                    </div>
                    <div class="form-group">
                        <label for="departure-date">Date de départ</label>
                        <input type="date" id="departure-date" required>
                    </div>
                    <div class="form-group">
                        <label for="departure-time">Heure de départ</label>
                        <input type="time" id="departure-time" required>
                    </div>
                </div>
            </div>

            <!-- Arrivée -->
            <div class="form-section rounded-lg">
                <div class="section-title text-black">
                    <div class="section-icon">🎯</div>
                        Arrivée
                </div>
                <div class="form-row">
                    <div class="form-group full-width">
                        <label for="arrival-location">Lieu d'arrivée</label>
                        <input type="text" id="arrival-location" placeholder="Ex: Lyon" class="text-black" required>
                    </div>
                    <div class="form-group">
                        <label for="arrival-date">Date d'arrivée estimée</label>
                        <input type="date" id="arrival-date" required>
                    </div>
                    <div class="form-group">
                        <label for="arrival-time">Heure d'arrivée estimée</label>
                        <input type="time" id="arrival-time" required>
                    </div>
                </div>
            </div>

            <!-- Détails -->
            <div class="form-section rounded-lg">
                <div class="section-title text-black">
                    <div class="section-icon">⚙️</div> <!--a chganger par icon svg-->
                    Détails
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Nombre de places disponibles</label>
                        <div class="seats-selector">
                            <div class="seat-option" data-seats="1">1</div>
                            <div class="seat-option" data-seats="2">2</div>
                            <div class="seat-option" data-seats="3">3</div>
                            <div class="seat-option" data-seats="4">4</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price">Prix par personne</label>
                        <div class="price-input">
                            <input type="number" id="price" placeholder="Nombre d'EcoCrédit" min="2" step="1" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Description du trajet (optionnel)</label>
                    <textarea id="description" rows="3" placeholder="Informations supplémentaires, conditions particulières..."></textarea>
                </div>
            </div>

            <button type="submit" class="submit-btn">
                Publier mon trajet
            </button>


</section>

<?php
//$page_script = '/asset/js/dashboardUser.js';
require_once _ROOTPATH_ . '/src/Templates/footer.php';
?>