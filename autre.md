/* A reprendre pour l'affichage de mon entête des présentations */
.container {
    width: auto; /* Limite la largeur maximale du conteneur */
    margin: 0 auto; /* Centre le conteneur */
    position: absolute;
}
.position{
    position: relative;
    width: 100%;
}

.article-card {
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: #f0f0f0; /* Couleur de fond de l'encadré */
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s;
}

.article-card:hover {
    transform: scale(1.05); /* Effet de survol */
}

.Gauche {
    text-align: left; /* Alignement à gauche */
}

.Droite {
    text-align: right; /* Alignement à droite */
}

.created-at {
    font-size: 0.9em;
    color: rgb(50, 51, 11);
}

/* Responsive Design */
@media (max-width: 768px) {
    .article-card {
        padding: 15px;
    }

    .created-at {
        text-align: left; /* Alignement à gauche sur petits écrans */
    }
}