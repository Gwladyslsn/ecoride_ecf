document.addEventListener('DOMContentLoaded', () => {
    const departureCityInput = document.getElementById('departure-city');
    const departureDateInput = document.getElementById('departure-date');
    const departureHourInput = document.getElementById('departure-hour');
    const arrivalCityInput = document.getElementById('arrival-city');
    const arrivalDateInput = document.getElementById('arrival-date');
    const arrivalHourInput = document.getElementById('arrival-hour');
    const pricePlaceInput = document.getElementById('price-place');
    const btnSubmitTrip = document.getElementById('btn-submit-trip');
    const feedbackAdd = document.getElementById('feedback-add-carpooling');

    let selectedSeats = null;

    document.querySelectorAll('.seat-option').forEach(option => {
        option.addEventListener('click', function () {
            document.querySelectorAll('.seat-option').forEach(opt => opt.classList.remove('selected'));
            this.classList.add('selected');
            selectedSeats = parseInt(this.dataset.seats);
        });
    });

    // ✅ Fonction de vérification ville
    async function cityExists(city) {
        const url = `https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(city)}&countrycodes=fr&limit=1`;
        try {
            const response = await fetch(url, {
                headers: {
                    "User-Agent": "EcorideApp/1.0 (contact@ecoride.fr)",
                    "Accept-Language": "fr"
                }
            });
            const data = await response.json();
            console.log('data city', data);

            if (data.length === 0) return false;

            // On prend .name ou .display_name comme fallback
            const nomTrouve = data[0].name || data[0].display_name || "";
            console.log('Nom trouvé :', nomTrouve);

            // Normalisation
            const normalize = str => str.normalize("NFD").replace(/[\u0300-\u036f]/g, "").toLowerCase();

            return normalize(nomTrouve).includes(normalize(city)); // includes = tolérant
        } catch (error) {
            console.error("Erreur de géolocalisation :", error);
            return false;
        }
    }

    btnSubmitTrip.addEventListener('click', async (e) => {
        e.preventDefault();

        let departureCity = departureCityInput.value.trim();
        let departureDate = departureDateInput.value.trim();
        let departureHour = departureHourInput.value.trim();
        let arrivalCity = arrivalCityInput.value.trim();
        let arrivalDate = arrivalDateInput.value.trim();
        let arrivalHour = arrivalHourInput.value.trim();
        let pricePlace = pricePlaceInput.value.trim();
        let nbPlace = selectedSeats;

        const errors = {};

        // Validation simple
        if (!departureCity) errors['departureCity'] = "La ville de départ ne doit pas être vide";
        if (!departureDate) errors['departureDate'] = "La date de départ ne doit pas être vide";
        if (!departureHour) errors['departureHour'] = "L'heure de départ ne doit pas être vide";
        if (!arrivalCity) errors['arrivalCity'] = "La ville d'arrivée ne doit pas être vide";
        if (!arrivalDate) errors['arrivalDate'] = "La date d'arrivée ne doit pas être vide";
        if (!arrivalHour) errors['arrivalHour'] = "L'heure d'arrivée ne doit pas être vide";
        if (!pricePlace) errors['pricePlace'] = "Le nombre de crédits ne doit pas être vide";
        if (!nbPlace) errors['nbPlace'] = "Le nombre de places ne doit pas être vide";

        if (Object.keys(errors).length > 0) {
            afficherErreurs(errors);
            return;
        }

        // ✅ Vérifie si les villes existent
        const departureCityExists = await cityExists(departureCity);
        const arrivalCityExists = await cityExists(arrivalCity);

        if (!departureCityExists || !arrivalCityExists) {
            if (!departureCityExists) errors['villeDepart'] = `La ville de départ "${departureCity}" n'existe pas ou n'est pas en France`;
            if (!arrivalCityExists) errors['villeArrivee'] = `La ville d'arrivée "${arrivalCity}" n'existe pas ou n'est pas en France`;
            afficherErreurs(errors);
            return;
        }

        // Envoi des données au backend
        const data = {
            departure_city: departureCity,
            departure_date: departureDate,
            departure_hour: departureHour,
            arrival_city: arrivalCity,
            arrival_date: arrivalDate,
            arrival_hour: arrivalHour,
            price_place: pricePlace,
            nb_place: nbPlace
        };

        fetch('/?controller=page&action=newCarpooling', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
        })
            .then(res => res.json())
            .then(response => {
                if (response.success) {
                    const alertSuccess = document.getElementById('alert-success');
                    alertSuccess.classList.remove('hidden');
                } else {
                    alert('Erreur : ' + (response.message || 'Impossible de sauvegarder'));
                }
            })
            .catch((errors) => {
                console.error('Fetch error:', errors);
                alert('Erreur réseau ou serveur : ' + errors.message);
            });
    });

    function afficherErreurs(errors) {
        feedbackAdd.innerHTML = "";

        const alertDiv = document.createElement('div');
        alertDiv.className = 'alert alert-danger';

        const ul = document.createElement('ul');
        for (let key in errors) {
            const li = document.createElement('li');
            li.textContent = errors[key];
            ul.appendChild(li);
        }

        alertDiv.appendChild(ul);
        feedbackAdd.appendChild(alertDiv);
    }
});