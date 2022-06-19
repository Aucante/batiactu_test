
# BATI ACTU TEST TECHNIQUE




## Installation 

Clone project - Cloner le projet

```bash
  git clone git@github.com:Aucante/batiactu_test.git (SSH)

  OR

  git clone https://github.com/Aucante/batiactu_test.git (HTTPS)
```
    
Install dependencies

```bash
  composer Install
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

## Further informations - informations complémentaires

Form validation constraints - Contraintes de validation du formulaire

Nom : 2 à 25 caractères  
Prénom : 2 à 25 caractères  
téléphone : 8 à 12 caractères  
Email : Format email attendu  
Message : 8 à 1200 caractères  
