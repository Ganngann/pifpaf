# MVP 11 : Conformité Légale et Confiance

Objectif : Finaliser la plateforme pour un lancement public en intégrant les pages légales obligatoires, en gérant les litiges et en assurant la conformité pour les transactions financières.

---

### Épopée : Cadre Légal et Sécurité

---

#### User Story 1 : Consulter et accepter les documents légaux

*   **En tant que** nouvel utilisateur,
*   **Je dois** accepter les Conditions Générales d'Utilisation (CGU) et la Politique de Confidentialité,
*   **Afin de** pouvoir m'inscrire sur la plateforme en toute connaissance de mes droits et devoirs.

**Critères d'Acceptation :**
1.  Des pages dédiées sont créées pour afficher le contenu des CGU et de la Politique de Confidentialité (le contenu textuel sera fourni par le Product Owner).
2.  Le formulaire d'inscription contient une case à cocher obligatoire : "J'accepte les [lien vers les CGU] et la [lien vers la Politique de Confidentialité]".
3.  L'inscription est impossible sans avoir coché cette case.
4.  Des liens vers ces pages sont accessibles en permanence dans le pied de page du site.

---

#### User Story 2 : Gérer un litige après une transaction

*   **En tant que** acheteur ou vendeur,
*   **Je veux** pouvoir ouvrir un litige si un problème survient avec ma transaction (article non reçu, non conforme, etc.),
*   **Afin de** demander l'intervention de la plateforme pour trouver une solution.

**Critères d'Acceptation :**
1.  Sur la page d'une commande, un bouton "Signaler un problème" est disponible pendant une période définie après la transaction.
2.  L'utilisateur peut choisir un motif pour le litige et fournir une explication détaillée.
3.  L'ouverture d'un litige bloque temporairement le paiement au vendeur si celui-ci n'a pas encore été débloqué.
4.  Le litige apparaît dans le back-office de l'administrateur pour médiation.
5.  L'acheteur et le vendeur peuvent échanger des messages via une interface dédiée au litige.

---

#### User Story 3 : Vérifier son identité pour les retraits (KYC)

*   **En tant que** vendeur,
*   **Je dois** faire vérifier mon identité avant de pouvoir retirer des sommes importantes,
*   **Afin de** me conformer aux réglementations de lutte contre le blanchiment d'argent (KYC - Know Your Customer).

**Critères d'Acceptation :**
1.  Lorsqu'un vendeur atteint un certain seuil de ventes ou de retraits, son prochain virement est conditionné à la vérification de son identité.
2.  L'utilisateur est invité à télécharger une pièce d'identité (carte d'identité, passeport) via une interface sécurisée.
3.  Ces documents sont transmis de manière sécurisée au processeur de paiement (comme Stripe Connect) pour validation.
4.  Le statut de la vérification (en attente, validé, refusé) est visible dans le profil du vendeur.
5.  Une fois l'identité vérifiée, la restriction sur les virements est levée.
