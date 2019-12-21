# Bonnes pratiques

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
