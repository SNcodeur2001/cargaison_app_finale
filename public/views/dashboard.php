<?php
// public/views/dashboard.php
// Protection de la page (à décommenter quand les sessions sont configurées)
// require_once __DIR__ . '/../../src/php/functions.php';
// requireLogin();

$title = "Dashboard - GPduMonde";
$bodyClass = "bg-gray-50";
?>

<div class="min-h-screen">
    <!-- Sidebar -->
    <div id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-xl transform -translate-x-full lg:translate-x-0 transition-transform duration-300">
        <div class="flex items-center justify-center h-16 bg-gradient-to-r from-blue-500 to-purple-500">
            <h1 class="text-white text-xl font-bold">GPduMonde</h1>
        </div>
        <nav class="mt-8">
            <a href="#" onclick="showSection('overview')" class="flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors nav-item active">
                <i class="fas fa-chart-line mr-3"></i>
                Vue d'ensemble
            </a>
            <a href="#" onclick="showSection('cargaisons')" class="flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors nav-item">
                <i class="fas fa-boxes mr-3"></i>
                Cargaisons
            </a>
            <a href="#" onclick="showSection('clients')" class="flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors nav-item">
                <i class="fas fa-users mr-3"></i>
                Clients
            </a>
            <a href="#" onclick="showSection('colis')" class="flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors nav-item">
                <i class="fas fa-package mr-3"></i>
                Colis
            </a>
            <a href="#" onclick="showSection('recherche')" class="flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors nav-item">
                <i class="fas fa-search mr-3"></i>
                Recherche
            </a>
        </nav>
        <div class="absolute bottom-0 w-full p-6">
            <button onclick="logout()" class="w-full flex items-center justify-center px-4 py-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                <i class="fas fa-sign-out-alt mr-2"></i>
                Déconnexion
            </button>
        </div>
    </div>

    <!-- Main content -->
    <div class="lg:ml-64">
        <!-- Header -->
        <div class="bg-white shadow-sm border-b border-gray-200">
            <div class="flex items-center justify-between h-16 px-6">
                <button onclick="toggleSidebar()" class="lg:hidden text-gray-600 hover:text-gray-900">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <h2 id="pageTitle" class="text-xl font-semibold text-gray-800">Vue d'ensemble</h2>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <i class="fas fa-bell text-gray-400 text-xl cursor-pointer hover:text-gray-600"></i>
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">3</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold text-sm">G</div>
                        <span class="text-gray-700 font-medium">Gestionnaire</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dashboard content -->
        <div class="p-6">
            <!-- Vue d'ensemble -->
            <div id="overviewSection" class="section">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600">Total Cargaisons</p>
                                <p class="text-3xl font-bold text-gray-800">24</p>
                            </div>
                            <div class="bg-blue-100 p-3 rounded-full">
                                <i class="fas fa-boxes text-blue-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600">Colis en transit</p>
                                <p class="text-3xl font-bold text-gray-800">156</p>
                            </div>
                            <div class="bg-yellow-100 p-3 rounded-full">
                                <i class="fas fa-shipping-fast text-yellow-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600">Colis livrés</p>
                                <p class="text-3xl font-bold text-gray-800">1,234</p>
                            </div>
                            <div class="bg-green-100 p-3 rounded-full">
                                <i class="fas fa-check-circle text-green-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600">Clients actifs</p>
                                <p class="text-3xl font-bold text-gray-800">89</p>
                            </div>
                            <div class="bg-purple-100 p-3 rounded-full">
                                <i class="fas fa-users text-purple-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Cargaisons récentes</h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                <div>
                                    <p class="font-medium">CGN001</p>
                                    <p class="text-sm text-gray-600">Maritime - Dakar → Paris</p>
                                </div>
                                <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded-full">En cours</span>
                            </div>
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                <div>
                                    <p class="font-medium">CGN002</p>
                                    <p class="text-sm text-gray-600">Aérien - Abidjan → Londres</p>
                                </div>
                                <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Arrivé</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Actions rapides</h3>
                        <div class="space-y-3">
                            <button onclick="showCreateModal()" class="w-full flex items-center justify-center px-4 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">
                                <i class="fas fa-plus mr-2"></i>
                                Nouvelle cargaison
                            </button>
                            <button onclick="showSection('clients')" class="w-full flex items-center justify-center px-4 py-3 bg-purple-500 text-white rounded-lg hover:bg-purple-600 transition-colors">
                                <i class="fas fa-user-plus mr-2"></i>
                                Nouveau client
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section Cargaisons -->
            <div id="cargaisonsSection" class="section hidden">
                <div class="bg-white rounded-lg shadow">
                    <div class="p-6 border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold text-gray-800">Gestion des cargaisons</h3>
                            <button onclick="showCreateModal()" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors">
                                <i class="fas fa-plus mr-2"></i>
                                Nouvelle cargaison
                            </button>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="border-b border-gray-200">
                                        <th class="text-left py-3 px-4 font-semibold">Code</th>
                                        <th class="text-left py-3 px-4 font-semibold">Type</th>
                                        <th class="text-left py-3 px-4 font-semibold">Origine</th>
                                        <th class="text-left py-3 px-4 font-semibold">Destination</th>
                                        <th class="text-left py-3 px-4 font-semibold">État</th>
                                        <th class="text-left py-3 px-4 font-semibold">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-b border-gray-100">
                                        <td class="py-3 px-4">CGN001</td>
                                        <td class="py-3 px-4">Maritime</td>
                                        <td class="py-3 px-4">Dakar</td>
                                        <td class="py-3 px-4">Paris</td>
                                        <td class="py-3 px-4">
                                            <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded-full">En cours</span>
                                        </td>
                                        <td class="py-3 px-4">
                                            <button class="text-blue-600 hover:text-blue-800 mr-2">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="text-green-600 hover:text-green-800 mr-2">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="border-b border-gray-100">
                                        <td class="py-3 px-4">CGN002</td>
                                        <td class="py-3 px-4">Aérien</td>
                                        <td class="py-3 px-4">Abidjan</td>
                                        <td class="py-3 px-4">Londres</td>
                                        <td class="py-3 px-4">
                                            <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Arrivé</span>
                                        </td>
                                        <td class="py-3 px-4">
                                            <button class="text-blue-600 hover:text-blue-800 mr-2">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="text-green-600 hover:text-green-800 mr-2">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section Clients -->
            <div id="clientsSection" class="section hidden">
                <div class="bg-white rounded-lg shadow">
                    <div class="p-6 border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold text-gray-800">Gestion des clients</h3>
                            <button class="bg-purple-500 text-white px-4 py-2 rounded-lg hover:bg-purple-600 transition-colors">
                                <i class="fas fa-user-plus mr-2"></i>
                                Nouveau client
                            </button>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="text-center py-12">
                            <i class="fas fa-users text-6xl text-gray-300 mb-4"></i>
                            <h3 class="text-xl font-semibold text-gray-600 mb-2">Gestion des clients</h3>
                            <p class="text-gray-500">Interface de gestion des clients en cours de développement...</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section Colis -->
            <div id="colisSection" class="section hidden">
                <div class="bg-white rounded-lg shadow">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-800">Gestion des colis</h3>
                    </div>
                    <div class="p-6">
                        <div class="text-center py-12">
                            <i class="fas fa-package text-6xl text-gray-300 mb-4"></i>
                            <h3 class="text-xl font-semibold text-gray-600 mb-2">Gestion des colis</h3>
                            <p class="text-gray-500">Interface de gestion des colis en cours de développement...</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section Recherche -->
            <div id="rechercheSection" class="section hidden">
                <div class="bg-white rounded-lg shadow">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-800">Recherche avancée</h3>
                    </div>
                    <div class="p-6">
                        <div class="text-center py-12">
                            <i class="fas fa-search text-6xl text-gray-300 mb-4"></i>
                            <h3 class="text-xl font-semibold text-gray-600 mb-2">Recherche avancée</h3>
                            <p class="text-gray-500">Interface de recherche en cours de développement...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Nouvelle Cargaison -->
