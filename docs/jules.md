# Guide de Configuration de l'Environnement de Développement

Ce document décrit les étapes nécessaires pour installer, configurer et lancer l'application Pifpaf en environnement de développement local.

## 1. Prérequis

Assurez-vous d'avoir les logiciels suivants installés sur votre machine :

*   **PHP 8.3**
*   **Composer** (gestionnaire de dépendances PHP)
*   **Node.js & npm** (pour la compilation des assets frontend)
*   **Git** (pour le versionnement du code)
*   **SQLite** (pour la base de données locale)

## 2. Installation

1.  **Cloner le dépôt :**
    ```bash
    git clone <URL_DU_DEPOT>
    cd pifpaf
    ```

2.  **Installer les dépendances PHP :**
    ```bash
    composer install
    ```

3.  **Installer les dépendances Node.js :**
    ```bash
    npm install
    ```

## 3. Configuration

1.  **Créer le fichier d'environnement :**
    Laravel utilise un fichier `.env` pour gérer les variables d'environnement. Copiez le fichier d'exemple :
    ```bash
    cp .env.example .env
    ```

2.  **Générer la clé d'application :**
    C'est une étape de sécurité cruciale pour Laravel.
    ```bash
    php artisan key:generate
    ```

3.  **Configurer la base de données :**
    Le projet est configuré par défaut pour utiliser SQLite. Assurez-vous que la ligne suivante est bien présente dans votre fichier `.env` :
    ```
    DB_CONNECTION=sqlite
    ```
    Créez ensuite le fichier de base de données vide :
    ```bash
    touch database/database.sqlite
    ```

4.  **Exécuter les migrations :**
    Pour créer la structure de la base de données (tables, colonnes, etc.).
    ```bash
    php artisan migrate
    ```

5.  **Créer le lien symbolique pour le stockage :**
    Pour que les fichiers publics (comme les images des annonces) soient accessibles depuis le web.
    ```bash
    php artisan storage:link
    ```

## 4. Configuration de l'IA (Google Cloud Vision)

La fonctionnalité de suggestion automatique repose sur l'API Google Cloud Vision.

1.  **Créer un compte de service :**
    *   Allez sur la console Google Cloud.
    *   Créez un nouveau projet ou sélectionnez-en un existant.
    *   Activez l'API "Cloud Vision API".
    *   Allez dans "IAM et administration" > "Comptes de service".
    *   Créez un compte de service et donnez-lui le rôle "Lecteur des objets Storage" (ou un rôle plus restrictif si nécessaire).
    *   Créez une clé JSON pour ce compte de service et téléchargez-la.

2.  **Configurer la variable d'environnement :**
    *   Placez le fichier JSON de la clé de service dans un endroit sûr de votre projet (par exemple, à la racine, et **ajoutez-le à votre `.gitignore`**).
    *   Ajoutez la ligne suivante à votre fichier `.env` :
    ```
    GOOGLE_APPLICATION_CREDENTIALS=/chemin/absolu/vers/votre/fichier-cle.json
    ```

## 5. Lancer l'environnement

1.  **Compiler les assets frontend :**
    Cette commande compile les fichiers CSS et JavaScript.
    ```bash
    npm run dev
    ```

2.  **Démarrer le serveur de développement Laravel :**
    Dans un autre terminal, lancez le serveur PHP intégré.
    ```bash
    php artisan serve
    ```

Votre application Pifpaf est maintenant accessible à l'adresse `http://127.0.0.1:8000`.
