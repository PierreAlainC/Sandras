document.addEventListener('DOMContentLoaded', function() {
    // Sélectionner tous les éléments avec la classe "toggle-icon"
    const toggles = document.querySelectorAll('.toggle-icon');

    toggles.forEach(function(toggle) {
        toggle.addEventListener('click', function() {
            // Récupérer l'id du contenu à partir du data-target
            const contentId = this.getAttribute('data-target');
            const content = document.querySelector(contentId);

            // Toggle la visibilité du contenu
            if (content.classList.contains('show')) {
                content.classList.remove('show');
                this.innerHTML = 'Afficher résumé &#9660;';
            } else {
                content.classList.add('show');
                this.innerHTML = 'Masquer résumé &#9650;';
            }

            // Toggle la classe "collapsed" pour la rotation de l'icône
            this.classList.toggle('collapsed');
        });
    });
});
