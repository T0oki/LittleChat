<?php
session_start();
if(file_exists(__DIR__. DIRECTORY_SEPARATOR . "INSTALLATION")) header('location: INSTALLATION/index.php');
else (!isset($_SESSION['pseudo'])) ? header('location: login.php') : header('location: chat.php');
