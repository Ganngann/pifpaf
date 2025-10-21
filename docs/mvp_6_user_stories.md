# MVP 6 : Profils Utilisateurs et Évaluations

Objectif : Améliorer la confiance et la transparence en permettant aux utilisateurs de consulter les profils et de laisser des évaluations après une transaction.

---

### Épopée : Confiance et Réputation

---

#### User Story 1 : Consulter le profil public d'un utilisateur

*   **En tant que** acheteur ou vendeur,
*   **Je veux** pouvoir cliquer sur le nom d'un utilisateur pour voir son profil public,
*   **Afin de** me faire une idée de son sérieux et de son historique sur la plateforme.

**Critères d'Acceptation :**
1.  Les noms d'utilisateurs sur les pages d'annonces et dans la messagerie sont des liens cliquables.
2.  Le profil public affiche des informations de base : pseudo, date d'inscription, et la moyenne de ses évaluations.
3.  Le profil liste également toutes les annonces actuellement actives de cet utilisateur.

---

#### User Story 2 : Laisser une évaluation après un achat

*   **En tant que** acheteur ou vendeur,
*   **Je veux** pouvoir laisser une évaluation (note sur 5 et un commentaire) à mon interlocuteur après qu'une transaction soit finalisée,
*   **Afin de** partager mon expérience avec le reste de la communauté.

**Critères d'Acceptation :**
1.  Après qu'une annonce est marquée comme "Vendu", un lien "Laisser une évaluation" apparaît pour l'acheteur et le vendeur dans leur historique de transactions ou sur la page de la conversation.
2.  L'évaluation consiste en une note (de 1 à 5 étoiles) et un champ de commentaire textuel.
3.  Un utilisateur ne peut laisser qu'une seule évaluation par transaction.
4.  L'évaluation n'est visible publiquement qu'une fois que les deux parties ont laissé la leur, ou après une période de 14 jours, pour encourager des retours honnêtes.

---

#### User Story 3 : Voir les évaluations sur le profil d'un utilisateur

*   **En tant que** utilisateur,
*   **Je veux** voir toutes les évaluations laissées par d'autres membres sur le profil public d'un utilisateur,
*   **Afin de** juger de sa fiabilité avant d'interagir avec lui.

**Critères d'Acceptation :**
1.  Le profil public d'un utilisateur affiche sa note moyenne bien en évidence.
2.  Une section "Évaluations" sur le profil liste tous les commentaires et notes reçus.
3.  Chaque évaluation montre le commentaire, la note, le pseudo de l'évaluateur et la date.
