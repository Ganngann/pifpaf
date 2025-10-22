#!/bin/bash

# Exit immediately if a command exits with a non-zero status.
set -e

# --- Introduction ---
echo "--- Lancement du script d'installation pour Pifpaf ---"
echo "Ce script va installer toutes les dépendances système et projet nécessaires."
echo "Certaines commandes peuvent vous demander votre mot de passe administrateur (sudo)."

# --- Installation des dépendances système ---
echo "\n--- Étape 1 : Installation des dépendances système (PHP, Composer, SQLite) ---"
sudo apt-get update
sudo apt-get install -y php8.3 php8.3-mbstring php8.3-curl php8.3-xml php8.3-dom php8.3-mysql php8.3-sqlite3 php8.3-gd composer sqlite3

# --- Installation des dépendances du projet ---
echo "\n--- Étape 2 : Installation des dépendances PHP (Composer) ---"
composer install --no-interaction --prefer-dist --optimize-autoloader

echo "\n--- Étape 3 : Installation des dépendances JavaScript (NPM) ---"
npm install

# --- Configuration de l'environnement Laravel ---
echo "\n--- Étape 4 : Configuration de l'environnement Laravel ---"
if [ ! -f .env ]; then
    echo "Création du fichier .env..."
    cp .env.example .env
    php artisan key:generate
else
    echo "Le fichier .env existe déjà. On passe."
fi

# --- Configuration de la base de données ---
echo "\n--- Étape 5 : Configuration de la base de données SQLite ---"
if [ ! -f database/database.sqlite ]; then
    echo "Création du fichier de base de données SQLite..."
    touch database/database.sqlite
else
    echo "Le fichier de base de données existe déjà."
fi

echo "Lancement des migrations de la base de données..."
php artisan migrate

# --- Compilation des assets frontend ---
echo "\n--- Étape 6 : Compilation des assets frontend (Vite) ---"
npm run build

# --- Liaison du stockage ---
echo "\n--- Étape 7 : Liaison du stockage public ---"
# On vérifie si le lien existe déjà pour éviter une erreur
if [ ! -L public/storage ]; then
    php artisan storage:link
else
    echo "Le lien de stockage existe déjà."
fi

# --- Installation des dépendances de test frontend ---
echo "\n--- Étape 8 : Installation des navigateurs pour Playwright ---"
npx playwright install --with-deps

# --- Étape 9 : Vérification de l'environnement par les tests ---
echo "\n--- Étape 9 : Vérification de l'environnement par les tests ---"
echo "Lancement des tests backend (PHPUnit)..."
php artisan test

echo "\nLancement des tests frontend (Playwright)..."
# L'option --pass-with-no-tests permet au script de ne pas échouer s'il n'y a pas encore de tests frontend.
npx playwright test --pass-with-no-tests

# --- Conclusion ---
echo "\n--- Installation et tests terminés avec succès ! ---"
echo "Vous pouvez maintenant lancer le serveur de développement avec : php artisan serve"
echo "Pour lancer les tests backend (PHPUnit), utilisez : php artisan test"
echo "Pour lancer les tests frontend (Playwright), utilisez : npx playwright test"
