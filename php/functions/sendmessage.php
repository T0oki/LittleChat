<?php
include(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'Message.php');
Message::sendMessage((string)htmlspecialchars($_POST['author']), (string) htmlspecialchars($_POST['message']));