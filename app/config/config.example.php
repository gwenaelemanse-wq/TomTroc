<?php

// En fonction des routes utilisées, il est possible d'avoir besoin de la session ; on la démarre dans tous les cas.
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}



define('TEMPLATE_VIEW_PATH', './views/templates/'); // Le chemin vers les templates de vues.
define('MAIN_VIEW_PATH', TEMPLATE_VIEW_PATH . 'accueil.php'); // Le chemin vers le template principal.

define('DB_HOST', 'localhost');
define('DB_NAME', 'your_database_name');
define('DB_USER', 'your_database_user');
define('DB_PASS', 'your_database_password');
