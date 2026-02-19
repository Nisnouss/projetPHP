<?php
// <!-- Programme permettant la mise à jour des articles -->
require 'connect.php';
$id = $_GET['id'];
$data = $db->prepare("SELECT * FROM articles WHERE id = :id");
$data->execute(['id' => $id]);
$result = $data->fetch();

$message = "";
if($_SERVER["REQUEST_METHOD"] === "POST"){
    if((empty($_POST['title'])) || (empty($_POST['content'])) || (empty($_POST['date']))){
        $message = "Tous les champs doivent être remplis";
    }else{
        $request = "UPDATE articles SET title = :title, content = :content, date = :date WHERE id = :id";

        $data = $db->prepare($request);

        $data->execute([
            'id' => $id,
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'date' => $_POST['date']        
        ]);
        header('Location : index.php');
    }
}
?>
<head>
    <link rel="stylesheet" href="style/styleupdate.css">
</head>
<form action="#" method="post">
    <h1>Modification de l'article</h1>
    <?= $message ?>
    <form action="#" method="post">
        <label for="title">Titre de l'article : </label>
        <br>
        <input type="text" id="title" name="title" placeholder="Saisir le nouveau titre" value="<?= $result["title"] ?>">
        <br>
        <br>
        <label for="content">Contenu : </label>
        <br>
        <input type="text" name="content" id="content" placeholder="Saisir le nouveau contenu" value="<?= $result["content"] ?>">
        <br>
        <br>
        <label for="date">Date de modification :</label>
        <br>
        <input type="date" name="date" id="date" value="<?=$result["date"]?>">
        <br>
        <br>
        <input type="submit" value="Envoyer les modifications">
    </form>
</form>