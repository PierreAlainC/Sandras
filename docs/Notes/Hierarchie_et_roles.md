# Determinons la hiérarchie et les roles des différents utilisateurs

## Rôles

* Le SUPER_ADMIN :
    Simple, il peut tout faire et il a accés à tout le site. Notament à la partie Validation de contenu et Suppression!
* L'ADMIN :
    Il peut Ajouter un utilisateur.
    Il peut Ajouter et Modifier un contenu.
    \ Ne peut pas Supprimer et Valider un contenu.
* L'USER :
    Il peut Ajouter un contenu

## Hiérarchie

* Le SUPER_ADMIN détient toutes le autorisations, il hérite de tous les autres rôles.  
* L'ADMIN hérite du rôle de USER et bien sur PUBLIC.
* Le USER hérite du rôle de PUBLIC.
