[&larr; retour à **l'installation**](1Installation.md) &nbsp;&nbsp; | &nbsp;&nbsp; [**GitFlow** &rarr;](3GitFlow.md)

# Bonnes pratiques
## Sftp
> Ne concerne pas ceux qui ont le NFS activé
Pour assurer la mise à jour sur la VM des fichiers ils vous faudra l'extension `sftp` de lixmomo

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

Après un changement de branche il faut upload vos sources : <br> 
Un simple clic droit donnera des options de synchro (`deployment > download` sur php-storm)

## **Stack Front-end** : 
Pour la convention de code javascript, suivre [**cette page**](https://github.com/ryanmcdermott/clean-code-javascript#introduction)

## **Stack Back-end** : 

Documentation poussée sur les fonctionnalités de php : [**ici**](https://phptherightway.com/)

---
### <center>[Retour au sommaire &#8617;](docs/0Sommaire.md)</center>