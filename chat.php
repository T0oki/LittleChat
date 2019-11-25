<?php
session_start();
if(file_exists(__DIR__. DIRECTORY_SEPARATOR . "INSTALLATION")) header('location: INSTALLATION/index.php');
if(!isset($_SESSION['pseudo'])) header('location: login.php');
include(__DIR__.DIRECTORY_SEPARATOR.'php'.DIRECTORY_SEPARATOR.'class'.DIRECTORY_SEPARATOR.'Message.php');
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat</title>
    <link type="text/css" rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>Bienvenue <?= $_SESSION['pseudo'] ?><h5><a href="logout.php">déconnexion</a></h5></h1>
    <div class="chat">
        <div class="messagebox">
            <div class="chatarea"><?= Message::getMessage(); ?></div>
        </div>
        <div class="messageinput">
            <input type="text" id="message" autofocus><button id="send">Envoyer</button>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/dateformat.js"></script>
<script>var name = "<?= $_SESSION['pseudo'] ?>", lastid = <?= Message::$lastid ?>;</script>
<script src="js/chatbox.js"></script>
</html>