<div id="createModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl m-4">
        <div class="p-6 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-800">Nouvelle cargaison</h3>
                <button onclick="hideCreateModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
        </div>
        <form class="p-6 space-y-4" onsubmit="handleCreateCargaison(event)">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Type de cargaison</label>
                    <select class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option>Maritime</option>
                        <option>Aérien</option>
                        <option>Routier</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Poids maximum (kg)</label>
                    <input type="number" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="1000">
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Lieu de départ</label>
                    <input type="text" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Ville de départ">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Lieu d'arrivée</label>
                    <input type="text" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Ville d'arrivée">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Distance (km)</label>
                <input type="number" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="2500">
            </div>
            <div class="flex justify-end space-x-3 pt-4">
                <button type="button" onclick="hideCreateModal()" class="px-4 py-2 text-gray-600 hover:text-gray-800 transition-colors">
                    Annuler
                </button>
                <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">
                    Créer la cargaison
                </button>
            </div>
        </form>
    </div>
</div>

<script>
let sidebarOpen = false;

// Navigation entre les sections
function showSection(section) {
    // Masquer toutes les sections
    const sections = document.querySelectorAll('.section');
    sections.forEach(s => s.classList.add('hidden'));
    
    // Afficher la section demandée
    document.getElementById(section + 'Section').classList.remove('hidden');
    
    // Mettre à jour la navigation
    const navItems = document.querySelectorAll('.nav-item');
    navItems.forEach(item => {
        item.classList.remove('active', 'bg-blue-50', 'text-blue-600');
        item.classList.add('text-gray-700');
    });
    
    // Activer l'élément cliqué
    event.target.classList.add('active', 'bg-blue-50', 'text-blue-600');
    event.target.classList.remove('text-gray-700');
    
    // Mettre à jour le titre
    const titles = {
        'overview': 'Vue d\'ensemble',
        'cargaisons': 'Gestion des cargaisons',
        'clients': 'Gestion des clients',
        'colis': 'Gestion des colis',
        'recherche': 'Recherche avancée'
    };
    document.getElementById('pageTitle').textContent = titles[section];
}

