document.addEventListener('DOMContentLoaded', () => {
    const departurecitySearchInput = document.getElementById('departure_city_search');
    const arrivalCitySearchInput = document.getElementById('arrival_city_search');
    const dateSearchInput = document.getElementById('date_search');
    const btnSearch = document.getElementById('btn_search');
    const feebackSearch = document.getElementById('feedback-search');

    btnSearch.addEventListener('click', (e) => {
        e.preventDefault();
        feebackSearch.innerHTML = "";
        let departureCitySearch = departurecitySearchInput.value.trim();
        let arrivalCitySearch = arrivalCitySearchInput.value.trim();
        let dateSearch = dateSearchInput.value.trim();

        const errors = {};

        let data = { departureCitySearch, arrivalCitySearch, dateSearch }
        console.log("data", data);


        // verif remplissage
        if (!departureCitySearch || departureCitySearch.length < 2) {
            errors['departureCitySearch'] = "La ville de départ ne doit pas être vide et doit contenir au moins 2 caractères";
        }
        if (!arrivalCitySearch || arrivalCitySearch.length < 2) {
            errors['arrivalCitySearch'] = "La ville de départ ne doit pas être vide et doit contenir au moins 2 caractères";
        }
        if (!dateSearch) {
            errors['dateSearch'] = "La date ne doit pas être vide";
        }


        if (Object.keys(errors).length > 0) {
            afficherErreurs(errors);
            return;
        } else {
            console.log("data :", data);
            
            fetch('/?controller=page&action=searchTripAPI', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(data)
            })
                .then(res => res.json())
                .then(response => {
                    if (response.success && response.trips) {
                        window.location.href = "/?controller=page&action=searchCarpooling";
                    } else {
                        alert('Erreur : ' + (response.message || 'Impossible d\'envoyer la recherche'));
                    }
                })
                .catch(() => {
                    alert('Erreur réseau ou serveur');
                });
        };
    });

    function afficherErreurs(errors) {
        feebackSearch.innerHTML = "";

        const alertDiv = document.createElement('div');
        alertDiv.className = 'alert alert-danger';

        const ul = document.createElement('ul');
        for (let key in errors) {
            const li = document.createElement('li');
            li.textContent = errors[key];
            ul.appendChild(li);
        }

        alertDiv.appendChild(ul);
        feebackSearch.appendChild(alertDiv);
    }

    function showTrips() {
        const container = document.getElementById('results-container');
        container.innerHTML = ''; // on vide l'ancien contenu

        if (!trips.length) {
            container.innerHTML = '<p>Aucun trajet trouvé.</p>';
            return;
        }

        trips.forEach(trip => {
            const div = document.createElement('div');
            div.classList.add('trip-item');
            div.innerHTML = `
            <h5>${trip.departure_city} → ${trip.arrival_city}</h5>
            <p>Date : ${trip.departure_date} à ${trip.departure_hour}</p>
            <p>Conducteur : ${trip.name_user}</p>
        `;
            container.appendChild(div);
        });
    }

});