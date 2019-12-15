# Documentation ecoservice
## Installation
- Ajouter sa clé ssh sur **Github**: [ici](https://help.github.com/en/github/authenticating-to-github/generating-a-new-ssh-key-and-adding-it-to-the-ssh-agent#generating-a-new-ssh-key)
- Lancer la VM avec `vagrant up`

> Un script assez long va se charger d'installer tous les outils et de configurer l'environment du projet<br>
> Pour en savoir plus : [Doc Ansible](https://docs.ansible.com/)

- Si tout s'est bien passé : `vagrant ssh`<br>
### Sur votre VM le projet miroir se trouve à `/data/ecs/www`
### Sur votre navigateur : [localhost:81](http://localhost:81)

----
## Base de donnée

- mysql_host: `remotemysql.com`
- mysql_user: `EmwnLitSLR`
- mysql_pw: `Gk0qCm6hFI`
- mysql_db: `eEmwnLitSLR`

### [**lien vers Phpmyadmin**](https://remotemysql.com/phpmyadmin/index.php) 

----
## Config pour synchroniser ses fichiers avec la VM
Automatique sur phpStorm

Sur VSCode il faut installer l'extension `SFTP` de lixmomo 
> Normalement devrait s'appliquées automatiquement sinon c'est chaud

---
## ***ATTENTION*** (tout le monde): 
Si vous ajouter des modules (composer et npm), que vous testez un code avec `phpunit`,
executez les commandes ***SEULEMENT DANS LA VM***. En voici quelques unes :
- `yarn install` 
- `yarn add <nomModule>` 
- `composer install`
- `composer require <organisation>/<nomModule>`
- `yarn dev`
- `yarn watch`

**+** Lorsque que l'on ajoute un nouveau module il faut bien récupérer le `package.json` et `composer.json` en local pour pourvoir push des modifications sur git

Pour récupérer un fichier et ses mises à jours sur la remote (vm) un simple clic droit vous proposera l'option (`deployment` sur php-storm et )

> !! **On n'utilise pas `npm`** sinon on risque de créer des bugs et conflits avec `yarn`

## **Stack Front-end** : 
Absolument Lire [**cette page**](https://github.com/ryanmcdermott/clean-code-javascript#introduction)
## **Stack Back-end** : 


Documentation poussée sur les fonctionnalités de php : [**ici**](https://phptherightway.com/)