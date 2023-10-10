#!/bin/bash

# Vérification de la présence de PHP
if ! command -v php &> /dev/null; then
    echo "PHP n'est pas installé. Veuillez installer PHP avant de continuer."
    exit 1
fi

# Vérification de la présence de Node.js
if ! command -v node &> /dev/null; then
    echo "Node.js n'est pas installé. Veuillez installer Node.js avant de continuer."
    exit 1
fi

# Initialiser le projet
composer install

# Vérification de l'initialisation du projet
if [ $? -eq 0 ]; then
    echo "Projet initialisé avec succès."
else
    echo "Erreur lors de l'initialisation du projet."
    exit 1
fi


# Crée la base de données
php artisan db:create

# Vérification de la création de la base de données
if [ $? -eq 0 ]; then
    echo "Base de données créée avec succès."
else
    echo "Erreur lors de la création de la base de données. Veuillez vérifier les paramètres de connexion."
    exit 1
fi

# Exécute les migrations
php artisan migrate

# Vérification de l'exécution des migrations
if [ $? -eq 0 ]; then
    echo "Migrations exécutées avec succès."
else
    echo "Erreur lors de l'exécution des migrations."
    exit 1
fi

# Remplit la base de données avec des données de base
php artisan db:seed --class=UsersTableSeeder
php artisan db:seed --class=InstagramApiLinkTableSeeder

# Vérification de l'exécution des seeders
if [ $? -eq 0 ]; then
    echo "Données de base ajoutées avec succès."
else
    echo "Erreur lors de l'ajout des données de base."
    exit 1
fi

# Synchronise les publications Instagram
php artisan app:sync-instagram-posts

# Vérification de la synchronisation Instagram
if [ $? -eq 0 ]; then
    echo "Synchronisation des publications Instagram réussie."
else
    echo "Erreur lors de la synchronisation des publications Instagram."
    exit 1
fi

# Compilation des ressources frontend (si vous utilisez des ressources JavaScript et CSS)
npm install
npm run dev

# Vérification de la compilation des ressources
if [ $? -eq 0 ]; then
    echo "Ressources frontend compilées avec succès."
else
    echo "Erreur lors de la compilation des ressources frontend."
    exit 1
fi

# Lancement du serveur Laravel à part
# php artisan serve
