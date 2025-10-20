# Architecture et Stack Technique du POC

Ce document définit les choix techniques pour le développement du Proof of Concept (POC) de la plateforme Pifpaf. L'objectif principal est de privilégier la vitesse de développement, la simplicité et un déploiement aisé sur un hébergement mutualisé.

| Composant                     | Technologie Choisie                                          | Justification                                                                                                                              |
|-------------------------------|--------------------------------------------------------------|--------------------------------------------------------------------------------------------------------------------------------------------|
| **Framework Principal**         | **Laravel**                                                  | Un framework PHP robuste et complet qui gère le backend et le frontend, idéal pour un développement rapide.                                    |
| **Frontend Dynamique**        | **Laravel Livewire** + **Alpine.js**                         | Permet de créer des interfaces riches et réactives sans la complexité d'un framework JavaScript séparé. Parfait pour le déploiement simple. |
| **Styling**                   | **Tailwind CSS**                                             | Un framework CSS "utility-first" qui permet de construire des designs responsives ("mobile-first") rapidement et de manière cohérente.         |
| **Base de Données**             | **MySQL / MariaDB**                                          | Standard sur les hébergements mutualisés comme o2switch, parfaitement intégré avec Laravel.                                                 |
| **Environnement de Développement** | **Docker**                                                   | Garantit un environnement de développement cohérent et reproductible pour tous, isolant les dépendances du projet.                          |
| **Service d'IA**                | **Google Cloud Vision API**                                  | Un service externe puissant pour l'analyse d'images, qui sera interrogé via son SDK PHP depuis Laravel.                                        |
| **Stockage des Fichiers**       | **Stockage local**                                           | Pour le POC, les fichiers uploadés seront stockés directement sur le serveur de l'hébergement. Simple et suffisant pour démarrer.           |
| **Stratégie de Déploiement**    | **Déploiement automatisé via Git dans cPanel**                 | Permet des mises à jour simples et rapides en "pushant" le code sur le repository Git configuré.                                          |
