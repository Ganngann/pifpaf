# Guide de Déploiement sur o2switch

Ce document détaille la procédure pour déployer l'application Laravel Pifpaf sur un hébergement mutualisé o2switch.

## Contexte

*   **Hébergement :** Mutualisé, accès via cPanel.
*   **Base de données :** MySQL / MariaDB.
*   **Méthode de déploiement :** Git.

## 1. Prérequis sur o2switch

1.  **Configurer la version de PHP :**
    *   Connectez-vous à votre cPanel.
    *   Allez dans "Sélectionner une version de PHP".
    *   Choisissez la version **8.3** ou une version compatible.
    *   Assurez-vous que les extensions suivantes sont activées : `mbstring`, `curl`, `xml`, `dom`, `mysqlnd`, `pdo_mysql`.

2.  **Créer la base de données :**
    *   Dans cPanel, allez dans "Assistant de Base de Données MySQL®".
    *   Suivez les étapes pour créer une nouvelle base de données (ex: `pifpaf_prod`).
    *   Créez un nouvel utilisateur et assignez-lui un mot de passe fort.
    *   Donnez **tous les privilèges** à cet utilisateur sur la base de données que vous venez de créer.
    *   Notez bien le nom de la base de données, le nom d'utilisateur et le mot de passe.

3.  **Configurer Git :**
    *   Dans cPanel, allez dans "Git™ Version Control".
    *   Cliquez sur "Créer" pour configurer un nouveau dépôt.
    *   Renseignez l'URL de votre dépôt Git (ex: `https://github.com/votre-nom/pifpaf.git`).
    *   Le chemin du dépôt sur le serveur sera généralement `/home/votre_user_cpanel/pifpaf`.
    *   Laissez la branche sur `main` (ou la branche que vous souhaitez déployer).

## 2. Préparation du Déploiement

1.  **Configurer le fichier `.env` pour la production :**
    *   **Ne commitez jamais votre fichier `.env` !**
    *   Dans le terminal de votre cPanel, naviguez jusqu'au dossier du projet : `cd ~/pifpaf`.
    *   Copiez le fichier d'exemple : `cp .env.example .env.prod`.
    *   Éditez le fichier `.env.prod` :
        ```
        APP_NAME=Pifpaf
        APP_ENV=production
        APP_DEBUG=false
        APP_URL=https://votre-domaine.com

        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=le_nom_de_votre_db
        DB_USERNAME=votre_utilisateur_db
        DB_PASSWORD=votre_mot_de_passe_db
        ```
    *   Une fois le déploiement effectué, vous renommerez ce fichier en `.env`.

## 3. Processus de Déploiement

1.  **Pousser le code sur Git :**
    Assurez-vous que la dernière version de votre code est bien poussée sur la branche `main` (ou votre branche de déploiement).

2.  **Déployer via cPanel :**
    *   Retournez dans "Git™ Version Control" dans votre cPanel.
    *   Cliquez sur "Gérer" à côté de votre dépôt.
    *   Allez dans l'onglet "Pull or Deploy".
    *   Cliquez sur "Deploy HEAD Commit" pour tirer la dernière version du code.

3.  **Exécuter les commandes post-déploiement :**
    *   Ouvrez le terminal de cPanel.
    *   Naviguez vers le dossier du projet : `cd ~/pifpaf`.
    *   **Renommez le fichier d'environnement :** `mv .env.prod .env`
    *   **Installer les dépendances Composer (sans les dev) :**
        ```bash
        composer install --optimize-autoloader --no-dev
        ```
    *   **Générer la clé d'application (si ce n'est pas déjà fait dans le `.env`) :**
        ```bash
        php artisan key:generate
        ```
    *   **Lancer les migrations :**
        ```bash
        php artisan migrate --force
        ```
        *(L'option `--force` est nécessaire car l'environnement est en production.)*
    *   **Mettre en cache la configuration :**
        ```bash
        php artisan config:cache
        php artisan route:cache
        php artisan view:cache
        ```
    *   **Créer le lien de stockage :**
        ```bash
        php artisan storage:link
        ```

## 4. Configurer le Domaine

1.  **Pointer le domaine vers le dossier `public` :**
    *   Dans cPanel, allez dans "Domaines".
    *   Cliquez sur votre nom de domaine principal.
    *   Modifiez la racine du document pour qu'elle pointe vers le dossier `public` de votre installation Laravel. Le chemin doit être : `/home/votre_user_cpanel/pifpaf/public`.
    *   Enregistrez les modifications.

Votre site devrait maintenant être en ligne et fonctionnel !

## Mises à jour ultérieures

Pour les mises à jour suivantes :
1.  Poussez vos modifications sur Git.
2.  Déployez via cPanel ("Deploy HEAD Commit").
3.  Connectez-vous au terminal et relancez les commandes nécessaires (généralement `composer install --no-dev`, `php artisan migrate --force`, et la mise en cache).
