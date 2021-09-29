# Epreuve intégrée - Damien DENIS - Année 2020-21

## Pré-requis: 
- Un serveur base de données de type SQL
- Un serveur web possédant apache
- PHP Version >= 7.2.0,
- Gestionnaire de dépendance PHP : hhttps://getcomposer.org/download/
- Gestionnaire de dépendance NPM : https://docs.npmjs.com/downloading-and-installing-node-js-and-npm
- Télécharger le projet présent ci-dessus

## Installation du projet : 

### Initialisation

1.Télécharger le projet, rendez-vous via un terminal de commande a la racine de projet
2. Lancer les lignes de commandes suivantes:
- composer install
- npm install

### Configuration de l'environnement
Toujours via un terminal à la racine du projet lancez les commandes suivantes afin de copier le fichier d'exemple du fichier de configuration:
-cp .env.example .env 
- Editer le fichier .env 


Field | Value
------------ | -------------
APP_NAME| CRM-APP
DB_HOST | l'adresse de votre serveur
DB_PORT | le port utilisé par MySQL
DB_DATABASE | le nom de votre BD
DB_USERNAME | le nom d'utilisateur de votre BD
DB_PASSWORD | le pass lié à l'utilisateurs SQL


### Initialisation du projet 
3oujours a la racine du projet lancer les commandes suivantes:
    - php artisan key:generate ( Génère une nouvelle clé de sécurité qui sera placer dans ce nouveau fichier .env )
    - php artisan migrate 
    - php artisan db:seed
    - php artisan serve  (pour lancer l'application)
    - Rendez-vous ensuite via un navigateur à l'adresse: http://127.0.0.1:8000 
    
    


