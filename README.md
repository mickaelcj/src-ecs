# Ecoservice

- `vagrant up`
- Si tout s'est bien passé : `vagrant ssh`<br>

### Sur votre VM le projet miroir se trouve à `/data/ecs/www`
### Sur votre navigateur : 
- [ecoservice.dev](http://ecoservice.dev) &rarr; Besoin d'un certificat : [doc ici](1Installation.md#)
- [localhost:81](http://localhost:81)

## Base de donnée

- mysql_host: `remotemysql.com`
- mysql_user: `EmwnLitSLR`
- mysql_pw: `Gk0qCm6hFI`
- mysql_db: `eEmwnLitSLR`

### [**lien vers Phpmyadmin**](https://remotemysql.com/phpmyadmin/index.php) 

## Config pour synchroniser ses fichiers avec la VM
Automatique sur phpStorm

Sur VSCode il faut installer l'extension `SFTP` de lixmomo 
> Normalement devrait s'appliquées automatiquement sinon c'est chaud

## ***ATTENTION*** (tout le monde): 

Les commandes de `composer` et `yarn` ,
doivent être éxecutées ***SEULEMENT DANS LA VM***. En voici quelques unes :

- `yarn install` 
- `yarn add <nomModule>` 
- `composer install`
- `composer require <organisation>/<nomModule>`
- `yarn dev`
- `yarn watch`

> !! **On n'utilise pas `npm`** sinon on risque de créer des bugs et conflits avec `yarn`

#### `+` Lorsque que l'on ajoute un nouveau module pour correctement mettre à jour le projet sur git, il faut bien récupérer en local :
- le `package.json` de la VM pour les module js (yarn)
- le `composer.json` pour les modules php composer

Pour télécharger un fichier et ses mises à jours sur la remote (vm) un simple clic droit (`deployment > download` sur php-storm)

## **Stack Front-end** : 
Absolument Lire [**cette page**](https://github.com/ryanmcdermott/clean-code-javascript#introduction)
## **Stack Back-end** : 

Documentation poussée sur les fonctionnalités de php : [**ici**](https://phptherightway.com/)