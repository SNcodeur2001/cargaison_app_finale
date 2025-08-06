<?php
// public/views/login.php
$title = "Connexion - GPduMonde";
$bodyClass = "bg-gradient-to-br from-slate-900 via-blue-900 to-slate-800 min-h-screen";
?>

<div class="min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-8 border border-white/20">
            <!-- Header -->
            <div class="text-center mb-8">
                <a href="/" class="absolute top-8 left-8 text-white hover:text-purple-400 transition-colors">
                    <i class="fas fa-arrow-left text-xl"></i>
                </a>
                <i class="fas fa-user-tie text-4xl text-purple-400 mb-4"></i>
                <h1 class="text-3xl font-bold text-white mb-2">Connexion Gestionnaire</h1>
                <p class="text-gray-300">Accédez à votre espace de gestion</p>
            </div>

            <!-- Messages d'erreur/succès -->
            <div id="loginMessage" class="hidden mb-6 p-4 rounded-lg"></div>

            <!-- Formulaire de connexion -->
            <form id="loginForm" class="space-y-6" onsubmit="handleLogin(event)">
                <div>
                    <label class="block text-white font-semibold mb-3">Email</label>
                    <input 
                        type="email" 
                        id="email"
                        name="email"
                        placeholder="votre@email.com"
                        class="w-full px-4 py-4 bg-white/5 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:border-purple-400 focus:ring-2 focus:ring-purple-400/20 focus:outline-none transition-all"
                        required
                    >
                </div>

                <div>
                    <label class="block text-white font-semibold mb-3">Mot de passe</label>
                    <div class="relative">
                        <input 
                            type="password" 
                            id="password"
                            name="password"
                            placeholder="••••••••"
                            class="w-full px-4 py-4 bg-white/5 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:border-purple-400 focus:ring-2 focus:ring-purple-400/20 focus:outline-none transition-all"
                            required
                        >
                        <button type="button" onclick="togglePassword()" class="absolute right-4 top-4 text-gray-400 hover:text-white">
                            <i class="fas fa-eye" id="passwordToggle"></i>
                        </button>
                    </div>
                </div>

                <button 
                    type="submit"
                    id="loginButton"
                    class="w-full bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 text-white font-semibold py-4 px-6 rounded-xl transition-all duration-300 hover:scale-105 flex items-center justify-center space-x-2"
                >
                    <i class="fas fa-sign-in-alt"></i>
                    <span>Se connecter</span>
                </button>
            </form>

            <!-- Informations de test -->
            <div class="mt-8 p-4 bg-blue-500/10 rounded-lg border border-blue-500/20">
                <p class="text-blue-300 text-sm text-center">
                    <i class="fas fa-info-circle mr-1"></i>
                    Pour tester : utilisez n'importe quel email et mot de passe
                </p>
            </div>
        </div>
    </div>
</div>

<script>
function togglePassword() {
    const passwordInput = document.getElementById('password');
    const toggleIcon = document.getElementById('passwordToggle');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.classList.remove('fa-eye');
        toggleIcon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        toggleIcon.classList.remove('fa-eye-slash');
        toggleIcon.classList.add('fa-eye');
    }
}

function handleLogin(event) {
    event.preventDefault();
    
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const button = document.getElementById('loginButton');
    const message = document.getElementById('loginMessage');
    
    // Animation du bouton
    button.innerHTML = '<i class="fas fa-spinner fa-spin"></i><span>Connexion...</span>';
    button.disabled = true;
    
    // Simulation de la connexion (remplacer par un appel AJAX réel)
    setTimeout(() => {
        if (email && password) {
            // Succès - redirection
            message.className = 'mb-6 p-4 rounded-lg bg-green-500/20 border border-green-500/30 text-green-300';
            message.textContent = 'Connexion réussie ! Redirection...';
            message.classList.remove('hidden');
            
            setTimeout(() => {
                window.location.href = '/dashboard';
            }, 1500);
        } else {
            // Erreur
            message.className = 'mb-6 p-4 rounded-lg bg-red-500/20 border border-red-500/30 text-red-300';
            message.textContent = 'Email et mot de passe requis';
            message.classList.remove('hidden');
            
            button.innerHTML = '<i class="fas fa-sign-in-alt"></i><span>Se connecter</span>';
            button.disabled = false;
        }
    }, 1500);
}
</script>