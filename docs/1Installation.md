# 1. initialisation du projet

### Le nom de domaine
Il est intéressant de dissocier les url de projet et donc pour cela on peut utiliser le domaine personnalisé :
[**ecoservice.dev**](https://ecoservice.dev) <br>
Pour utiliser ce domaine on peut ajouter manuellement [**ce certificat**](full_certificat.pfx) dans notre navigateur.<br><br>

**Tuto** : (FF ou Chrome) > `paramètres` > rechercher `ssl` > Gérér les certificats > Importer le fichier `.pfx`

> Si erreur `scp -P 22 vagrant@ecoservice.dev:/etc/ssl/ecoservice.dev/pkcs12.pfx docs/cert/` (mdp: vagrant)
---
Sinon on peut toujours se contenter de [localhost:81](http://localhost:81)

## Installation et lancement de la vm

- Ajouter sa clé ssh sur **Github**: [doc ici](https://help.github.com/en/github/authenticating-to-github/generating-a-new-ssh-key-and-adding-it-to-the-ssh-agent#generating-a-new-ssh-key)
- Lancer la VM avec `vagrant up`

> Un script assez long va se charger d'installer tous les outils et de configurer l'environment du projet<br>
> Pour en savoir plus : [Doc Ansible](https://docs.ansible.com/)

# NFS (mac / linux)
`git config core.preloadindex true`