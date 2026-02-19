<!-- Programme permettant la suppression d'une tâche -->
<?php
require 'connect.php';

$request = "DELETE FROM articles WHERE id = :id";

$data = $db->prepare($request);

$id = $_GET["id"];

$data->execute([
    'id' => $id,
]);

header('Location : index.php');
?>