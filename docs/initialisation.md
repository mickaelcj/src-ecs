# 1. initialisation du projet

### Le nom de domaine
Il est intéressant de dissocier les url de projet et donc pour cela on peut utiliser le domaine personnalisé :
[**ecoservice.dev**](https://ecoservice.dev) <br>
Pour utiliser ce domaine on peut ajouter manuellement [**ce certificat**](full_certificat.pfx) dans notre navigateur.<br><br>

**Tuto** : (FF ou Chrome) > `paramètres` > rechercher `ssl` > Gérér les certificats > Importer le fichier `.pfx`

> Si erreur 
---
Sinon on peut toujours se contenter de [localhost:81](http://localhost:81)

### Le terminal
Le shell est un bash classique qui est toutefois un peu tuner et qui devrait vous rendre la vie beaucoup plus facile. Voici des alias de commande pour aller plus vite.

`h` &rarr; pour chercher dans son historique de commandes<br>
`la` &rarr; Afficher les fichiers cachés
`folders` &rarr; Voir la taille des fichiers
`f` &rarr; Pour chercher un fichier

### projet :
`www` &rarr; pour directement aller au projet<br>
`sf` équivaut à `php bin/console`<br>
`sfcache` pour clear le cache Symfony : <br>
`dschema` = `sf doctrine:schema:update`

### Composer :
`cr` &rarr; `composer require`<br>
`crd` &rarr; `composer require-dev` <br>
`ci` &rarr; `composer install` <br>

### Node :
`yw` &rarr; `yarn watch` <br>
`yd` &rarr; `yarn dev`<br>
`yi` &rarr; `yarn add` <br>