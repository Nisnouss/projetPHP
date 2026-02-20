<!-- Programme permettant la connexion à un compte enregistré dans la base de données 'users' -->
<?php
session_start();
require_once 'connect.php';
$message = "";
if($_SERVER["REQUEST_METHOD"] === "POST"){
    if((empty($_POST["name"]))|| empty($_POST["email"])|| empty($_POST["password"])){
        $message = "Veuillez remplir tous les champs";
        }else{
            $name = htmlspecialchars(trim($_POST["name"]));
            $email = htmlspecialchars(trim($_POST["email"]));
            $password = trim($_POST['password']);
            if((filter_var($email, FILTER_VALIDATE_EMAIL))){
                $sql = "SELECT * FROM users WHERE email = :email";
                $data = $db->prepare($sql);
                $data->execute(['email' => $email]);
                $user = $data->fetch();
                if($user && password_verify($password, $user['password'])){
                $_SESSION['id'] = $user['id'];
                $_SESSION['name'] = $user['name'];
                header('Location: index.php');
                exit();
            }else{
                $message = "Mot de passe invalide";
            }
        }else{
            $message = "Nom d'utilisateur ou email invalide.";
        }
    }
}
?>

<!-- Formulaire de connexion -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de connection</title>
    <link rel="stylesheet" href="style/stylelogin.css">
</head>
<body>
    <form action="login.php" method="post">
        <h1>Connexion</h1>
        <p><?= $message ?></p>
        <label for="name">Nom :</label>
        <input type="text" name="name" id="name" placeholder="Votre nom">
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" placeholder="Votre email">
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" placeholder="Votre mot de passe">
        <input type="submit" id="btn" value="Se connecter">
        <label for="create">Vous n'avez pas compte ?</label>
        <a href="createaccount.php">S'inscrire</a>
    </form>
</body>
</html>