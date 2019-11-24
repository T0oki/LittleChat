<?php

class Message {
    public static function sendMessage(string $pseudo, string $message)
    {
        require(__DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."functions".DIRECTORY_SEPARATOR."connexiondb.php");
        if(self::startsWith($message, "/")) {
            switch (strtoupper(substr($message, 1))) {
                case "CLEAR";
                    $bdd->query("TRUNCATE messages");
                    echo "Clear";
                break;
                case "HELP";
                    echo "Help";
                break;
                default;
                    echo "CND";
                break;
            }
        } else {
            $date = date("d/m/Y - H:i");
            $req = $bdd->prepare("INSERT INTO messages(author, message, date) VALUES(:author, :message, :date)");
            $req->execute(array(
                'author' => $pseudo,
                'message' => $message,
                'date' => $date,
            ));
            echo "Success";
        }
        return;
    }
    public static function getMessage()
    {
        require(__DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."functions".DIRECTORY_SEPARATOR."connexiondb.php");
        $req = $bdd->query("SELECT * FROM messages");
        $messages = "";
        while ($result = $req->fetch()) {
            $messages .= <<<HTML
<p>[{$result['date']}] - <b>{$result['author']}</b> : {$result['message']}</p>
HTML;

        }
        return $messages;
    }
    private static function startsWith ($string, $startString)
    {
        $len = strlen($startString);
        return (substr($string, 0, $len) === $startString);
    }
}