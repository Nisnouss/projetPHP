# Objectif du projet

Créer une page de blog à l'aide de PHP en stockant les données dans une base de données SQL. Cette page peut être modifiée par les utilisateurs inscrits à la base de données utilisateur 'users'. Les articles du blog sont stockés dans la base de données nommée 'articles'.

## Structure du projet

### Page d'Accueil (accueil.php)

Cette page a pour fonction d'exposer les articles de blogs. Il y a une possibilité de se connecter en cliquant sur le lien en haut de la page, et ainsi avoir toutes les fonctionnalités pour pouvoir éditer le blog.

### Section utilisateur

#### Login (login.php)

Il s'agit d'une page de connexion avec un lien pour s'inscrire pour ceux qui ne sont pas inscrits.

#### Inscription (createaccount.php)

Permet aux nouveaux utilisateurs de s'inscrire afin d'avoir la possibilité d'éditer le blog.

### Section blog

#### Articles du blog (index.php)

Dans cette pages tous les articles sont affichés. Il y a la possibilité de selectionner un bouton afin d'être redirigés vers des formulaires de modifications ou d'ajouts d'articles, mais aussi de suppression. Au niveau de l'en-tête, l'utilisateur peut se déconnecter de sa session.

#### Modification (update.php)

Il s'agit d'un formulaire de modification, qui une fois remplis retourne à la page d'accueil du blog.

#### Ajout (create.php)

Formulaire d'ajout d'articles de blog.

#### Supprimer (delete.php)

Programme permettant la suppression d'articles en appuyant sur le bouton spécifique.

#### Page de déconnexion (logout.php)

Page confirmant la déconnexion et proposant un lien pour retourner à la page d'accueil.