# projetwebbingo

# Installation du projet

## Dépendances :

- **Php** (version 9)
- **Composer**
- **Symfony** (version 6.3.*)
- **NodeJS **(dernière version)

## Récupérer le projet :
LLe projet est sur GitHub, dans un repository public, à l'adresse suivante : https://github.com/MarielleD035/projetwebbingo/tree/valentin

## Mise en place :

Exécuter, dans le dossier du projet :
`composer install`

Puis 
`npm install`

**Pour créer la base de données**, modifier dans le fichier .env le chemin d'accès à la base de données, ensuite, exécuter, en ligne de commande dans le dossier du projet :
`symfony console make:migration`

Et 
`symfony console doctrine:migration:migrate`

## Lancer le projet :

- **Lancer les services PhP** (Xampp; Wamp....)
- **Lancer** symfony 
Exécuter `symfony serve`dans le dossier du projet
- **Exécuter** `npm run watch` dans le dossier du projet
