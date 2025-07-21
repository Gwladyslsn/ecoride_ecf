<?php
/*if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/* Si connecté */
function ifLog(string $redirectTo = 'http://localhost:8000/?controller=page&action=dashboardUser'): void
{
    if (isset($_SESSION['user'])) {
        header("Location: $redirectTo");
        exit();
    }
}

/* Si pas connecté */
function ifNotLog(string $redirectTo = 'http://localhost:8000/?controller=page&action=register'): void
{
    if (!isset($_SESSION['user'])) {
        header("Location: $redirectTo");
        exit();
    }
}

function logout(string $redirectTo = 'http://localhost:8000/?controller=page&action=home'){
    session_unset();
    session_destroy();
    header("Location: $redirectTo");
    exit();
}



                


