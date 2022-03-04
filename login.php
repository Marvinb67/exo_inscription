
<?php
session_start();
var_dump($_SESSION['users']);

if(isset($_SESSION['error'])){
    echo $_SESSION['error'];
    unset($_SESSION['error']);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <h1>Connexion</h1>
    <form action="traitement.php?action=login" method='POST'>
        <div>
            <label for="email">
                <p>Email :</p>
                <input type="email" name="email">
            </label>
        </div>
        <div>
            <label for="password">
                <p>Mot de passe :</p>
                <input type="password" name="password">
            </label>
        </div>
        <div>
            <input type="submit" value="Connexion" name="connexion">
        </div>
    </form>
</body>
</html>