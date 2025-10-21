# MVP 8 : Paiement Avancé et Logistique

Objectif : Mettre en place un système de paiement sécurisé avec séquestre (porte-monnaie virtuel) et intégrer la logistique d'expédition pour professionnaliser les transactions.

---

### Épopée : Transactions Sécurisées et Expédition

---

#### User Story 1 : Intégrer un processeur de paiement externe

*   **En tant que** acheteur,
*   **Je veux** payer mes achats par carte bancaire via une interface sécurisée et reconnue (comme Stripe ou PayPal),
*   **Afin d'**avoir confiance dans la sécurité de mes informations de paiement.

**Critères d'Acceptation :**
1.  La plateforme est connectée à un fournisseur de services de paiement (PSP) externe.
2.  Sur la page de paiement, l'acheteur est redirigé vers l'interface du PSP ou utilise un widget intégré pour saisir ses informations de carte bancaire.
3.  Aucune information de carte bancaire sensible n'est stockée sur les serveurs de Pifpaf.
4.  Une fois le paiement validé par le PSP, les fonds sont transférés vers le compte séquestre de la plateforme.
5.  En cas d'échec du paiement, un message d'erreur clair est affiché à l'acheteur.

---

#### User Story 2 : Utiliser un porte-monnaie virtuel (Séquestre)

*   **En tant que** acheteur et vendeur,
*   **Je veux** que l'argent de la transaction soit conservé par la plateforme jusqu'à ce que l'article soit bien reçu,
*   **Afin d'**être protégé contre la fraude et les litiges.

**Critères d'Acceptation :**
1.  Chaque utilisateur dispose d'un "porte-monnaie virtuel" sur Pifpaf.
2.  Après le paiement d'un acheteur, le montant de la transaction (moins la commission) est crédité sur le porte-monnaie du vendeur avec un statut "en attente".
3.  L'acheteur dispose d'un bouton "Confirmer la réception" sur la page de sa commande.
4.  Lorsque l'acheteur confirme la réception, le statut des fonds dans le porte-monnaie du vendeur passe de "en attente" à "disponible".
5.  Si la réception n'est pas confirmée après un délai raisonnable (par exemple, 14 jours après l'expédition ou 7 jours pour un retrait sur place), les fonds sont automatiquement débloqués pour le vendeur (sous réserve de l'absence de litige).

---

#### User Story 3 : Retirer les fonds de son porte-monnaie

*   **En tant que** vendeur,
*   **Je veux** pouvoir virer le solde disponible de mon porte-monnaie vers mon compte bancaire personnel,
*   **Afin de** récupérer l'argent de mes ventes.

**Critères d'Acceptation :**
1.  L'utilisateur a une page "Mon Porte-Monnaie" où il peut voir son solde "disponible" et "en attente".
2.  Un bouton "Effectuer un virement" est disponible.
3.  Pour initier le premier virement, l'utilisateur doit renseigner ses informations bancaires (IBAN). Ces informations sont stockées de manière sécurisée.
4.  L'utilisateur saisit le montant qu'il souhaite virer.
5.  Une transaction de retrait est enregistrée et le virement est traité par le PSP (ou manuellement pour le POC).

---

#### User Story 4 : Proposer le retrait sur place

*   **En tant que** vendeur,
*   **Je veux** pouvoir indiquer sur mon annonce que j'accepte le retrait sur place,
*   **Afin d'**attirer les acheteurs locaux et d'éviter les frais et la complexité de l'expédition.

**Critères d'Acceptation :**
1.  Dans le formulaire de création d'annonce, une case à cocher "J'accepte le retrait sur place" est disponible.
2.  Si la case est cochée, l'annonce affiche clairement l'option "Retrait sur place disponible".
3.  L'emplacement approximatif du vendeur (ville) est affiché sur l'annonce pour aider l'acheteur à décider.

---

#### User Story 5 : Gérer la livraison (Expédition ou Retrait)

*   **En tant que** acheteur et vendeur,
*   **Je veux** gérer la finalisation de la transaction, que ce soit par expédition ou par retrait sur place,
*   **Afin de** conclure la vente de manière claire et sécurisée.

**Critères d'Acceptation pour l'Expédition :**
1.  Si l'acheteur choisit l'expédition, la page de commande pour le vendeur affiche l'adresse de livraison de l'acheteur.
2.  Un bouton "Marquer comme envoyé" est disponible pour le vendeur.
3.  Le vendeur peut optionnellement ajouter un numéro de suivi de colis.
4.  Lorsque l'article est marqué comme envoyé, l'acheteur reçoit une notification.

**Critères d'Acceptation pour le Retrait sur Place :**
1.  Si l'acheteur choisit le retrait sur place, les frais de port sont nuls.
2.  Après le paiement, l'acheteur et le vendeur sont encouragés via la messagerie à convenir d'un rendez-vous.
3.  Pour finaliser la transaction, un QR code unique est généré pour la commande.
4.  Lors de la rencontre, le vendeur scanne le QR code de l'acheteur (via une fonctionnalité simple dans l'application) pour confirmer la remise de l'article.
5.  Le scan du QR code agit comme une confirmation de réception et débloque le paiement pour le vendeur.
