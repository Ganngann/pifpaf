# MVP 4 : Négociation et Communication

Objectif : Permettre aux acheteurs et aux vendeurs de communiquer et de négocier le prix d'un article avant de procéder au paiement.

---

### Épopée : Interaction entre Utilisateurs

---

#### User Story 1 : Contacter le vendeur pour poser une question

*   **En tant que** acheteur potentiel,
*   **Je veux** pouvoir envoyer un message au vendeur depuis la page d'une annonce,
*   **Afin de** poser des questions sur l'article avant de faire une offre.

**Critères d'Acceptation :**
1.  Un bouton "Contacter le vendeur" est visible sur chaque page d'annonce (pour les utilisateurs connectés).
2.  Cliquer sur ce bouton ouvre une interface de messagerie (ou une conversation existante avec ce vendeur).
3.  L'acheteur peut envoyer un message texte au vendeur.
4.  Le vendeur reçoit une notification (dans son espace personnel ou par email) lorsqu'il reçoit un nouveau message.

---

#### User Story 2 : Faire une offre de prix pour un article

*   **En tant que** acheteur,
*   **Je veux** pouvoir soumettre une offre de prix formelle au vendeur,
*   **Afin de** proposer un prix différent de celui affiché.

**Critères d'Acceptation :**
1.  Sur la page de l'annonce, un bouton "Faire une offre" est disponible.
2.  L'acheteur peut saisir le montant de son offre.
3.  L'offre est envoyée au vendeur et apparaît dans leur conversation ou leur tableau de bord des offres.
4.  L'acheteur ne peut pas faire une nouvelle offre sur le même article tant que la précédente n'a pas été traitée (acceptée, refusée, ou contre-proposée).

---

#### User Story 3 : Gérer les offres reçues

*   **En tant que** vendeur,
*   **Je veux** voir les offres que j'ai reçues pour mes articles,
*   **Afin de** pouvoir les accepter ou les refuser.

**Critères d'Acceptation :**
1.  Le vendeur a un tableau de bord où il peut voir toutes les offres reçues.
2.  Pour chaque offre, le vendeur voit le nom de l'acheteur, le montant de l'offre et l'article concerné.
3.  Le vendeur a des boutons pour "Accepter" ou "Refuser" l'offre.
4.  L'acheteur est notifié de la décision du vendeur.
5.  Si l'offre est acceptée, cela déclenche la possibilité pour l'acheteur de passer au paiement (lien vers MVP 5).
