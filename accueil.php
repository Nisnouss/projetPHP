<!-- Lien vers la page de déconnexion -->
<header>
    <a href="login.php">Se connecter</a>
</header>

<!-- Programme permettant d'afficher les articles stockés dans la base de données 'articles'-->
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
        <link rel="stylesheet" href="style/styleaccueil.css?">
    </head>
    <body>
    <main>
        <h3><?= $article["title"]?></h3>
        <p><?= $article["content"]?></p>
        <p>Date de publication : <?= $article["date"]?></p>
    </main>
</body>
</html>

<?php
endforeach;

$display = $db->prepare("SELECT title, content, date FROM articles WHERE id = :idart");

$do = $display->fetch();
?>