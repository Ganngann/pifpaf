# MVP 10 : Fonctionnalités Sociales et Notifications

Objectif : Augmenter l'engagement et la rétention des utilisateurs en créant une dimension sociale et en fournissant des notifications pertinentes en temps réel.

---

### Épopée : Communauté et Engagement

---

#### User Story 1 : Suivre ses vendeurs préférés

*   **En tant que** acheteur,
*   **Je veux** pouvoir m'abonner au profil d'un vendeur que j'apprécie,
*   **Afin d'**être notifié de ses nouvelles mises en vente et de retrouver facilement sa boutique.

**Critères d'Acceptation :**
1.  Un bouton "Suivre" est présent sur la page de profil public de chaque vendeur.
2.  Lorsqu'un utilisateur clique sur "Suivre", le vendeur est ajouté à sa liste de "Vendeurs suivis".
3.  Le bouton se transforme en "Ne plus suivre".
4.  L'utilisateur dispose d'une section dans son tableau de bord listant tous les vendeurs qu'il suit, avec un lien vers leurs profils.

---

#### User Story 2 : Créer un fil d'actualité personnalisé

*   **En tant que** utilisateur,
*   **Je veux** avoir une page "Nouveautés" qui affiche les derniers articles des vendeurs que je suis,
*   **Afin de** créer une expérience de shopping personnalisée et de ne rien manquer.

**Critères d'Acceptation :**
1.  Une nouvelle page ou une section sur le tableau de bord est dédiée au fil d'actualité.
2.  Cette page agrège, par ordre chronologique, toutes les nouvelles annonces des vendeurs suivis par l'utilisateur.
3.  Si l'utilisateur ne suit personne, la page affiche un message l'invitant à découvrir et suivre des vendeurs.

---

#### User Story 3 : Mettre en place un centre de notifications

*   **En tant que** utilisateur,
*   **Je veux** recevoir des notifications directement sur le site pour les événements importants,
*   **Afin d'**être informé en temps réel de l'activité liée à mon compte.

**Critères d'Acceptation :**
1.  Une icône de notification (par exemple, une cloche) est visible dans l'en-tête du site pour les utilisateurs connectés.
2.  L'icône affiche un compteur pour les notifications non lues.
3.  Cliquer sur l'icône ouvre un menu déroulant avec les notifications récentes.
4.  Les notifications sont générées pour :
    *   Nouveau message reçu
    *   Nouvelle offre reçue
    *   Offre acceptée ou refusée
    *   Article vendu
    *   Article payé
    *   Article envoyé
    *   Nouvelle évaluation reçue
    *   Nouvel article d'un vendeur suivi
5.  Cliquer sur une notification marque celle-ci comme lue et redirige l'utilisateur vers la page concernée (la conversation, l'annonce, la commande, etc.).
