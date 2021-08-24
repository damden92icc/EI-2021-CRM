Epreuve intégrée - Damien DENIS - Année 2020-21

Pré-requis: 
- Un serveur base de données de type SQL
- Un serveur web possédant apache Version >= 7.2.0,

Installation : 

Télécharger le projet, rendez-vous via un terminal de commande a la racine de projet et tapez les commandes suivantes:

composer install
npm install
cp .env.example .env (copie le fichier d'exemple pour la configuration )
php artisan key:generate ( Génère une nouvelle clé de sécurité qui sera placer dans ce nouveau fichier .env )

php artisan migrate lancer les migrations
php artisan db:seed Remplissez-la base de données
php artisan serve pour lancer l'application
