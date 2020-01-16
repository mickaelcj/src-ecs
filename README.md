# Ecoservice

## [Lire la documentation !](docs/0Sommaire.md)

### Sur votre VM le projet miroir se trouve à `/data/ecs/www`
### Sur votre navigateur : 
- [ecoservice.coom](http://ecoservice.coom)
- [localhost:8080](http://localhost:8080)
- Le serveur api : [api.ecoservice.coom](http://api.ecoservice.coom)

## Config pour synchroniser ses fichiers avec la VM
- Automatique sur phpStorm

- Sur VSCode il faut installer l'extension `SFTP` de lixmomo 

## Le flux de travail

- Je créer une branche à partir de celle demandée par mon ticket ou je demande
- Je code une feature `front` / `back` / `fullstack`
- Je download `composer.json` et `package.json`, les `.lock` aussi
- Je met à jour ma branche : [Mettre a jour sa branche](docs/3GitFlow.md#majbranche)
- Je créer une PR [Faire une PR](docs/3GitFlow.md#environments)
- Je me fait review par les autres membres de l'équipe

## Règles d'or
- Le code est la meilleure documentation.

- Vos variables/constantes doivent être nommées en sorte que quelqu'un ne connaissant rien en informatique puisse comprendre votre code`

## Conventions

- suivre l'architecture :
```
- Core (code utilisé dans tout les espaces comme les mails/ connexion...)
- FrontOffice : Interface utilisateur et récupération des donnée avec API
- Admin : Pages d'administration et de gestion des contenus
```