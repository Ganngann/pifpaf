# MVP 3 : Découverte et Consultation des Annonces

Objectif : Permettre aux utilisateurs (connectés ou non) de parcourir, rechercher et consulter les annonces disponibles sur la marketplace.

---

### Épopée : Navigation sur la Marketplace

---

#### User Story 1 : Voir les dernières annonces sur la page d'accueil

*   **En tant que** visiteur,
*   **Je veux** voir une liste des dernières annonces publiées directement sur la page d'accueil,
*   **Afin de** découvrir rapidement les nouveautés sans avoir à chercher.

**Critères d'Acceptation :**
1.  La page d'accueil affiche une section "Dernières Annonces".
2.  Cette section montre les 12 annonces les plus récentes.
3.  Pour chaque annonce, on voit au minimum son image principale, son titre et son prix.
4.  Cliquer sur une annonce redirige vers sa page de détail.

---

#### User Story 2 : Rechercher des annonces par mot-clé

*   **En tant que** acheteur potentiel,
*   **Je veux** utiliser une barre de recherche pour trouver des articles par mots-clés,
*   **Afin de** trouver rapidement les articles qui m'intéressent.

**Critères d'Acceptation :**
1.  Une barre de recherche est visible sur la page d'accueil et/ou dans la barre de navigation.
2.  La recherche s'effectue sur le titre et la description des annonces.
3.  L'utilisateur est redirigé vers une page de résultats affichant toutes les annonces correspondant à sa recherche.
4.  Si aucun résultat n'est trouvé, un message clair l'indique.

---

#### User Story 3 : Filtrer les résultats de recherche

*   **En tant que** acheteur,
*   **Je veux** pouvoir filtrer les annonces par catégorie, état et fourchette de prix,
*   **Afin d'**affiner ma recherche et de ne voir que les résultats les plus pertinents.

**Critères d'Acceptation :**
1.  Sur la page de résultats, des filtres sont disponibles pour la catégorie, l'état de l'article et le prix.
2.  Le filtre de prix peut être une simple fourchette (min/max) ou des intervalles prédéfinis.
3.  L'application de plusieurs filtres est cumulative (ex: "vêtements" ET "neuf").
4.  La liste des résultats se met à jour dynamiquement (via un rechargement de page ou en AJAX) à chaque application d'un filtre.
