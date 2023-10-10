# Projet de Test Laravel - BBS-instaposts

Ce projet a été créé à la demande de BBS dans le but de tester mes compétences en développement avec le framework
Laravel, en tirant parti de mes connaissances générales en PHP. Il sert de terrain d'expérimentation pour la mise en
œuvre de diverses fonctionnalités, démontrant ainsi mon savoir-faire en développement web avec Laravel.

## Commandes pour lancer le projet

- Avant de commencer, assurez-vous d'utiliser PHP version 8.2.
- Modifier le .env pour correspondre avec votre serveur
- Puis, pour lancer le projet, exécutez le script personnalisé `./run_project.sh`.
- Démarrez le serveur PHP en utilisant la commande : `php artisan serve`.

    - L'utilisateur test est : 'john@example.com'.
    - Le mot de passe est :'password'.

## Étapes de création du projet

### 0. Récupération du lien API Instagram depuis META

- J'ai sollicité l'API Graph pour Instagram afin d'obtenir les informations nécessaires à la récupération des données de
  mon compte Instagram. J'ai généré un jeton de longue durée pour mener le test à bien.
- Le compte Instagram de test est un compte personnel sans grande importance.

### 1. Initialisation du projet & création de la base de données

- J'ai initialisé le projet Laravel avec PHP 8.2.
- J'ai créé une commande personnalisée pour la création de la base de données : `app/console/commande/DbCreate.php`.
- J'ai utilisé la commande Artisan pour créer la base de données : `php artisan db:create`.

### 2. Installation de Breeze pour l'authentification

- J'ai installé le package Breeze, un outil pratique pour gérer l'authentification dans
  Laravel : `composer require laravel/breeze --dev`.

### 3. Mise en place d'un utilisateur de test

- J'ai utilisé la commande Artisan pour exécuter le seeder précédemment créé et insérer un utilisateur de
  test : `php artisan db:seed --class=UsersTableSeeder`.

### 4. Traduction des textes en français et en anglais

- J'ai configuré les fichiers de traduction pour prendre en charge les langues française et anglaise.

### 5. Création de la table et du modèle pour le lien Instagram

- J'ai créé une table et un modèle pour stocker le lien vers le compte Instagram que je souhaite suivre.

### 6. Création du contrôleur pour la gestion du/des lien(s) Instagram

- J'ai développé un contrôleur avec les opérations CRUD (Create, Read, Update, Delete) pour gérer les liens Instagram.
- J'ai défini les routes correspondantes dans un fichier de routes personnalisé.

### 7. Création de la table et du modèle pour les publications Instagram

- J'ai créé une table et un modèle pour stocker les publications Instagram.

### 8. Création du fichier de synchronisation des publications depuis l'API Instagram

- J'ai créé un fichier de commande personnalisée pour synchroniser les publications Instagram à partir de
  l'API : `app/console/commande/SyncInstagramPosts.php`.
- J'ai utilisé la commande Artisan pour automatiser cette tâche : `php artisan app:sync-instagram-posts`. Il faudra
  définir une tâche cron sur le serveur pour exécuter la commande Laravel `schedule:run`.

### 9. Ajout d'un lien de test

- J'ai utilisé la commande Artisan pour exécuter le seeder précédemment créé et insérer un lien de
  test : `php artisan db:seed --class=InstagramApiLinkTableSeeder`.

Ce projet m'a permis de consolider mes compétences de base en développement Laravel et de mettre en pratique divers
aspects de ce framework. J'ai également utilisé ce projet comme terrain d'apprentissage pour de nouvelles
fonctionnalités de Laravel et pour explorer de nouvelles possibilités de développement web.