function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    sidebarOpen = !sidebarOpen;
    
    if (sidebarOpen) {
        sidebar.classList.remove('-translate-x-full');
    } else {
        sidebar.classList.add('-translate-x-full');
    }
}

function showCreateModal() {
    document.getElementById('createModal').classList.remove('hidden');
    document.body.classList.add('overflow-hidden');
}

function hideCreateModal() {
    document.getElementById('createModal').classList.add('hidden');
    document.body.classList.remove('overflow-hidden');
}

function handleCreateCargaison(event) {
    event.preventDefault();
    
    // Simulation de création
    showNotification('Cargaison créée avec succès!', 'success');
    hideCreateModal();
}

function logout() {
    if (confirm('Êtes-vous sûr de vouloir vous déconnecter ?')) {
        showNotification('Déconnexion en cours...', 'info');
        setTimeout(() => {
            window.location.href = '/';
        }, 1500);
    }
}

function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    const bgColor = type === 'success' ? 'bg-green-500' : type === 'error' ? 'bg-red-500' : 'bg-blue-500';
    
    notification.className = `fixed top-4 right-4 ${bgColor} text-white px-6 py-3 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform duration-300`;
    notification.textContent = message;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.classList.remove('translate-x-full');
    }, 100);
    
    setTimeout(() => {
        notification.classList.add('translate-x-full');
        setTimeout(() => {
            document.body.removeChild(notification);
        }, 300);
    }, 3000);
}

// Fermer la sidebar mobile en cliquant à l'extérieur
document.addEventListener('click', function(e) {
    const sidebar = document.getElementById('sidebar');
    const toggleButton = e.target.closest('[onclick="toggleSidebar()"]');
    
    if (sidebarOpen && !sidebar.contains(e.target) && !toggleButton) {
        toggleSidebar();
    }
});
</script>