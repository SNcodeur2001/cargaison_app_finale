// public/assets/js/app.js - JavaScript principal

// Fonctions utilitaires globales
window.AppUtils = {
    // Afficher une notification
    showNotification: function(message, type = 'info') {
        const notification = document.createElement('div');
        const bgColor = type === 'success' ? 'bg-green-500' : 
                       type === 'error' ? 'bg-red-500' : 'bg-blue-500';
        
        notification.className = `fixed top-4 right-4 ${bgColor} text-white px-6 py-3 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform duration-300`;
        notification.textContent = message;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.classList.remove('translate-x-full');
        }, 100);
        
        setTimeout(() => {
            notification.classList.add('translate-x-full');
            setTimeout(() => {
                if (document.body.contains(notification)) {
                    document.body.removeChild(notification);
                }
            }, 300);
        }, 3000);
    },

    // Formatage des dates
    formatDate: function(dateString) {
        const options = { 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric' 
        };
        return new Date(dateString).toLocaleDateString('fr-FR', options);
    },

    // Requête AJAX simplifiée
    ajax: function(url, options = {}) {
        const defaultOptions = {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
            }
        };

        const finalOptions = { ...defaultOptions, ...options };

        if (finalOptions.method === 'POST' && finalOptions.data) {
            if (finalOptions.data instanceof FormData) {
                delete finalOptions.headers['Content-Type'];
                finalOptions.body = finalOptions.data;
            } else {
                finalOptions.body = JSON.stringify(finalOptions.data);
            }
        }

        return fetch(url, finalOptions)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            });
    }
};

// Fonctions globales pour compatibilité
window.showNotification = window.AppUtils.showNotification;
window.formatDate = window.AppUtils.formatDate;

// Initialisation générale
document.addEventListener('DOMContentLoaded', function() {
    console.log('GPduMonde App initialized');
    
    // Vérifier si Tailwind CSS est chargé
    const testElement = document.createElement('div');
    testElement.className = 'hidden';
    document.body.appendChild(testElement);
    
    const isHidden = window.getComputedStyle(testElement).display === 'none';
    document.body.removeChild(testElement);
    
    if (!isHidden) {
        console.warn('Tailwind CSS might not be loaded properly, using fallback CSS');
    }
});

// Gestion globale des erreurs
window.addEventListener('error', function(e) {
    console.error('JavaScript Error:', e.error);
    // En production, vous pourriez envoyer cela à un service de logging
});

// Gestion des erreurs de chargement des ressources
window.addEventListener('unhandledrejection', function(e) {
    console.error('Unhandled Promise Rejection:', e.reason);
});