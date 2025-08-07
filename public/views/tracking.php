<?php
// public/views/tracking.php
$title = "Suivi de Colis - GPduMonde";
$bodyClass = "bg-gradient-to-br from-slate-900 via-blue-900 to-slate-800 min-h-screen";
?>

<div class="min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-2xl">
        <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-8 border border-white/20">
            <!-- Header -->
            <div class="text-center mb-8">
                <a href="/" class="absolute top-8 left-8 text-white hover:text-blue-400 transition-colors">
                    <i class="fas fa-arrow-left text-xl"></i>
                </a>
                <i class="fas fa-search text-4xl text-blue-400 mb-4"></i>
                <h1 class="text-3xl font-bold text-white mb-2">Suivi de Colis</h1>
                <p class="text-gray-300">Entrez votre code de suivi pour voir l'état de votre colis</p>
            </div>

            <!-- Formulaire de recherche -->
            <form id="trackingForm" class="space-y-6" onsubmit="handleTracking(event)">
                <div>
                    <label class="block text-white font-semibold mb-3">Code de suivi</label>
                    <div class="relative">
                        <input 
                            type="text" 
                            id="trackingCode"
                            name="tracking_code"
                            placeholder="Ex: CGN123456789"
                            class="w-full px-4 py-4 bg-white/5 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:border-blue-400 focus:ring-2 focus:ring-blue-400/20 focus:outline-none transition-all"
                            required
                        >
                        <i class="fas fa-search absolute right-4 top-4 text-gray-400"></i>
                    </div>
                </div>

                <button 
                    type="submit"
                    id="searchButton"
                    class="w-full bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600 text-white font-semibold py-4 px-6 rounded-xl transition-all duration-300 hover:scale-105 flex items-center justify-center space-x-2"
                >
                    <i class="fas fa-search"></i>
                    <span>Rechercher</span>
                </button>
            </form>

            <!-- Résultat de recherche -->
            <div id="trackingResult" class="hidden mt-8 p-6 bg-white/5 rounded-xl border border-white/10">
                <!-- Le contenu sera généré dynamiquement -->
            </div>
        </div>
    </div>
</div>

<script>
function handleTracking(event) {
    event.preventDefault();
    
    const trackingCode = document.getElementById('trackingCode').value.trim();
    const resultDiv = document.getElementById('trackingResult');
    const button = document.getElementById('searchButton');
    
    if (!trackingCode) {
        showNotification('Veuillez entrer un code de suivi', 'error');
        return;
    }

    // Animation du bouton
    button.innerHTML = '<i class="fas fa-spinner fa-spin"></i><span>Recherche...</span>';
    button.disabled = true;

    // Animation de chargement
    resultDiv.innerHTML = `
        <div class="flex items-center justify-center py-8">
            <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-400"></div>
            <span class="ml-3 text-white">Recherche en cours...</span>
        </div>
    `;
    resultDiv.classList.remove('hidden');

    // Simulation de la recherche
    setTimeout(() => {
        const mockData = generateMockTrackingData(trackingCode);
        displayTrackingResult(mockData, resultDiv);
        
        // Remettre le bouton normal
        button.innerHTML = '<i class="fas fa-search"></i><span>Rechercher</span>';
        button.disabled = false;
    }, 2000);
}

function generateMockTrackingData(code) {
    const statuses = ['EN_ATTENTE', 'EN_COURS', 'ARRIVE', 'RECUPERE', 'PERDU'];
    const types = ['Maritime', 'Aérien', 'Routier'];
    
    // Simulation d'un colis non trouvé
    if (code.length < 5) {
        return null;
    }

    return {
        code: code,
        status: statuses[Math.floor(Math.random() * statuses.length)],
        type: types[Math.floor(Math.random() * types.length)],
        origine: 'Dakar',
        destination: 'Paris',
        dateEnvoi: '2024-08-01',
        dateArrivePrevue: '2024-08-15',
        poids: '12.5 kg',
        expediteur: 'Jean Dupont',
        destinataire: 'Marie Martin'
    };
}

