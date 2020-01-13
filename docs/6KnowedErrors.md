[&larr; retour aux **tips**](5Tips.md) &nbsp;&nbsp; | &nbsp;&nbsp; [**Sommaire** &rarr;](0Sommaire.md)

# Erreurs connues

### *Liste d'erreurs possibles avant de demander de l'aide:* 

## Installation

Erreurs lors de l'installation

#### Le **nfs** ne marche pas sur mac os catalina : [solution à suivre](https://stackoverflow.com/a/58547588 )

&rarr; Puis réinstaller vagrant en suivant cette doc : [rebuild vagrant](https://www.vagrantup.com/docs/installation/source.html)

#### Erreur lorsque on reprovisionne la vm avec le NFS activé: <br>

**Exécuter** : 
```
rm .vagrant/machines/default/action_provision && vagrant reload --provision
```
---
### <center>[Retour au sommaire &#8617;](docs/0Sommaire.md)</center>