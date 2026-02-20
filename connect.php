<!-- Programme permettant de récupérer la base de donnée -->
<?php
try {
    $db = new PDO(
        'mysql:host=localhost;dbname=evalphp;charset=utf8',
        'root', 
        '',
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    );
} catch (Exception $e) {
    echo "Connexion refusée";
    exit();
}
?>