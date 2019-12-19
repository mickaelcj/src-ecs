# 1. initialisation du projet

### Le nom de domaine
Il est intéressant de dissocier les url de projet et donc pour cela on peut utiliser le domaine personnalisé :
[**ecoservice.dev**](https://ecoservice.dev) <br>
Pour utiliser ce domaine on peut ajouter manuellement [**ce certificat**](full_certificat.pfx) dans notre navigateur.<br><br>

**Tuto** : (FF ou Chrome) > `paramètres` > rechercher `ssl` > Gérér les certificats > Importer le fichier `.pfx`

> Si erreur `scp -P 22 vagrant@ecoservice.dev:/etc/ssl/ecoservice.dev/pkcs12.pfx docs/cert/` (mdp: vagrant)
---
Sinon on peut toujours se contenter de [localhost:81](http://localhost:81)
