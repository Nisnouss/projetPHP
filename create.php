<!-- Programme permettant l'ajout d'articles -->
<?php
require_once 'connect.php';
$message = "";
if($_SERVER["REQUEST_METHOD"] === "POST"){
    if((empty($_POST['title'])) || (empty($_POST['content'])) || (empty($_POST['date']))){
        $message = "Tous les champs doivent être remplis";
    }else{
        $title = trim($_POST['title']);
        $content = trim($_POST['content']);
        $date = trim($_POST['date']);
        try{
        $sql = "INSERT INTO articles(title, content, date) VALUES (:title, :content, :date)";
        $data = $db->prepare($sql);
        $data->execute([
            'title' => $title,
            'content' => $content,
            'date' => $date,
        ]);

        $message = "L'article a été créé avec succés !";
        header('Location : index.php');
        }catch(PDOException $e){
            $message = "Erreur lors de l'enregistrement.";
        }
    }
}
?>

<!-- Formulaire permettant d'ajouter un nouvel article à la page d'accueil -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout d'articles</title>
    <link rel="stylesheet" href="style/stylenew.css">
</head>
<body>
    <h1>Ajouter un article</h1>
    <?= $message ?>
    <form action="#" method="post">
        <label for="title">Titre de l'article :</label>
        <br>
        <input type="text" name="title" id="title" placeholder="Saisir le titre le l'article">
        <br>
        <br>
        <label for="content">Contenu de l'article :</label>
        <br>
        <input type="text" name="content" id="content" placeholder="Veuillez écrire du contenu">
        <br>
        <br>
        <input type="date" name="date" id="date">
        <br>
        <br>
        <input type="submit" value="Soumettre l'article">
    </form>
</body>
</html>