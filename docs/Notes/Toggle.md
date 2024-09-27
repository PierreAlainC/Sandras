# Comment faire un affichage de contenu façon collapse

## Utilisation de Bootstrap Collapse (JS + HTML + Bootstrap)

Bootstrap propose une fonctionnalité intégrée pour le "toggle" avec l’élément collapse. C'est une méthode rapide et efficace si tu utilises déjà Bootstrap dans ton projet.

HTML + Bootstrap + CSS

```bash
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toggle avec Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .toggle-icon {
            cursor: pointer;
            transition: transform 0.2s;
        }
        .collapsed .toggle-icon {
            transform: rotate(90deg);
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="d-flex justify-content-between align-items-center">
            Article Titre
            <span class="toggle-icon">&#9660;</span>
        </h2>
        <div id="articleContent" class="collapse">
            <p>Ceci est le contenu de l'article que vous pouvez cacher ou afficher.</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelector('.toggle-icon').addEventListener('click', function () {
            const content = document.getElementById('articleContent');
            const icon = this;

            content.classList.toggle('show');
            icon.classList.toggle('collapsed');
        });
    </script>
</body>
</html>
```

Explication :

* La classe ```collapse``` de Bootstrap permet de masquer ou d'afficher le contenu.
* La flèche (```toggle-icon```) est animée avec une rotation lorsque le contenu est affiché ou masqué.
* Le script JavaScript ajoute un événement "click" sur la flèche pour afficher ou cacher le contenu.  

## Utilisation de JavaScript pur (JS + HTML + CSS)

Si tu ne veux pas utiliser Bootstrap ou que tu préfères une solution personnalisée, voici une méthode purement en JavaScript.

HTML + JS + CSS

```bash
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toggle avec JS</title>
    <style>
        .toggle-icon {
            cursor: pointer;
            transition: transform 0.2s;
            display: inline-block;
        }
        .collapsed .toggle-icon {
            transform: rotate(90deg);
        }
        #articleContent {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="d-flex justify-content-between align-items-center">
            Article Titre
            <span class="toggle-icon">&#9660;</span>
        </h2>
        <div id="articleContent">
            <p>Ceci est le contenu de l'article que vous pouvez cacher ou afficher.</p>
        </div>
    </div>

    <script>
        document.querySelector('.toggle-icon').addEventListener('click', function () {
            const content = document.getElementById('articleContent');
            const icon = this;

            if (content.style.display === 'none') {
                content.style.display = 'block';
            } else {
                content.style.display = 'none';
            }

            icon.classList.toggle('collapsed');
        });
    </script>
</body>
</html>
```

Explication :

* Ici, on utilise JavaScript pur pour gérer l’affichage et le masquage du contenu.
* ```content.style.display``` est utilisé pour basculer entre l'affichage (```block```) et le masquage (```none```) du contenu.
L'icône de flèche change de direction grâce à la classe ```collapsed``` qui applique une rotation.