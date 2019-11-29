<?php
if(!isset($_POST['dbh'],$_POST['dbt'],$_POST['dbu'],$_POST['dbp'])){
    header('location: index.php');
}

try
{
    $bdd = new PDO("mysql:host={$_POST['dbh']};dbname={$_POST['dbt']};charset=utf8", $_POST['dbu'], $_POST['dbp']);
}
catch(Exception $e)
{
    $error = $e->getMessage();
    echo <<<HTML
<h1>Erreur lors de la connexion avec la base de Données</h1>
<p>Code errur : $error</p>
<a href="generatecfg.php">Réessayer</a>
HTML;

    exit;
}

$myfile = fopen(__DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."config".DIRECTORY_SEPARATOR."config.php", "w") or die("Unable to open file!");
$txt = "<?php
if (!class_exists(\"serveurDB\")) {
    class serveurDB {
        public static \$hostname;
        public static \$tablename;
        public static \$user;
        public static \$password;

        public static function init(){
            self::\$hostname 	= \"{$_POST['dbh']}\";
            self::\$tablename 	= \"{$_POST['dbt']}\";
            self::\$user 		= \"{$_POST['dbu']}\";
            self::\$password 	= \"{$_POST['dbp']}\";
        }
    }
    serveurDB::init();
}";

fwrite($myfile, $txt);
fclose($myfile);
chmod(__DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."config".DIRECTORY_SEPARATOR."*", "0777");
header('location: index.php');