<!-- Lien vers la page de déconnexion -->
<header>
    <a href="logout.php">Se déconnecter</a>
</header>
<!-- Programme permettant d'afficher les articles stockés dans la base de données -->
<?php
require_once 'connect.php';
$data = $db->prepare("SELECT * FROM articles");

$data->execute();

$articles = $data->fetchAll();

foreach($articles as $article):
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Articles</title>
        <link rel="stylesheet" href="style/styleindex.css">
    </head>
    <body>
    <main>
        <h3><?= $article["title"]?></h3>
        <p><?= $article["content"]?></p>
        <p>Date de publication : <?= $article["date"]?></p>
        <a href="create.php">Créer un nouvel article</a>
        <a href="update.php?id=<?=$article["id"]?>">Mettre à jour l'article</a>
        <a href="delete.php?id=<?=$article["id"]?>">Supprimer l'article</a>
    </main>
</body>
</html>
<?php
endforeach;

$display = $db->prepare("SELECT title, content, date FROM articles WHERE id = :idart");

$do = $display->fetch();
?>