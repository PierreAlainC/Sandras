function goBack() {
    window.history.back();
};

// A reprendre pour l'affichage et la réduction grâce au clique sur une flêche qui permet de lire le contenu de ma présentation!!!!!!!!!!!!!!!!!!
/* document.addEventListener("DOMContentLoaded", function() {
    var toggleArrow = document.querySelector('.toggle-arrow');
    var content = document.querySelector('.content');

    toggleArrow.addEventListener('click', function() {
        content.style.display = content.style.display === 'none' || content.style.display === '' ? 'block' : 'none';
        toggleArrow.classList.toggle('down');
        toggleArrow.classList.toggle('up');
    });
}); */


// A reprendre pour l'affichage toujours centré de mon entête de mes présentations!!!!!!!!!!!!!!!!
/* function positionElement() {
    var presentation = document.querySelector('.presentation');
    var windowHeight = window.innerHeight;
    var elementHeight = presentation.offsetHeight;
    var topPosition = (windowHeight * 0.33) - (elementHeight / 2);

    presentation.style.top = topPosition + 'px';
}

window.addEventListener('resize', positionElement);
window.addEventListener('load', positionElement); */