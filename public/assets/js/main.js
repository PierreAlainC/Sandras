/* Retour en arrière en fonction du cache du navigateur */
function goBack() {
    window.history.back();
};

/* Affichage du lien licorne et de sa partie cachée uniquement si la touche ctrl est appuyer */
document.addEventListener("DOMContentLoaded", function() {
    const hiddenDiv = document.getElementById("hiddenDiv");
    const hoverTarget = document.querySelector(".hover-target");

    hoverTarget.addEventListener("mouseover", function(event) {
        // Vérifiez si la touche Ctrl est enfoncée
        if (event.ctrlKey) {
            hiddenDiv.style.visibility = "visible"; // Rendre la div visible
        }
    });

    hoverTarget.addEventListener("mouseout", function() {
        hiddenDiv.style.visibility = "hidden"; // Rendre la div invisible
    });

    document.addEventListener("keydown", function(event) {
        if (event.ctrlKey) {
            hiddenDiv.style.visibility = "visible"; // Rendre la div visible si Ctrl est enfoncé
        }
    });

    document.addEventListener("keyup", function(event) {
        if (!event.ctrlKey) {
            hiddenDiv.style.visibility = "hidden"; // Rendre la div invisible si Ctrl est relâché
        }
    });
});