<?php
// Fonction pour vérifier si l'utilisateur est connecté
function isLoggedIn() {
    return isset($_SESSION['user']);
}

// Fonction pour protéger les pages
function requireLogin() {
    if (!isLoggedIn()) {
        header('Location: /login');
        exit;
    }
}

// Fonction pour inclure une vue avec layout
function renderView($view, $data = []) {
    extract($data);
    
    ob_start();
    include __DIR__ . '/../../public/views/' . $view . '.php';
    $content = ob_get_clean();
    
    include __DIR__ . '/../../public/views/layout.php';
}

// Fonction pour les réponses JSON
function jsonResponse($data, $status = 200) {
    http_response_code($status);
    header('Content-Type: application/json');
    echo json_encode($data);
    exit;
}