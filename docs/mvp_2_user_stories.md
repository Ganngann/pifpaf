MVP 2 : Création d'une annonce
Objectif : Permettre à un utilisateur connecté de mettre en vente un article en créant une annonce complète avec photos et détails.

User Story 1 : Accéder au formulaire de création d'annonce
En tant que utilisateur connecté,
Je veux pouvoir accéder à une page pour créer une nouvelle annonce,
Afin de démarrer le processus de mise en vente d'un article.
Critères d'Acceptation :

Un bouton ou lien "Vendre" est visible et accessible pour les utilisateurs connectés (par exemple, dans la barre de navigation).
Cliquer sur ce lien redirige l'utilisateur vers le formulaire de création d'annonce.
Les visiteurs non connectés qui tentent d'accéder à cette page sont redirigés vers la page de connexion.
User Story 2 : Télécharger les photos de l'article
En tant que vendeur,
Je veux pouvoir télécharger une ou plusieurs photos de mon article,
Afin que les acheteurs potentiels puissent voir à quoi il ressemble.
Critères d'Acceptation :

Le formulaire contient un champ de téléchargement de fichiers multiple pour les images.
Des aperçus des images sélectionnées s'affichent sur le formulaire.
La première image téléchargée est considérée comme l'image principale.
Les images sont validées (taille, type de fichier).
User Story 3 (IA) : Obtenir des suggestions automatiques à partir des photos
En tant que vendeur,
Je veux que le système analyse mes photos pour me suggérer automatiquement un titre, une catégorie et une description,
Afin de créer mon annonce plus rapidement et plus facilement.
Critères d'Acceptation :

Après le téléchargement de la première image, une analyse est lancée via l'API Google Cloud Vision.
Un indicateur de chargement est visible par l'utilisateur pendant l'analyse.
Une fois l'analyse terminée, les champs "Titre", "Catégorie", et "Description" sont pré-remplis avec les suggestions.
Le vendeur peut modifier ou remplacer entièrement les suggestions.
En cas d'échec de l'analyse, aucun champ n'est pré-rempli.
User Story 4 : Renseigner les détails de l'annonce et la publier
En tant que vendeur,
Je veux pouvoir renseigner les détails de mon article (titre, description, catégorie, état, prix) et le publier,
Afin qu'il soit visible sur la marketplace.
Critères d'Acceptation :

Le formulaire contient les champs obligatoires : Titre, Description, Catégorie (liste déroulante simple pour ce MVP), État de l'article (liste de choix), et Prix.
La soumission échoue si un des champs obligatoires est vide.
Le prix doit être un nombre valide.
Lors de la soumission réussie, une nouvelle annonce est créée et associée au vendeur.
Après la publication, le vendeur est redirigé vers la page de sa nouvelle annonce.
