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

La branche actuelle sera marquée par un astérisque (*).

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
```