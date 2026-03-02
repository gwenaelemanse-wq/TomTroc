<?php


$page = $_GET['page'] ?? 'accueil';

$allowedPages = [
    'accueil',
    'livres',
    'details-livre',
    'connexion',
    'inscription',
    'messagerie',
    'mon-compte',
    'compte-public',
    'editer'
];

if (!in_array($page, $allowedPages, true)) {
    $page = 'accueil';
}

// Controllers (simple, sans autoload pour l’instant)
require_once __DIR__ . '/../app/controllers/LivresController.php';

// Si c'est la page livres, on passe par le controller
if ($page === 'livres') {
    $controller = new LivresController();
    $controller->index();
    exit;
}
if ($page === 'details-livre') {
    $controller = new LivresController();
    $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
    $controller->show($id);
    exit;
}

$viewPath = __DIR__ . '/../app/views/' . $page . '.php';

if (!file_exists($viewPath)) {
    http_response_code(404);
    echo "Page introuvable";
    exit;
}



require $viewPath;
