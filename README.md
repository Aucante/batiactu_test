
# BATI ACTU TEST TECHNIQUE




## Installation 

Clone project - Cloner le projet

```bash
  git clone git@github.com:Aucante/batiactu_test.git (SSH)
```

OR

```bash
  git clone https://github.com/Aucante/batiactu_test.git (HTTPS)
```
    
Install dependencies

```bash
  composer Install
```

```bash
  yarn install
```

## Run application - Lancer l'application

Run server - Lancer le serveur

```bash
  symfony server:start
```

Stop server - Fermer le serveur

```bash
  symfony server:stop
```

## Tests

Run unit and functionnal tests - Lancer tests unitaires et fonctionnels

```bash
  php bin/phpunit
```

## PHPStan

Run phpstan - Lancer phpstan

```bash
  vendor\bin\phpstan analyse src
```

## Further informations - informations complémentaires

Form validation constraints - Contraintes de validation du formulaire

Nom : 2 à 25 caractères  
Prénom : 2 à 25 caractères  
téléphone : 8 à 12 caractères  
Email : Format email attendu  
Message : 8 à 1200 caractères  

Il vous est demandé de réaliser une page de contact simple sans envoi de mail en PHP.
La page devra comprendre au minimum :
- Un champ NOM
- Un champ PRENOM
- Un champ NUMERO DE TELEPHONE
- Un champ MAIL
- Un champ MESSAGE
- Un CAPTCHA
- Un bouton VALIDER ou ENVOYER
Aux cliques sur le bouton il faudra vérifier les champs saisies (type, vide, format,) et ouvrir une pop in
listant les erreurs éventuelles. Si le formulaire ne comporte pas d’erreur il faudra rediriger vers une
seconde page qui afficheras les données saisies.
Vous êtes libre d’utiliser un CMS.
Si vous avez la capaciter d’héberger votre travaille merci de nous communiquer le lien d’accès ainsi
que l’ensemble des fichiers modifier.
Sinon, merci de nous transmettre une archive avec le projet ou un lien github pour cloner le projet.
