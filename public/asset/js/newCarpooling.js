document.addEventListener('DOMContentLoaded', () => {
    const btnSubmitTrip = document.getElementById('btn-submit-trip');

    btnSubmitTrip.addEventListener('click', (e) => {
        e.preventDefault();
        verifyInput();
    });


    function verifyInput() {
        const departureCityInput = document.getElementById('departure-city');
        const departureDateInput = document.getElementById('departure-date');
        const departureHourInput = document.getElementById('departure-hour');
        const arrivalCityInput = document.getElementById('arrival-city');
        const arrivalDateInput = document.getElementById('arrival-date');
        const arrivalHourInput = document.getElementById('arrival-hour');
        const pricePlaceInput = document.getElementById('price-place');
        //const seatSelectorInput = document.getElementById('seat-selector');

        //nettoyer input
        departureCity = departureCityInput.value.trim();
        departureDate = departureDateInput.value.trim();
        departureHour = departureHourInput.value.trim();
        arrivalCity = arrivalCityInput.value.trim();
        arrivalDate = arrivalDateInput.value.trim();
        arrivalHour = arrivalHourInput.value.trim();
        pricePlace = pricePlaceInput.value.trim();
        //seatSelector = seatSelectorInput.value;


        //verif input
        const errors = {};

        if (departureCity === "") {
            errors['departureCity'] = "La ville de départ ne doit pas etre vide !"
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
        console.log(departureCity);
        
    }
})



