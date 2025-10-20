# Méthodologie de Travail du Projet Pifpaf

Ce document décrit la méthode de collaboration et de développement adoptée pour le projet Pifpaf. Il sert de référence pour s'assurer que le projet avance de manière structurée, efficace et alignée avec la vision du produit.

## 1. Principes Généraux

Notre approche est **itérative et incrémentale**. Nous ne cherchons pas à tout spécifier et tout construire en une seule fois. À la place, nous construisons le produit brique par brique, sous forme de **Produits Minimum Viables (MVP)**. Chaque MVP est un sous-ensemble de fonctionnalités cohérent, utilisable et qui apporte de la valeur.

Cette approche permet une flexibilité maximale, des retours fréquents et une validation continue du produit en cours de construction.

## 2. Cycle de Développement d'une Fonctionnalité

Chaque fonctionnalité ou groupe de fonctionnalités suit un cycle de vie précis :

1.  **Phase de Planification :** En début de cycle (pour un nouveau MVP), le Développeur (Jules) analyse la documentation fonctionnelle et propose un périmètre logique pour le prochain MVP.

2.  **Phase de Spécification :**
    *   Le Développeur rédige les **"User Stories"** (Histoires Utilisateur) pour chaque fonctionnalité du périmètre. Le format est : "En tant que `[type d'utilisateur]`, je veux `[faire une action]` afin de `[bénéficier de quelque chose]`".
    *   Pour chaque User Story, le Développeur liste des **"Critères d'Acceptation"** concrets et testables. Cette liste constitue la définition de "terminé" pour la fonctionnalité.

3.  **Phase de Validation (par le Product Owner) :**
    *   Le Product Owner (vous) relit les User Stories et les Critères d'Acceptation.
    *   Il peut les **valider** en l'état, demander des **modifications**, ou les **refuser**.
    *   **Aucun développement ne commence avant la validation explicite** de ces spécifications par le Product Owner.

4.  **Phase de Construction (par le Développeur) :**
    *   Le Développeur implémente la fonctionnalité en suivant scrupuleusement les Critères d'Acceptation validés.
    *   L'objectif est de s'assurer que chaque critère est respecté.

5.  **Phase de Démonstration et Feedback :**
    *   Une fois une fonctionnalité ou un MVP terminé, le Développeur présente le résultat au Product Owner (par exemple, via des screenshots, des descriptions ou un environnement de test).
    *   Le Product Owner vérifie que le résultat est conforme à la demande et donne son feedback final.

## 3. Rôles et Responsabilités

Une définition claire des rôles est essentielle à notre efficacité.

### Le Product Owner (Vous)

*   **Décideur Final :** Vous avez le dernier mot sur toutes les décisions concernant le produit.
*   **Gardien de la Vision :** Vous définissez la direction globale du projet et ses objectifs.
*   **Priorisateur :** Vous décidez de l'ordre dans lequel les fonctionnalités seront développées.
*   **Fournisseur de Contenu :** Vous êtes responsable de fournir tous les contenus non techniques : textes, images, logo, charte graphique, et contenu légal (CGU, etc.).
*   **Validateur :** Votre rôle le plus actif est de valider les spécifications et le travail terminé.

### Le Développeur (Jules)

*   **Force de Proposition Technique :** Je propose des solutions techniques, des architectures et des spécifications (User Stories).
*   **Constructeur :** Je développe l'application en suivant les directives validées.
*   **Responsable de la Qualité Technique :** Je m'assure que le code est propre, fonctionnel et que les tests sont pertinents.
*   **Gardien de l'Environnement :** Je suis responsable de la mise en place et de la maintenance de l'environnement de développement (Docker).
