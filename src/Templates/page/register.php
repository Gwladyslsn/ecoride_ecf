<?php

require_once _ROOTPATH_ . '/src/Templates/header.php';
require_once _ROOTPATH_ . '/src/Entity/pdo.php';
require_once _ROOTPATH_ . '/src/Entity/users.php';

/* INSCRIPTION */

$errors = [];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $formType = $_POST['form_type'] ?? '';

    /* CONNEXION */
    if ($formType === 'log') {
        $email_user = $_POST["email_user"] ?? '';
        $password_user = $_POST["password_user"] ?? '';


        if (empty($errors)) {
            if (verifUserExists($pdo,  $email_user, $password_user)) {
                $_SESSION['user'] = $email_user;
                echo "Connexion réussie !";
                // Redirection possible ici : header("Location: dashboard.php");
            } else {
                echo "Identifiants et/ou mot de passe incorrect(s).";
            }
        } else {
            foreach ($errors as $field => $error) {
                echo "<p>$error</p>";
            }
        }
        /* INSCRIPTION */
    } else if ($formType === 'sign') {
        $name_user = $_POST["name_user"] ?? '';
        $lastname_user = $_POST["lastname_user"] ?? '';
        $email_user = $_POST["email_user"] ?? '';
        $password_user = $_POST["password_user"] ?? '';

        $errors = verifyUserInput($_POST);

        if (empty($errors)) {
            //Verifier si email existe dans bdd
            if (emailExists($pdo, $email_user)) {
                echo '
        <div class="alert alert-success">
            <p class="text-white bg-gray-900 body-font">Un compte avec cette adresse email existe déjà. Veuillez vous connecter ou utiliser une autre adresse.</p>
        </div>
        ';
            }
            //Verifier si inscription réussie
            else {
                if (addUser($pdo, $name_user,  $lastname_user, $email_user, $password_user)) {
                    echo '
            <div class="alert alert-success">
                <p class="text-gray-400 bg-gray-900 body-font">✅ Inscription réussie ! Vous pouvez maintenant vous connecter ! </a></p>
            </div>
            ';
                } else {
                    $errors[] = "Une erreur est survenue";
                }
            }
        }
    }
};


?>



<section class="text-gray-600 body-font pt-20 flex justify-center sectionLog">

    <form method="post" class="container containerLog">
        <input type="hidden" name="form_type" value="log">
        <div class="lg:w-5/6 md:w-2/2 bg-gray-100 rounded-lg p-10 flex flex-col mt-10 md:mt-0">
            <h2 class="text-gray-900 text-lg font-medium title-font text-center mb-5">Connexion</h2>
            <!--<div class="relative mb-4">
                <label for="name_user" class="leading-7 text-sm text-gray-600">Prénom</label>
                <input type="text" id="name_user_log" name="name_user" class="w-full bg-white rounded border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="relative mb-4">
                <label for="lastname_user	" class="leading-7 text-sm text-gray-600">Nom</label>
                <input type="text" id="lastname_user_log" name="lastname_user" class="w-full bg-white rounded border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>-->
            <div class="relative mb-4">
                <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                <input type="email" id="email_log" name="email_user" class="w-full bg-white rounded border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="relative mb-4">
                <label for="password_user" class="leading-7 text-sm text-gray-600">Mot de passe</label>
                <input type="password" id="password_log" name="password_user" class="w-full bg-white rounded border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <button class="text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">Se connecter</button>
        </div>
    </form>


    <div class="divider divider-horizontal">OU</div>


    <form method="post" class="container containerLog">
        <input type="hidden" name="form_type" value="sign">
        <div class="lg:w-5/6 md:w-2/2  bg-gray-100 rounded-lg p-10 flex flex-col mt-10 md:mt-0">
            <h2 class="text-gray-900 text-lg font-medium title-font text-center mb-5">Inscription</h2>
            <div class="relative mb-4">
                <label for="name_user" class="leading-7 text-sm text-gray-600">Prénom</label>
                <input type="text" id="name_user_sign" name="name_user" class="w-full bg-white rounded border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="relative mb-4">
                <label for="lastname_user	" class="leading-7 text-sm text-gray-600">Nom</label>
                <input type="text" id="lastname_user_sign" name="lastname_user" class="w-full bg-white rounded border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="relative mb-4">
                <label for="email_user" class="leading-7 text-sm text-gray-600">Email</label>
                <input type="email" id="email_sign" name="email_user" class="w-full bg-white rounded border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="relative mb-4">
                <label for="password_user" class="leading-7 text-sm text-gray-600">Mot de passe</label>
                <input type="password" id="password_sign" name="password_user" class="w-full bg-white rounded border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <button class="text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">S'inscrire</button>
        </div>
    </form>
</section>

<?php
require_once _ROOTPATH_ . '/src/Templates/footer.php'; ?>