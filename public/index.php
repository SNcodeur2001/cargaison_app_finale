<?php
require_once __DIR__ . '/../src/php/Router.php';

$router = new Router();

// Définition des routes
$router->get('/', 'home');
$router->get('/cargaisons', 'cargaisons');
$router->get('/clients', 'clients');
$router->get('/suivi', 'suivi');

// Exécution du router
$router->dispatch();
