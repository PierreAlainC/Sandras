# Différentes façon de mettre en place une durée de vie limite de la session

## En PHP

En PHP, il s'agit du paramètre ```session.gc_maxlifetime``` dans le fichier de configuration ```php.ini```.  
Ce paramètre détermine la durée de vie en secondes des données de session avant qu'elles ne soient considérées comme expirées et supprimées.  
Par exemple :

```bash
session.gc_maxlifetime = 1440
```

## En Symfony

En Symfony, la gestion des sessions repose sur PHP, donc par défaut, c'est aussi ```session.gc_maxlifetime``` qui est utilisé.  
Cependant, tu peux aussi gérer le délai de session directement dans la configuration de Symfony via le fichier ```config/packages/framework.yaml```.  
Par exemple :

```bash
framework:
    session:
        cookie_lifetime: 3600  # Durée de vie des cookies de session en secondes
        gc_maxlifetime: 3600   # Durée de vie des données de session en secondes

```

## Durée de vie des sessions (remember me)

Si tu utilises la fonctionnalité ```remember me``` pour les connexions persistantes, tu peux spécifier une durée de vie pour le cookie via le paramètre lifetime.

```bash
security:
    firewalls:
        main:
            remember_me:
                secret: '%kernel.secret%'
                lifetime: 604800  # Temps en secondes (ici, 7 jours)
                path: /
```

Cela définit la durée de vie du cookie ```remember me```. Si l'utilisateur est inactif après cette période, il sera déconnecté.  

## Durée de validité des tokens JWT

Si tu utilises ```JWT``` (JSON Web Tokens) pour l'authentification, tu peux définir une durée de vie des tokens dans ```security.yaml``` ou via la configuration de ton bundle JWT (comme ```lexik/jwt-authentication-bundle```).

Voici un exemple dans un fichier de configuration pour JWT :

```bash
lexik_jwt_authentication:
    token_ttl: 3600  # Le token expire après 3600 secondes (1 heure)
```

Le paramètre ```token_ttl``` détermine combien de temps un jeton JWT reste valide avant qu'un nouvel authentifiant ne soit nécessaire.  

## Inactivity Timeout (Expiration sur inactivité)

En plus de définir des durées pour le cookie ou les tokens, tu peux également contrôler l'expiration de la session en cas d'inactivité. Cela peut être fait via des événements ou des logiques spécifiques dans ton application pour forcer une déconnexion après une période d'inactivité. Il n'y a pas de paramètre direct pour cela dans ```security.yaml```, mais cela peut être implémenté en combinant un écouteur d'événements ou un middleware personnalisé.  

## CONCLUSION

Le paramètre ``TTL`` des tokens est effectivement utile dans certains contextes comme ```JWT``` ou les cookies "remember me", mais il ne remplace pas entièrement la gestion des sessions PHP standards via ```gc_maxlifetim```e. Donc, cela dépend de la manière dont tu gères les authentifications (sessions PHP classiques vs JWT vs remember me).

## Plus d'info

[Doc Symfony](https://symfony.com/doc/5.x/session.html#configuring-the-session-ttl)  
