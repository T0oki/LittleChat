<?php
require(__DIR__.'/../../config/config.php');
try
{
    $bdd = new PDO('mysql:host='.serveurDB::$hostname.';dbname='.serveurDB::$tablename.';charset=utf8', serveurDB::$user, serveurDB::$password);
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}