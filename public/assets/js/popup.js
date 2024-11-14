document.addEventListener("DOMContentLoaded", function () {
    // Fonction pour ouvrir la pop-up
    function openModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.style.display = "block";
        }
    }

    // Fonction pour fermer la pop-up
    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.style.display = "none";
        }
    }

    // Ajouter les écouteurs d'événements pour chaque bouton "Afficher résumé"
    document.querySelectorAll(".toggle-icon").forEach((button, index) => {
        button.addEventListener("click", function () {
            openModal(`modal${index + 1}`);
        });
    });

    // Ajouter les écouteurs d'événements pour chaque bouton de fermeture de pop-up
    document.querySelectorAll(".close-button").forEach((button, index) => {
        button.addEventListener("click", function () {
            closeModal(`modal${index + 1}`);
        });
    });

    // Fermer la pop-up lorsqu'on clique en dehors de la boîte
    window.addEventListener("click", function (event) {
        document.querySelectorAll(".modal").forEach((modal) => {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        });
    });
});
