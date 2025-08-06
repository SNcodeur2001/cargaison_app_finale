<?php
$title = "GPduMonde - Accueil";
$bodyClass = "bg-gradient-to-br from-slate-900 via-blue-900 to-slate-800 min-h-screen";
?>

<div class="min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-6xl">
        <!-- Header -->
        <div class="text-center mb-12">
            <div class="mb-6">
                <i class="fas fa-shipping-fast text-6xl text-blue-400 mb-4"></i>
            </div>
            <h1 class="text-5xl font-bold text-white mb-4 tracking-tight">GPduMonde</h1>
            <p class="text-xl text-gray-300 mb-2">Entreprise de Transport de Colis Mondial</p>
            <div class="w-24 h-1 bg-gradient-to-r from-blue-400 to-cyan-400 mx-auto rounded-full"></div>
        </div>

        <!-- Options principales -->
        <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
            <!-- Client - Suivi colis -->
            <div class="group">
                <a href="/tracking" class="block">
                    <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-8 border border-white/20 hover:bg-white/15 transition-all duration-300 hover:scale-105">
                        <div class="text-center">
                            <div class="w-20 h-20 bg-gradient-to-br from-blue-400 to-cyan-400 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                                <i class="fas fa-search text-white text-2xl"></i>
                            </div>
                            <h2 class="text-2xl font-bold text-white mb-4">Suivi de Colis</h2>
                            <p class="text-gray-300 mb-6">Suivez l'état d'avancement de votre colis en temps réel</p>
                            <div class="inline-flex items-center text-blue-400 font-semibold group-hover:text-blue-300">
                                <span>Accéder au suivi</span>
                                <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Gestionnaire -->
            <div class="group">
                <a href="/login" class="block">
                    <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-8 border border-white/20 hover:bg-white/15 transition-all duration-300 hover:scale-105">
                        <div class="text-center">
                            <div class="w-20 h-20 bg-gradient-to-br from-purple-400 to-pink-400 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                                <i class="fas fa-user-tie text-white text-2xl"></i>
                            </div>
                            <h2 class="text-2xl font-bold text-white mb-4">Espace Gestionnaire</h2>
                            <p class="text-gray-300 mb-6">Gérez vos cargaisons, clients et opérations</p>
                            <div class="inline-flex items-center text-purple-400 font-semibold group-hover:text-purple-300">
                                <span>Se connecter</span>
                                <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Features -->
        <div class="mt-16 grid md:grid-cols-3 gap-6 max-w-4xl mx-auto">
            <div class="text-center">
                <div class="w-12 h-12 bg-blue-500/20 rounded-lg flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-plane text-blue-400"></i>
                </div>
                <h3 class="text-white font-semibold mb-2">Transport Aérien</h3>
                <p class="text-gray-400 text-sm">Livraison rapide par voie aérienne</p>
            </div>
            <div class="text-center">
                <div class="w-12 h-12 bg-blue-500/20 rounded-lg flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-ship text-blue-400"></i>
                </div>
                <h3 class="text-white font-semibold mb-2">Transport Maritime</h3>
                <p class="text-gray-400 text-sm">Solution économique pour gros volumes</p>
            </div>
            <div class="text-center">
                <div class="w-12 h-12 bg-blue-500/20 rounded-lg flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-truck text-blue-400"></i>
                </div>
                <h3 class="text-white font-semibold mb-2">Transport Routier</h3>
                <p class="text-gray-400 text-sm">Livraison terrestre flexible</p>
            </div>
        </div>
    </div>
</div>

<script>
// Animation des éléments au chargement
document.addEventListener('DOMContentLoaded', function() {
    const elements = document.querySelectorAll('.group');
    elements.forEach((element, index) => {
        element.style.opacity = '0';
        element.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
            element.style.transition = 'all 0.6s ease';
            element.style.opacity = '1';
            element.style.transform = 'translateY(0)';
        }, index * 200);
    });
});
</script>