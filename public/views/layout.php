<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'GPduMonde - Gestion Cargaison' ?></title>
    
    <!-- Preload critical resources -->
    <link rel="preload" href="https://cdn.tailwindcss.com" as="script">
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" as="style">
    
    <!-- Tailwind CSS CDN avec fallback -->
    <script src="https://cdn.tailwindcss.com"></script>
    <noscript>
        <link href="./assets/css/style.css" rel="stylesheet">
    </noscript>
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <!-- Fallback CSS -->
    <link href="./assets/css/style.css" rel="stylesheet">
    
    <!-- Inline critical CSS for immediate styling -->
    <style>
        /* Critical CSS pour éviter FOUC (Flash of Unstyled Content) */
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }
        
        .loading-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom right, #0f172a, #1e3a8a, #1e293b);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            color: white;
        }
        
        .spinner {
            width: 40px;
            height: 40px;
            border: 4px solid rgba(255, 255, 255, 0.3);
            border-top: 4px solid #60a5fa;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .fade-in {
            opacity: 0;
            animation: fadeIn 0.5s ease-in forwards;
        }
        
        @keyframes fadeIn {
            to { opacity: 1; }
        }
    </style>
    
    <!-- Configuration Tailwind personnalisée -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            500: '#3b82f6',
                            600: '#2563eb',
                            900: '#1e3a8a',
                        }
                    },
                    fontFamily: {
                        sans: ['-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'Roboto', 'Helvetica Neue', 'Arial', 'sans-serif'],
                    },
                }
            }
        }
    </script>
</head>
<body class="<?= $bodyClass ?? 'bg-gray-100' ?>">
    <!-- Loading screen -->
    <div id="loading-screen" class="loading-screen">
        <div class="text-center">
            <div class="spinner mb-4"></div>
            <p>Chargement...</p>
        </div>
    </div>
    
    <!-- Main content -->
    <div id="main-content" class="fade-in" style="display: none;">
        <?= $content ?? '' ?>
    </div>
    
    <!-- Scripts -->
    <script src="./assets/js/app.js"></script>
    
    <!-- Script d'initialisation -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Vérifier que les ressources sont chargées
            let resourcesLoaded = 0;
            const totalResources = 2; // Tailwind + FontAwesome
            
            function checkResourcesLoaded() {
                resourcesLoaded++;
                if (resourcesLoaded >= totalResources) {
                    // Masquer l'écran de chargement
                    setTimeout(() => {
                        const loadingScreen = document.getElementById('loading-screen');
                        const mainContent = document.getElementById('main-content');
                        
                        if (loadingScreen) {
                            loadingScreen.style.display = 'none';
                        }
                        if (mainContent) {
                            mainContent.style.display = 'block';
                        }
                    }, 500); // Petit délai pour une transition plus fluide
                }
            }
            
            // Vérifier Tailwind
            const testTailwind = document.createElement('div');
            testTailwind.className = 'hidden';
            document.body.appendChild(testTailwind);
            const isTailwindLoaded = window.getComputedStyle(testTailwind).display === 'none';
            document.body.removeChild(testTailwind);
            
            if (isTailwindLoaded) {
                checkResourcesLoaded();
            } else {
                console.warn('Tailwind CSS not loaded, using fallback');
                checkResourcesLoaded();
            }
            
            // Vérifier FontAwesome (attendre un peu car il peut être plus lent)
            setTimeout(() => {
                const testFA = document.createElement('i');
                testFA.className = 'fas fa-test';
                testFA.style.visibility = 'hidden';
                testFA.style.position = 'absolute';
                document.body.appendChild(testFA);
                
                const isFALoaded = window.getComputedStyle(testFA, ':before').fontFamily.includes('Font Awesome');
                document.body.removeChild(testFA);
                
                checkResourcesLoaded();
            }, 200);
        });
        
        // Fallback au cas où les ressources ne se chargent pas
        setTimeout(() => {
            const loadingScreen = document.getElementById('loading-screen');
            const mainContent = document.getElementById('main-content');
            
            if (loadingScreen && loadingScreen.style.display !== 'none') {
                console.warn('Forced loading screen removal after timeout');
                loadingScreen.style.display = 'none';
                if (mainContent) {
                    mainContent.style.display = 'block';
                }
            }
        }, 3000); // Forcer l'affichage après 3 secondes maximum
    </script>
    
    <?= $scripts ?? '' ?>
</body>
</html>