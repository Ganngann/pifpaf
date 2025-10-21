# MVP 9 : Fonctionnalités d'IA Avancées

Objectif : Déployer les fonctionnalités d'intelligence artificielle qui créent un avantage concurrentiel unique pour Pifpaf, en simplifiant radicalement l'expérience d'achat et de vente.

---

### Épopée : Assistant de Vente et Achat Intelligent

---

#### User Story 1 : Recherche visuelle d'articles similaires

*   **En tant que** acheteur,
*   **Je veux** pouvoir télécharger une photo d'un article qui me plaît,
*   **Afin de** trouver des articles visuellement similaires en vente sur la plateforme.

**Critères d'Acceptation :**
1.  Un bouton "Recherche par image" est présent à côté de la barre de recherche principale.
2.  L'utilisateur peut télécharger une image depuis son appareil.
3.  L'image est analysée par l'API Google Cloud Vision pour en extraire les caractéristiques visuelles (type d'objet, couleur, style).
4.  Le système affiche une page de résultats avec les annonces de la plateforme qui correspondent le mieux à ces caractéristiques.
5.  Si aucune correspondance n'est trouvée, un message amical est affiché.

---

#### User Story 2 : Suggestion de prix dynamique

*   **En tant que** vendeur,
*   **Je veux** que le système me suggère un prix de vente optimal pour mon article,
*   **Afin de** maximiser mes chances de vendre rapidement et au meilleur prix.

**Critères d'Acceptation :**
1.  Dans le formulaire de création d'annonce, après l'analyse de l'image et la sélection de la catégorie/marque, une section "Suggestion de prix" apparaît.
2.  Le système analyse les annonces similaires (vendues ou actives) sur la plateforme.
3.  Une fourchette de prix (par exemple, "Entre 15€ et 25€") est suggérée au vendeur.
4.  La suggestion est accompagnée d'exemples d'annonces similaires pour justifier l'estimation.
5.  Le vendeur reste libre de fixer le prix de son choix.

---

#### User Story 3 : Optimisation automatique de l'image principale

*   **En tant que** vendeur,
*   **Je veux** que le système puisse automatiquement améliorer ma photo principale en retirant l'arrière-plan,
*   **Afin de** rendre mon annonce plus professionnelle et plus attractive.

**Critères d'Acceptation :**
1.  Lors du téléchargement des photos, l'utilisateur a une option (case à cocher) "Améliorer ma photo principale".
2.  Si l'option est sélectionnée, l'IA (Google Cloud Vision ou un service similaire) détecte l'objet principal de la première photo et en supprime l'arrière-plan.
3.  Un nouvel arrière-plan neutre (blanc ou gris clair) est ajouté.
4.  La nouvelle image générée devient l'image principale de l'annonce.
5.  Le vendeur peut voir un aperçu et choisir de conserver l'image originale s'il le préfère.