function displayTrackingResult(data, container) {
    if (!data) {
        container.innerHTML = `
            <div class="text-center py-8">
                <i class="fas fa-exclamation-triangle text-4xl text-yellow-400 mb-4"></i>
                <h3 class="text-xl font-semibold text-white mb-2">Colis non trouvé</h3>
                <p class="text-gray-300">Le code de suivi que vous avez entré n'existe pas ou le colis a été annulé.</p>
            </div>
        `;
        return;
    }

    const statusInfo = getStatusInfo(data.status);
    
    container.innerHTML = `
        <div class="space-y-6">
            <div class="text-center">
                <div class="w-16 h-16 ${statusInfo.bgColor} rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas ${statusInfo.icon} text-2xl ${statusInfo.textColor}"></i>
                </div>
                <h3 class="text-xl font-semibold text-white mb-2">${statusInfo.label}</h3>
                <p class="text-gray-300">${statusInfo.description}</p>
            </div>
            
            <div class="grid grid-cols-2 gap-4 text-sm">
                <div>
                    <p class="text-gray-400">Code de suivi</p>
                    <p class="text-white font-semibold">${data.code}</p>
                </div>
                <div>
                    <p class="text-gray-400">Type de transport</p>
                    <p class="text-white font-semibold">${data.type}</p>
                </div>
                <div>
                    <p class="text-gray-400">Origine</p>
                    <p class="text-white font-semibold">${data.origine}</p>
                </div>
                <div>
                    <p class="text-gray-400">Destination</p>
                    <p class="text-white font-semibold">${data.destination}</p>
                </div>
                <div>
                    <p class="text-gray-400">Poids</p>
                    <p class="text-white font-semibold">${data.poids}</p>
                </div>
                <div>
                    <p class="text-gray-400">Date d'envoi</p>
                    <p class="text-white font-semibold">${formatDate(data.dateEnvoi)}</p>
                </div>
            </div>
            
            <div class="border-t border-white/20 pt-4">
                <h4 class="text-white font-semibold mb-3">Informations expéditeur/destinataire</h4>
                <div class="grid grid-cols-2 gap-4 text-sm">
                    <div>
                        <p class="text-gray-400">Expéditeur</p>
                        <p class="text-white">${data.expediteur}</p>
                    </div>
                    <div>
                        <p class="text-gray-400">Destinataire</p>
                        <p class="text-white">${data.destinataire}</p>
                    </div>
                </div>
            </div>
        </div>
    `;
}

function getStatusInfo(status) {
    const statusMap = {
        'EN_ATTENTE': {
            label: 'En attente',
            description: 'Votre colis est en attente de traitement',
            icon: 'fa-clock',
            bgColor: 'bg-yellow-500/20',
            textColor: 'text-yellow-400'
        },
        'EN_COURS': {
            label: 'En transit',
            description: 'Votre colis est en cours de transport',
            icon: 'fa-truck',
            bgColor: 'bg-blue-500/20',
            textColor: 'text-blue-400'
        },
        'ARRIVE': {
            label: 'Arrivé',
            description: 'Votre colis est arrivé à destination',
            icon: 'fa-check-circle',
            bgColor: 'bg-green-500/20',
            textColor: 'text-green-400'
        },
        'RECUPERE': {
            label: 'Récupéré',
            description: 'Votre colis a été récupéré par le destinataire',
            icon: 'fa-check-double',
            bgColor: 'bg-green-500/20',
            textColor: 'text-green-400'
        },
        'PERDU': {
            label: 'Problème',
            description: 'Un problème est survenu avec votre colis',
            icon: 'fa-exclamation-triangle',
            bgColor: 'bg-red-500/20',
            textColor: 'text-red-400'
        }
    };
    
    return statusMap[status] || statusMap['EN_ATTENTE'];
}

// Fonction de formatage de date (fallback si pas dans app.js)
if (typeof formatDate === 'undefined') {
    window.formatDate = function(dateString) {
        const options = { 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric' 
        };
        return new Date(dateString).toLocaleDateString('fr-FR', options);
    };
}
</script>