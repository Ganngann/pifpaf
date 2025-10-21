# MVP 5 : Paiement et Finalisation de la Transaction

Objectif : Permettre à l'acheteur de payer pour un article accepté via la plateforme et de finaliser la transaction.

---

### Épopée : Processus de Paiement

---

#### User Story 1 : Payer un article après acceptation de l'offre

*   **En tant que** acheteur,
*   **Je veux** pouvoir payer pour un article directement depuis la conversation une fois que mon offre a été acceptée,
*   **Afin de** sécuriser mon achat rapidement.

**Critères d'Acceptation :**
1.  Après l'acceptation d'une offre par le vendeur, un bouton "Payer maintenant" apparaît dans la conversation pour l'acheteur.
2.  Cliquer sur ce bouton redirige l'acheteur vers une page de paiement sécurisée.
3.  La page de paiement pré-remplit les détails de l'article et le prix convenu.
4.  L'intégration d'un fournisseur de services de paiement (par exemple, Stripe ou PayPal) est nécessaire. Pour le POC, une simulation de paiement peut être suffisante.

---

#### User Story 2 : Gérer le statut de la transaction

*   **En tant que** vendeur,
*   **Je veux** que le statut de l'annonce soit automatiquement mis à jour après le paiement,
*   **Afin de** ne pas vendre le même article à plusieurs personnes.

**Critères d'Acceptation :**
1.  Une fois le paiement effectué avec succès, le statut de l'annonce passe à "Vendu".
2.  L'annonce n'apparaît plus dans les résultats de recherche publics.
3.  L'acheteur et le vendeur peuvent voir le statut "Payé" dans leur historique de transactions.

---

#### User Story 3 : Recevoir une confirmation de la transaction

*   **En tant que** acheteur et vendeur,
*   **Je veux** recevoir une confirmation par email après la finalisation de la transaction,
*   **Afin d'**avoir une preuve de l'achat et les détails pour la suite (expédition, etc.).

**Critères d'Acceptation :**
1.  L'acheteur reçoit un email de confirmation de paiement avec les détails de la commande.
2.  Le vendeur reçoit un email de notification de vente, l'informant que l'acheteur a payé et qu'il peut procéder à l'expédition.
3.  L'email contient les informations essentielles : nom de l'article, prix payé, et les coordonnées de l'autre partie pour la logistique.
