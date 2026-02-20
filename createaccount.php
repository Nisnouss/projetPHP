<!-- Programme permettant l'ajout d'utilisateurs à la base de données 'users' -->
<?php
require_once 'connect.php';
$message = "";
if($_SERVER["REQUEST_METHOD"] === "POST"){
    if((empty($_POST['name'])) || (empty($_POST['email'])) || (empty($_POST['password']))){
        $message = "Tous les champs doivent être remplis";
    }else{
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        try{
            $sql = "INSERT INTO users(name, email, password) VALUES (:name, :email, :password)";
            $data = $db->prepare($sql);
            $data->execute([
                'name' => $name,
                'email' => $email,
                'password' => $passwordHash,
            ]);

            $message = "Votre compte a été créé avec succès !";
            header('Location: login.php');
            }catch(PDOException $e){
                $message = "Erreur lors de l'enregistrement.";
        }
    }
}
?>

<!-- Formulaire permettant la création d'un compte utilisateur-->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'inscription</title>
    <link rel="stylesheet" href="style/stylecreate.css">
</head>
<body>
    <form action="#" method="post">
        <h1>Création du compte</h1>
        <p><?= $message ?></p>
        <label for="name">Nom :</label>
        <input type="text" name="name" id="name" placeholder="Votre nom">
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" placeholder="Votre email">
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" placeholder="Votre mot de passe">
        <input type="submit" id="btn" value="Créer le compte">
    </form>
</body>
</html>