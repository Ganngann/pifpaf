# MVP 7 : Administration et Modération (Back-Office)

Objectif : Fournir à l'équipe administrative les outils de base pour gérer les utilisateurs et les annonces, assurant ainsi la sécurité et la qualité de la plateforme.

---

### Épopée : Outils de Modération

---

#### User Story 1 : Accéder au tableau de bord d'administration

*   **En tant que** administrateur,
*   **Je veux** accéder à une interface de back-office sécurisée,
*   **Afin de** pouvoir effectuer des tâches de gestion sans que les utilisateurs normaux y aient accès.

**Critères d'Acceptation :**
1.  Une nouvelle route (par exemple, `/admin`) est créée pour le back-office.
2.  L'accès à cette route est protégé et réservé aux utilisateurs ayant le rôle "Administrateur".
3.  Les utilisateurs non-administrateurs tentant d'accéder à `/admin` sont redirigés vers la page d'accueil ou une page d'erreur 403 (Interdit).
4.  Le tableau de bord affiche des statistiques clés : nombre total d'utilisateurs, nombre d'annonces actives, et les dernières inscriptions.

---

#### User Story 2 : Gérer les utilisateurs

*   **En tant que** administrateur,
*   **Je veux** pouvoir rechercher, voir les détails et suspendre des comptes utilisateurs,
*   **Afin de** modérer la communauté et de retirer les membres qui ne respectent pas les règles.

**Critères d'Acceptation :**
1.  Une section "Gestion des Utilisateurs" dans le back-office liste tous les utilisateurs enregistrés.
2.  L'administrateur peut rechercher un utilisateur par son nom ou son adresse email.
3.  En cliquant sur un utilisateur, l'administrateur peut voir son profil complet (y compris les informations privées comme l'email).
4.  L'administrateur dispose d'un bouton pour "Suspendre" ou "Réactiver" un compte utilisateur.
5.  Un utilisateur suspendu ne peut plus se connecter à la plateforme.

---

#### User Story 3 : Gérer les annonces

*   **En tant que** administrateur,
*   **Je veux** pouvoir rechercher, visualiser et supprimer des annonces,
*   **Afin de** retirer le contenu inapproprié, illégal ou non conforme.

**Critères d'Acceptation :**
1.  Une section "Gestion des Annonces" dans le back-office liste toutes les annonces.
2.  L'administrateur peut filtrer les annonces par statut (actives, vendues, signalées).
3.  L'administrateur peut visualiser le contenu complet d'une annonce.
4.  L'administrateur dispose d'un bouton pour "Supprimer" une annonce. La suppression est définitive.

---

#### User Story 4 : Gérer les signalements

*   **En tant que** administrateur,
*   **Je veux** voir une liste de toutes les annonces et tous les utilisateurs qui ont été signalés par la communauté,
*   **Afin de** pouvoir traiter en priorité les problèmes potentiels.

**Critères d'Acceptation :**
1.  Le tableau de bord de l'administrateur met en évidence le nombre de signalements en attente.
2.  Une page dédiée liste tous les signalements, en précisant qui a signalé, quoi a été signalé (annonce ou utilisateur), et pour quelle raison.
3.  Depuis cette page, l'administrateur peut accéder directement à la page de gestion de l'utilisateur ou de l'annonce concernée pour prendre une action.
4.  L'administrateur peut marquer un signalement comme "traité" pour le retirer de la file d'attente.
