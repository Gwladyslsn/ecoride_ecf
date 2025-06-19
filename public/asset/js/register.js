// Remplacer les caracteres utilisés pour faille xss :
function escapeHtml(text) {
    const map = {
        "&": "&amp",
        "<": "&lt;",
        ">": "&gt;",
        '"': "&quot;",
        "'": "&#039;",
    };
    return text.replace(/[&<>"']/g, function (m) {
        return map[m]
    });
}

/* SECU CONNEXION */

document.addEventListener("DOMContentLoaded", function () {
    const emailLogInput = document.getElementById('email_log');
    const passwordLogInput = document.getElementById('password_log');
    const btnLog = document.getElementById('btn_log');
    const feedbackLogin = document.getElementById('feedbackLogin');
    const formLog = document.getElementById('form_log');

    btnLog.addEventListener("click", function (event) {
        event.preventDefault();
        console.log("click btn login");

        //Nettoyage des input
        let emailLog = emailLogInput.value.trim();
        let passwordLog = passwordLogInput.value.trim();

        //Stock erreurs
        const errors = {};

        //Vérification des champs
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (emailLog === "") {
            errors['emailLog'] = "Le champ Mail ne doit pas etre vide !"
        } else if (!emailRegex.test(emailLog)) {
            errors['emailLog'] = "Le format de l'adresse mail est invalide !"
        }

        if (passwordLog === "") {
            errors['passwordLog'] = "Le champ Mot de passe ne doit pas etre vide"
        }

        //Afficher message si erreur
        if (Object.keys(errors).length > 0) {
            let errorHtml = '<div class="alert alert-danger"><ul>';
            for (let key in errors) {
                errorHtml += `<li>${escapeHtml(errors[key])}</li>`;
            }
            errorHtml += '</ul></div>';
            feedbackLogin.innerHTML = errorHtml;
            console.log("Erreurs de validation côté client :", errors);
        } else{
            formLog.submit();
        }

    })

});




/* SECU INSCRIPTION */
document.addEventListener("DOMContentLoaded", function () {
    const nameSignInput = document.getElementById('name_user_sign');
    const lastnameSignInput = document.getElementById('lastname_user_sign');
    const emailSignInput = document.getElementById('email_sign');
    const passwordSingInput = document.getElementById('password_sign');
    const btnSign = document.getElementById('btn_sign');
    const feedbackSign = document.getElementById('feedbackSign');
    const formSign = document.getElementById('form_sign');

    btnSign.addEventListener("click", function (event) {
        event.preventDefault();
        console.log("click btn login");

        //Nettoyage des input
        let nameSign = nameSignInput.value.trim();
        let lastnameSign = lastnameSignInput.value.trim();
        let emailSign = emailSignInput.value.trim();
        let passwordSign = passwordSingInput.value.trim();

        //Stock erreurs
        const errors = {};

        //Vérification des champs
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (emailSign === "") {
            errors['emailSign'] = "Le champ Mail ne doit pas etre vide !"
        } else if (!emailRegex.test(emailSign)) {
            errors['emailSign'] = "Le format de l'adresse mail est invalide !"
        }

        if (nameSign === "") {
            errors['nameSign'] = "Le champ Prénom ne doit pas etre vide"
        }

        if (lastnameSign === "") {
            errors['lastnameSign'] = "Le champ Nom ne doit pas etre vide"
        }

        if (passwordSign === "") {
            errors['passwordSign'] = "Le champ Mot de passe ne doit pas etre vide"
        }

        

        //Afficher message si erreur
        if (Object.keys(errors).length > 0) {
            let errorHtml = '<div class="alert alert-danger"><ul>';
            for (let key in errors) {
                errorHtml += `<li>${escapeHtml(errors[key])}</li>`;
            }
            errorHtml += '</ul></div>';
            feedbackSign.innerHTML = errorHtml;
            console.log("Erreurs de validation côté client :", errors);
        } else{
            formSign.submit();
        }

    })

});