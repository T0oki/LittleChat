<?php
if(file_exists(__DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'config.php')) {
    echo <<<HTML
<h1>Installation Terminé</h1>
<ul>Supprimez le dossier : /INSTALLATION</ul>
<a href="../">Aller au Chat</a>
HTML;

    exit;
}
if (!mkdir('../config/', 0777, true)) {
    echo <<<HTML
<h1>Erreur Permissions</h1>
<ul>Donnez les permission d'édition sur le dossier racine</ul>
<p>example : (linux) chmod -R 777 (fichier)</p>
HTML;
exit;
}
if(!is_writable(__DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."config")){
    echo <<<HTML
<h1>Erreur Permissions</h1>
<ul>Donnez les permission d'édition sur le dossier config</ul>
<p>example : (linux) chmod -R 777 (fichier)</p>
HTML;
exit;
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Installation</title>
</head>
<body>
    <form method="post" action="generatecfg.php">
        <label>
            Database Host :
            <input name="dbh" type="text">
        </label><br>
        <label>
            Database Name :
            <input name="dbt" type="text">
        </label><br>
        <label>
            Database User :
            <input name="dbu" type="text">
        </label><br>
        <label>
            Database Password :
            <input name="dbp" type="password">
        </label><br>
        <input type="submit">
    </form>
</body>
</html>
