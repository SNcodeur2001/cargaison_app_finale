<?php
// public/index.php (Version mise à jour)

// Démarrer la session
session_start();

// Inclure les fichiers nécessaires
require_once __DIR__ . '/../src/php/Router.php';

// Créer le routeur
$router = new Router();

// Routes principales de l'application
$router->get('/', 'home');
$router->get('/login', 'login');
$router->get('/tracking', 'tracking');
$router->get('/dashboard', 'dashboard');

// Routes existantes (compatibilité)
$router->get('/cargaisons', 'cargaisons');
$router->get('/clients', 'clients');
$router->get('/suivi', 'suivi');

// Routes API pour AJAX
$router->post('/api/login', 'api/login');
$router->post('/api/logout', 'api/logout');
$router->post('/api/tracking', 'api/tracking');

// Exécuter le routeur
$router->dispatch();