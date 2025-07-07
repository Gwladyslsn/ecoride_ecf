<?php 

require_once _ROOTPATH_ . '/src/Templates/header.php';


if (!isset($_SESSION['admin'])) {
    header('Location: ?controller=page&action=homeAdmin');
    exit;
}
?>

<h1>Page accueil admin</h1>



<?php
require_once _ROOTPATH_ . '/src/Templates/footer.php'; ?>