<?php
// src/php/Router.php (Version simple modifiée)

class Router {
    private array $routes = [];

    public function get(string $path, string $view) {
        $this->routes['GET'][$path] = $view;
    }

    public function post(string $path, string $view) {
        $this->routes['POST'][$path] = $view;
    }

    public function dispatch() {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        
        // Nettoyer le chemin (enlever les slashes finaux sauf pour la racine)
        $path = rtrim($path, '/') ?: '/';

        if (isset($this->routes[$method][$path])) {
            $view = $this->routes[$method][$path];
            $this->handleRoute($view);
        } else {
            $this->handle404();
        }
    }

    private function handleRoute(string $view) {
        // Gestion des routes API (pour AJAX)
        if (strpos($view, 'api/') === 0) {
            $this->handleApi($view);
            return;
        }

        // Gestion des vues normales
        $this->renderView($view);
    }

    private function renderView(string $view) {
        $file = __DIR__ . '/../../public/views/' . $view . '.php';

        if (file_exists($file)) {
            // Inclure directement la vue (elle gère son propre layout)
            include $file;
        } else {
            $this->handle404();
        }
    }

    private function handleApi(string $endpoint) {
        // Gestion des endpoints API pour AJAX
        header('Content-Type: application/json');
        
        switch ($endpoint) {
            case 'api/login':
                $this->handleLogin();
                break;
            case 'api/logout':
                $this->handleLogout();
                break;
            case 'api/tracking':
                $this->handleTracking();
                break;
            default:
                http_response_code(404);
                echo json_encode(['error' => 'API endpoint not found']);
        }
    }

    private function handleLogin() {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        
        // Validation simple (à améliorer avec une vraie base de données)
        if ($email && $password) {
            $_SESSION['user'] = [
                'email' => $email,
                'name' => 'Gestionnaire',
                'role' => 'manager'
            ];
            
            echo json_encode([
                'success' => true, 
                'message' => 'Connexion réussie',
                'redirect' => '/dashboard'
            ]);
        } else {
            http_response_code(400);
            echo json_encode([
                'success' => false, 
                'message' => 'Email et mot de passe requis'
            ]);
        }
    }

    private function handleLogout() {
        session_destroy();
        echo json_encode([
            'success' => true, 
            'message' => 'Déconnexion réussie',
            'redirect' => '/'
        ]);
    }

    private function handleTracking() {
        $trackingCode = $_POST['tracking_code'] ?? '';
        
        if (!$trackingCode) {
            http_response_code(400);
            echo json_encode([
                'success' => false,
                'message' => 'Code de suivi requis'
            ]);
            return;
        }

        // Simulation de données de tracking
        $mockData = $this->generateTrackingData($trackingCode);
        
        if ($mockData) {
            echo json_encode([
                'success' => true,
                'data' => $mockData
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Colis non trouvé'
            ]);
        }
    }

    private function generateTrackingData(string $code) {
        // Simulation d'un colis non trouvé pour codes trop courts
        if (strlen($code) < 5) {
            return null;
        }

        $statuses = ['EN_ATTENTE', 'EN_COURS', 'ARRIVE', 'RECUPERE'];
        $types = ['Maritime', 'Aérien', 'Routier'];
        $origins = ['Dakar', 'Abidjan', 'Casablanca', 'Tunis'];
        $destinations = ['Paris', 'Londres', 'Berlin', 'Madrid'];
        
        return [
            'code' => $code,
            'status' => $statuses[array_rand($statuses)],
            'type' => $types[array_rand($types)],
            'origine' => $origins[array_rand($origins)],
            'destination' => $destinations[array_rand($destinations)],
            'dateEnvoi' => date('Y-m-d', strtotime('-' . rand(1, 30) . ' days')),
            'dateArrivePrevue' => date('Y-m-d', strtotime('+' . rand(1, 15) . ' days')),
            'poids' => rand(5, 50) . '.5 kg',
            'expediteur' => 'Client ' . substr($code, -3),
            'destinataire' => 'Destinataire ' . substr($code, 0, 3)
        ];
    }

    private function handle404() {
        http_response_code(404);
        
        // Vérifier si une vue 404 existe
        $notFoundFile = __DIR__ . '/../../public/views/404.php';
        
        if (file_exists($notFoundFile)) {
            include $notFoundFile;
        } else {
            // Page 404 simple par défaut
            echo '<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page non trouvée - GPduMonde</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-slate-900 via-blue-900 to-slate-800 min-h-screen flex items-center justify-center">
    <div class="text-center">
        <i class="fas fa-exclamation-triangle text-6xl text-yellow-400 mb-6"></i>
        <h1 class="text-4xl font-bold text-white mb-4">Page non trouvée</h1>
        <p class="text-gray-300 mb-8">La page que vous recherchez n\'existe pas.</p>
        <a href="/" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg transition-colors">
            <i class="fas fa-home mr-2"></i>Retour à l\'accueil
        </a>
    </div>
</body>
</html>';
        }
    }
}