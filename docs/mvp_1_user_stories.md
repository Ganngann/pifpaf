# MVP 1 : Gestion des Utilisateurs

Ce document détaille les fonctionnalités (User Stories) et les Critères d'Acceptation pour le premier Produit Minimum Viable (MVP) de Pifpaf. L'objectif de ce MVP est de construire le socle d'authentification et de gestion des comptes utilisateurs.

---

### Épopée : Gestion des Comptes

---

#### User Story 1 : Inscription d'un nouvel utilisateur

*   **En tant que** visiteur non connecté,
*   **Je veux** créer un compte avec mon nom, mon email et un mot de passe,
*   **Afin de** pouvoir rejoindre la plateforme pour vendre et acheter des articles.

**Critères d'Acceptation :**
1.  [ ] Le formulaire d'inscription est accessible et contient les champs : "Nom", "Adresse Email", "Mot de passe", "Confirmation du mot de passe".
2.  [ ] Le champ "Nom" est obligatoire.
3.  [ ] Le champ "Adresse Email" est obligatoire et doit être au format email valide.
4.  [ ] L'adresse email fournie doit être unique dans le système.
5.  [ ] Le champ "Mot de passe" est obligatoire et doit contenir au moins 8 caractères.
6.  [ ] Le champ "Confirmation du mot de passe" doit être identique au champ "Mot de passe".
7.  [ ] Si le formulaire est soumis avec des erreurs, celles-ci sont clairement affichées à côté des champs concernés.
8.  [ ] Lorsque le formulaire est validé avec succès, un nouvel utilisateur est créé en base de données.
9.  [ ] Après une inscription réussie, l'utilisateur est automatiquement connecté.
10. [ ] L'utilisateur est redirigé vers son tableau de bord (`/dashboard`) après l'inscription.

---

#### User Story 2 : Connexion d'un utilisateur

*   **En tant que** utilisateur enregistré,
*   **Je veux** me connecter avec mon email et mon mot de passe,
*   **Afin de** pouvoir accéder à mon compte et à mes fonctionnalités personnalisées.

**Critères d'Acceptation :**
1.  [ ] Le formulaire de connexion contient les champs : "Adresse Email", "Mot de passe".
2.  [ ] Une case à cocher "Se souvenir de moi" est présente.
3.  [ ] En cas de succès, l'utilisateur est authentifié et redirigé vers son tableau de bord.
4.  [ ] En cas d'échec (identifiants incorrects), un message d'erreur générique ("Les identifiants fournis sont incorrects.") est affiché sur la page.
5.  [ ] Un utilisateur déjà connecté qui tente d'accéder à la page de connexion est redirigé vers son tableau de bord.
6.  [ ] La page de connexion contient un lien "Mot de passe oublié ?".

---

#### User Story 3 : Déconnexion d'un utilisateur

*   **En tant que** utilisateur connecté,
*   **Je veux** pouvoir me déconnecter de la plateforme,
*   **Afin de** sécuriser mon compte en terminant ma session.

**Critères d'Acceptation :**
1.  [ ] Un bouton ou un lien "Déconnexion" est visible et accessible (par exemple, dans un menu déroulant sous le nom de l'utilisateur).
2.  [ ] Cliquer sur ce lien met fin à la session de l'utilisateur.
3.  [ ] Après la déconnexion, l'utilisateur est redirigé vers la page d'accueil du site.

---

#### User Story 4 : Réinitialisation du mot de passe

*   **En tant que** utilisateur ayant oublié son mot de passe,
*   **Je veux** pouvoir le réinitialiser via mon adresse email,
*   **Afin de** regagner l'accès à mon compte.

**Critères d'Acceptation :**
1.  [ ] Le lien "Mot de passe oublié ?" mène à une page où l'utilisateur peut saisir son adresse email.
2.  [ ] Si l'email existe dans la base de données, un email contenant un lien de réinitialisation unique et à usage unique est envoyé.
3.  [ ] Pour des raisons de sécurité, un message de confirmation générique s'affiche, que l'email existe ou non.
4.  [ ] Le lien dans l'email mène à une page sécurisée où l'utilisateur peut saisir et confirmer son nouveau mot de passe.
5.  [ ] Après avoir changé son mot de passe avec succès, l'utilisateur est notifié et peut désormais se connecter avec ses nouveaux identifiants.

---

#### User Story 5 : Tableau de bord de base

*   **En tant que** utilisateur connecté,
*   **Je veux** accéder à une page "Tableau de bord" simple,
*   **Afin de** confirmer que je suis bien connecté et d'avoir un point d'entrée pour mes actions.

**Critères d'Acceptation :**
1.  [ ] L'URL `/dashboard` est protégée et accessible uniquement aux utilisateurs connectés.
2.  [ ] Les visiteurs non connectés tentant d'accéder à `/dashboard` sont redirigés vers la page de connexion.
3.  [ ] La page affiche un message de bienvenue personnalisé (ex: "Bienvenue, [Nom de l'utilisateur] !").
