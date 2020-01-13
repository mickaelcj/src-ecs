[&larr; retour à **l'installation**](1Installation.md) &nbsp;&nbsp; | &nbsp;&nbsp; [**GitFlow** &rarr;](3GitFlow.md)

# Notre Environnement de dev

## Mise à jour des sources
> Ne concerne pas ceux qui ont le NFS activé

Notre machine virtuelle est automatiquement mise à jour dans un seul sens soit 
```
Hôte (votre machine) ----> VM
```
Nous devons manuellement récupérer des dossier comme `vendor/` ou `node_modules/`
> #### Pour cela clic droit sur `www/` et `deployment` > `download`

## ***ATTENTION*** (tout le monde): 

Les commandes de `composer` et `yarn` ,
doivent être éxecutées ***SEULEMENT DANS LA VM***.

> !! **On n'utilise pas `npm`** sinon on risque de créer des bugs et conflits avec `yarn`

#### `+` Verifier bien la synchronisation des fichiers lors d'un changement de branche ou lorsque que vous avez ajouter un nouveau module :
#### Les fichiers à vérifier:
- le `package.json` de la VM pour les module js (yarn)
- le `composer.json` pour les modules php composer

Après un changement de branche il faut upload vos sources : <br> 
Un simple clic droit donnera des options de synchro (`deployment > download` sur php-storm)

## Base de donnée

### On a deux bases de données :

Base *locale* pour travailler seul (ajouter régulèrement des données svp)
- host : localhost
- user : ecs_user
- pw: ecommerce
- db: ecommerce

#### Pas de phpmyadmin, utilisez plutôt l'outil `base de donnée` phpstorm

Cette base de donnée est hébergée à distance afin que l'on puisse se partager les datas

- mysql_host: `remotemysql.com`
- mysql_user: `EmwnLitSLR`
- mysql_pw: `Gk0qCm6hFI`
- mysql_db: `eEmwnLitSLR`

## L'application globale

#### Trois espaces :
  - **Core** (à ne pas trop toucher)
  - **FrontOffice** (FrontOffice) 
  - **Admin** (BackOffice)

## **Stack Front-end** : 

La team front travaille dans les répertoire `assets` et `templates`.
Voici des conseils d'organisation du projet par espaces:

- css / js
```
  |-- front_office/ (ou admin/)
    |-- partials/ --> bout de code réutilisés plusieurs fois
    |-- pages/ --> dissociation par page du code
        |-- fo_produit --> exemple pour la page produit en front-office (fo)
            |-- scss --> votre code css
                |-- partials
                |-- app.scss --> fichier important chaque lots de ressources scss
            |-- ts
                |-- classe.js --> classe objet faisant une action
                |-- index.js --> Instanciation des classes comme des fonctions
            |-- app.js
```

- twig

```
  |-- front_office/ (ou admin/)
      |-- partials/ --> bout de code réutilisés plusieurs fois
```

### Les routes
Pour retrouver les routes que vous chercher : `sf debug:router`

Pour la convention de code javascript, suivre [**cette page**](https://github.com/ryanmcdermott/clean-code-javascript#introduction)

## **Stack Back-end** : 

Dans le dossier `src`:
  - **Core** (à ne pas trop toucher)
  - **FrontOffice** (FrontOffice) 
  - **Admin** (BackOffice)

Suivez les règles automatiques de `phpcbf` et `phpcs` (pas encore installé mais ça vient)

---
### <center>[Retour au sommaire &#8617;](docs/0Sommaire.md)</center>