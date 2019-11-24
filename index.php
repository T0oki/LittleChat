<?php
session_start();
(!isset($_SESSION['pseudo'])) ? header('location: login.php') : header('location: chat.php');