<?php
session_start();
if(file_exists(__DIR__. DIRECTORY_SEPARATOR . "INSTALLATION")) header('location: INSTALLATION/index.php');
if(isset($_SESSION['pseudo'])) header('location: chat.php');
if(isset($_POST['nick'])){
    $_SESSION['pseudo'] = (preg_match("#Admin#i", htmlspecialchars($_POST['nick']))) ? "Fucking Noob" : htmlspecialchars($_POST['nick']);
    header('location: chat.php');
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link type="text/css" rel="stylesheet" href="css/style.css">
</head>
<body>
    <form method="post">
        <p>Votre Nom : </p>
        <input name="nick" type="text">
        <input type="submit">
    </form>
</body>
</html>