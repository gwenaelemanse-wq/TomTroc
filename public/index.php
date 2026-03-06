<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once __DIR__ . '/../app/config/config.php';
require_once __DIR__ . '/../app/config/autoload.php';
require_once __DIR__ . '/../app/services/Utils.php';

/*/
 * Système d'autoload.
 * A chaque fois que PHP va avoir besoin d'une classe, il va appeler cette fonction
 * et chercher dnas les divers dossiers (ici models, controllers, views, services) s'il trouve
 * un fichier avec le bon nom. Si c'est le cas, il l'inclut avec require_once.
 */
$action = Utils::request('action', 'accueil');

switch ($action) {
    case 'livres':
        $livresController = new LivresController();
        $livresController->index();
        break;

    case 'details-livre':
        $id = (int) Utils::request('id', 0);
        $livresController = new LivresController();
        $livresController->show($id);
        break;

    case 'accueil':
        $livresController = new LivresController();
        $livresController->showLastAdded();
        break;  // ← Appelle la méthode du contrôleur!

    case 'mon-compte':
        $id = (int) Utils::request('id', 0);
        $userController = new UsersController();
        $userController->showMonCompte();
        break;

    case 'connexion':
        $userController = new UsersController();
        $userController->login();
        break;

    case 'inscription':
        $userController = new UsersController();
        $userController->register();
        break;


    case 'messagerie':
        require_once __DIR__ . '/../app/views/messagerie.php';
        break;



    default:
        require __DIR__ . '/../app/views/accueil.php';
        break;
}
