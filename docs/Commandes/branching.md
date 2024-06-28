# Les commmandes branching

## Vérifier l'état de votre dépôt

Avant de créer une nouvelle branche, assurez-vous que votre dépôt est à jour et que vous n'avez pas de modifications non commit :

```bash
git status
```

## Créer une nouvelle

Pour créer une nouvelle branche et y basculer directement, utilisez la commande git checkout -b :

```bash
git checkout -b nom-de-la-branche
```

Par exemple, pour créer une branche appelée feature-x :

```bash
git checkout -b feature-x
```

## Vérifier les branches actives

Pour voir la liste de toutes les branches et savoir sur laquelle vous vous trouvez actuellement, utilisez :

```bash
git branch
```

<<<<<<< HEAD
La branche actuelle sera marquée par un astérisque (*).  

ou pour lister toutes les branches (locales et distantes) :

```bash
git branch -a
```
=======
La branche actuelle sera marquée par un astérisque (*).
>>>>>>> b746780d16e5d6c8eabe690ce36aaaef153f7250

## Basculer entre les branches

Pour changer de branche, utilisez :

```bash
git checkout nom-de-la-branche
```

Par exemple, pour revenir à la branche main ou master :

```bash
git checkout main
```

## Pousser la nouvelle branche vers le dépôt distant

Si vous voulez partager votre nouvelle branche avec d'autres collaborateurs en la poussant vers le dépôt distant :

```bash
git push origin nom-de-la-branche
```

Par exemple, pour pousser feature-x :

```bash
git push origin feature-x
<<<<<<< HEAD
```

## Supprimer une branche locale

```bash
git branch -d nom-de-la-branche
```

ou pour forcer la suppression si la branche n'a pas été fusionnée :

```bash
git branch -D nom-de-la-branche
```

## Fusionner une branche dans la branche courante

```bash
git merge nom-de-la-branche
```

## Supprimer une branche distante

```bash
git push origin --delete nom-de-la-branche
```

## Renommer une branche

```bash
git branch -m ancien-nom nouveau-nom
```
=======
```
>>>>>>> b746780d16e5d6c8eabe690ce36aaaef153f7250
