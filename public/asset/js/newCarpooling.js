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
    const tripForm = document.getElementById('tripForm');
    //const seatSelectorInput = document.getElementById('seat-selector');

    btnSubmitTrip.addEventListener('click', (e) => {
        e.preventDefault();

        //nettoyer input
        let departureCity = departureCityInput.value.trim();
        let departureDate = departureDateInput.value.trim();
        let departureHour = departureHourInput.value.trim();
        let arrivalCity = arrivalCityInput.value.trim();
        let arrivalDate = arrivalDateInput.value.trim();
        let arrivalHour = arrivalHourInput.value.trim();
        let pricePlace = pricePlaceInput.value.trim();
        //seatSelector = seatSelectorInput.value;


        //verif input
        const errors = {};

        if (departureCity === "") {
            errors['departureCity'] = "La ville de départ ne doit pas etre vide "
        }

        if (departureDate === "") {
            errors['departureDate'] = "La date de départ ne doit pas etre vide"
        }

        if (departureHour === "") {
            errors['departureHour'] = "L'heure de départ ne doit pas etre vide"
        }

        if (arrivalCity === "") {
            errors['arrivalCity'] = "La ville d'arrivée ne doit pas etre vide"
        }
        if (arrivalDate === "") {
            errors['arrivalDate'] = "La date d'arrivée ne doit pas etre vide"
        }
        if (arrivalHour === "") {
            errors['arrivalHour'] = "L'heure d'arrivée estimée' ne doit pas etre vide"
        }
        if (pricePlace === "") {
            errors['pricePlace'] = "Le nombre de crédit demandé ne doit pas etre vide"
        }

        //Afficher message si erreur
        if (Object.keys(errors).length > 0) {
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
            return;

            //console.log("Erreurs de validation côté client :", errors);
        }
        const data = {
            departure_city: departureCity,
            departure_date: departureDate,
            departure_hour: departureHour,
            arrival_city: arrivalCity,
            arrival_date: arrivalDate,
            arrival_hour: arrivalHour,
            price_place: pricePlace
        };

        fetch('/?controller=page&action=newCarpooling', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
        })
            .then(res => res.json())
            .then(response => {
                if (response.success) {
                    window.location.reload();
                } else {
                    alert('Erreur : ' + (response.message || 'Impossible de sauvegarder'));
                }
            // AJOUTER ESPACE FEEDBACK ??
            })
            .catch(() => {
                console.error('Fetch error:', errors);
                alert('Erreur réseau ou serveur : ' + errors.message);

            })
    })
});



