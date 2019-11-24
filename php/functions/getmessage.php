<?php
include(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'Message.php');
Message::actualiseMessage((int)htmlspecialchars($_POST['id']));

