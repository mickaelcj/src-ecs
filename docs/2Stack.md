[&larr; retour à **l'installation**](1Installation.md) &nbsp;&nbsp; | &nbsp;&nbsp; [**GitFlow** &rarr;](3GitFlow.md)

# Notre Environnement de dev

[Rappel sur la maj des source](1Installation.md#sources)

### Attention: 

Les commandes de `composer` et `yarn` ,
doivent être éxecutées ***SEULEMENT DANS LA VM***.

> !! **On n'utilise pas `npm`** sinon on risque de créer des bugs et conflits avec `yarn`

#### `+` Verifiez bien la synchronisation des fichiers avec votre VM :
#### Les fichiers à vérifier:
- le `package.json` de la VM pour les module js (yarn)
- le `composer.json` pour les modules php composer
- les fichiers `composer.lock` et `yarn.lock

![sources](res/upload_sources.png)

Après un changement de branche il faut upload vos sources : <br> 
Un simple clic droit sur `www/` donnera des options de synchro (`deployment > download` sur php-storm)

## Base de donnée

### On a deux bases de données :

Cette base de donnée est hébergée à distance afin que l'on puisse se partager les datas avec des dump
> utilisée par défaut
- mysql_host: `remotemysql.com`
- mysql_user: `EmwnLitSLR`
- mysql_pw: `Gk0qCm6hFI`
- mysql_db: `eEmwnLitSLR`

Base *locale* pour travailler seul 
> non utilisée par défaut
- host : localhost ou 127.0.0.1
- port : 3366 sur votre machine (3306 sur la VM)
- user : ecs_user
- pw: ecommerce
- db: ecommerce

#### Pas de phpmyadmin, utilisez plutôt l'outil `base de donnée` phpstorm


Pour partager et récupérer les données il existe des scripts simples dans le `Makefile`
> Par exemple pour récupérer la base distante on fait *dans la VM* `make db_update_local`

## L'application globale

#### Trois espaces :
  - **Core** (à ne pas trop toucher)
  - **FrontOffice** (FrontOffice) 
  - **Admin** BackOffice &rarr; Bundle easy admin qui simplifie la génération des CREATE, READ, UPDATE, DELETE

## **Stack Front-end** : 

La team front travaille dans les répertoire `assets` et `templates`.

### Assets:
- `yarn dev` : Build tout le projet
- `yarn fo` : Build le front-office
- `yarn admin` : Build de l'admin

Voici l'organisation du projet par espaces:

- css / js
```
  |-- front_office/ (ou admin/)
    |-- partials/ --> bout de code réutilisés plusieurs fois
        | dissociation du code js/css
        |-- scss --> votre code css
            |-- partials --> bout de code réutilisables
            |-- app.scss --> fichier qui importe chaque lots de ressources scss
        |-- ts
            |-- classes/ --> classe objet correspondant a un espace
            |-- helpers/ --> fonctions mises à disposition
            |-- components/ --> code faisant marcher des composants réutilisables
        |-- product.js # chaque page a son entrée (on importe ici nos ressource ts et app.scss
        |-- categories.js
            ...
  |-- admin (easyadmin)
  ... cherchez dans la doc
```

- TWIG
Pour changer l'interface du back-office: [doc easyadmin](https://symfony.com/doc/master/bundles/EasyAdminBundle/book/list-search-show-configuration.html#list-search-show-advanced-design-configuration)

```
  |-- front_office/ (ou admin/)
      |-- partials/ --> bout de code réutilisés plusieurs fois
      |-- . liste des pages
          .
          .
  |-- bundles
      |-- EasyAdminBundle
          |-- default
             > Permet de personnaliser l'interface d'administration (override)
```

Pour ajouter une entrée (page) à l'index des assets `css` et `ts` ça se passe dans
`config/pages.json`. Vérifier bien que les noms soient bien les mêmes.

Pour la convention de code javascript, suivre [**cette page**](https://github.com/ryanmcdermott/clean-code-javascript#introduction)

##### Typer les variables/paramètres de fonction au maximum

### Les routes

Pour retrouver les routes que vous cherchez : `sf debug:router`

## **Stack Back-end** : 

##### Typer les variables/paramètres de fonction au maximum

Dans le dossier `src`:
  - **Core** (à ne pas trop toucher)
  - **FrontOffice** (FrontOffice) 
  - **Admin** (BackOffice), Configuration easyadmin : `config/packages/easyadmin.yaml`

Suivez les règles automatiques de `phpcbf` et `phpcs` (pas encore installé mais ça vient)

---
### <center>[Retour au sommaire &#8617;](docs/0Sommaire.md)</center>