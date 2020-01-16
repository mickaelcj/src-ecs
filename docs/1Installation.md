[&larr; retour au **Sommaire**](0Sommaire.md) &nbsp;&nbsp;| &nbsp;&nbsp;[**Stacks et bonnes pratiques** &rarr;](2Stack.md)

# 1. initialisation du projet

### Requis
- vagrant 2.2.3+
- VirtualBox 6.0.8
- git bash ou [celui là](5Tips#ConseildeShell)

## Installation et lancement de la vm
1. Ajouter sa clé ssh sur **Github**: [doc ici](https://help.github.com/en/github/authenticating-to-github/generating-a-new-ssh-key-and-adding-it-to-the-ssh-agent#generating-a-new-ssh-key)

2. Avant tout on fork le projet sur son espace github

#### Cliquez sur fork :
![fork](res/fork.png)

#### Après le fork : `git clone git@github.com:<votre-pseudo-github>/src-ecs.git && cd src-ecs/`
![after_fork](res/after_fork.png)

3. Ajouter le projet original à vos remotes (*sélectionnez le lien ssh*)

```
git remote add g4-dev git@github.com:g4-dev/src-ecs.git
```

- Lancer la VM avec `vagrant up` Soyez patient
- `vagrant ssh` et dans la *vm* `www`
- Après `vagrant ssh` | Consulter la liste des commandes shells utiles : [Ici](5Tips)
- [ecoservice.coom](http://ecoservice.coom)


#### [**lien vers Phpmyadmin**](https://remotemysql.com/phpmyadmin/index.php) 

## Sources
> Pour mettre à jours les sources local sur la VM <br>
> *(Ne concerne pas ceux qui ont le NFS activé)*

Notre machine virtuelle est automatiquement mise à jour dans un seul sens soit 
```
Hôte (votre machine) ----> VM
```
Nous devons donc manuellement récupérer:
- Des dossier comme `vendor/` ou `node_modules/`
- Les fichiers comme `composer.json` et `package.json` pour bien mettre à jour les nouveaux modules que l'on ajoute

> #### Pour cela clic droit sur `www/` ou le fichier voulu et `deployment` > `download`

## NFS
> Si notre NFS s'active soit sur `linux` et `macos` on désactive bien les option de `deployment` > `sftp` de PHPStorm

Le NFS est un système de partage de fichier haute performance compatible avec Linux et Mac<br>

#### Sur mac
- Donner l'accès complès au disque pour le terminal dans `sécurité & confidentialité`
Petite amélioration de performance avec : `git config core.preloadindex true`

#### Sur linux (debian/ubuntu)
`apt install nfs-kernel-server nfs-common`

## SSL
On prévoit par la suite mettre en place un certificat autosigné

- Le **certificat** : 
> `scp -P 22 root@ecoservice.dev:/etc/ssl/ecoservice.dev/pkcs12.pfx docs/cert/` (mdp: vagrant)

## ça ne marche toujours pas

Consultez la liste des erreurs connues [Erreurs Installation](6KnowedErrors.md#installation)

---
### <center>[Retour au sommaire &#8617;](docs/0Sommaire.md)</center>