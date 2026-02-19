<!-- Page de déconnexion -->
<?php
session_start();
session_destroy();
echo"Vous vous êtes déconnecté.";
?>
<head>
    <link rel="stylesheet" href="style/stylelogout.css">
</head>
<a href="accueil.php">Se reconnecter</a>