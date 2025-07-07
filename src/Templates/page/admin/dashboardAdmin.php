<?php 

require_once _ROOTPATH_ . '/src/Templates/header.php';


if (!isset($_SESSION['admin'])) {
    header('Location: ?controller=admin&action=dashboardAdmin');
    exit;
}
?>

<h1>Page dashboard admin</h1>



<?php
require_once _ROOTPATH_ . '/src/Templates/footer.php'; ?>