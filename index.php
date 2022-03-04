<?php
session_start();

if(isset($_SESSION['error'])){
    echo $_SESSION['error'];
    unset($_SESSION['error']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <h1>Inscription</h1>
    <form action="traitement.php?action=register" method='POST'>
        <div>
            <label for="email">
                <p>Email :</p>
                <input type="email" name="email">
            </label>
        </div>
        <div>
            <label for="pseudo">
                <p>Pseudo</p>
                <input type="text" name="pseudo">
            </label>
        </div>
        <div>
            <label for="password">
                <p>Mot de passe :</p>
                <input type="password" name="password">
            </label>
        </div>
        <div>
            <label for="conf">
                <p>Mot de passe :</p>
                <input type="password" name="conf">
            </label>
        </div>
        <div>
            <input type="submit" value="Envoyer" name="submit">
        </div>
    </form>
</body>
</html>
