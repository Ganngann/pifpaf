# MVP 4 : Messagerie et Négociation

Objectif : Permettre aux acheteurs et aux vendeurs de communiquer de manière sécurisée et de négocier les prix directement sur la plateforme.

---

### Épopée : Communication Acheteur-Vendeur

---

#### User Story 1 : Contacter un vendeur depuis une annonce

*   **En tant que** acheteur intéressé,
*   **Je veux** pouvoir envoyer un message au vendeur directement depuis la page de l'annonce,
*   **Afin de** poser des questions sur l'article ou d'entamer une négociation.

**Critères d'Acceptation :**
1.  Un bouton "Contacter le vendeur" est visible sur chaque page d'annonce (pour les utilisateurs connectés).
2.  Cliquer sur ce bouton ouvre une interface de messagerie (modale ou nouvelle page).
3.  Le premier message de l'acheteur est pré-rempli avec une référence à l'annonce.
4.  Le vendeur reçoit une notification (sur le site et/ou par email) lorsqu'il reçoit un nouveau message.

---

#### User Story 2 : Consulter et répondre à mes messages

*   **En tant que** utilisateur (acheteur ou vendeur),
*   **Je veux** avoir une boîte de réception où je peux voir toutes mes conversations,
*   **Afin de** gérer facilement mes échanges avec les autres utilisateurs.

**Critères d'Acceptation :**
1.  Une section "Messagerie" ou "Boîte de réception" est accessible depuis le tableau de bord de l'utilisateur.
2.  Cette page liste toutes les conversations, groupées par utilisateur et par annonce.
3.  Un indicateur visuel montre les messages non lus.
4.  L'utilisateur peut cliquer sur une conversation pour voir l'historique complet des messages et y répondre.

---

#### User Story 3 : Faire une offre de prix

*   **En tant que** acheteur,
*   **Je veux** pouvoir faire une offre de prix formelle au vendeur via la messagerie,
*   **Afin de** négocier le prix de l'article de manière claire et transparente.

**Critères d'Acceptation :**
1.  Dans l'interface de messagerie, un bouton "Faire une offre" est disponible.
2.  L'acheteur peut soumettre un prix, qui est envoyé au vendeur sous forme de message structuré.
3.  Le vendeur peut "Accepter", "Refuser" ou "Contre-proposer" l'offre.
4.  L'état de l'offre (acceptée, refusée, en attente) est clairement visible pour les deux parties dans la conversation.
5.  Une fois l'offre acceptée, un bouton "Acheter maintenant" apparaît, permettant à l'acheteur de finaliser la transaction au prix convenu.
