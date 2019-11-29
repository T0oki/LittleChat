<?php

class Message {
    public static $lastid;
    public static function sendMessage(string $pseudo, string $message)
    {
        require(__DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."functions".DIRECTORY_SEPARATOR."connexiondb.php");
        if(self::startsWith($message, "/")) {
            switch (strtoupper(substr($message, 1))) {
                case "CLEAR";
                    $date = date("d/m/Y - H:i");
                    $req = $bdd->prepare("INSERT INTO messages(author, message, date) VALUES(:author, :message, :date)");
                    $req->execute(array(
                        'author' => $pseudo,
                        'message' => $message,
                        'date' => $date,
                    ));
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
            $pseudo = (preg_match("#^Tooki$#", $pseudo)) ? "<span class='red'>$pseudo</span>" : $pseudo;
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
        $req = $bdd->query("SELECT * FROM messages WHERE message='/clear' ORDER BY id DESC");
        $req = $req->fetch();
        ($req['id'] === null) ? $id= 0 : $id = $req['id'];
        $req = $bdd->query("SELECT * FROM messages WHERE id > '$id'");
        $messages = "";
        while ($result = $req->fetch()) {
            $id = $result['id'];
            $messages .= <<<HTML
<p>[{$result['date']}] - <b>{$result['author']}</b> : {$result['message']}</p>
HTML;

        }
        self::$lastid = $id;
        return $messages;
    }
    public static function actualiseMessage(int $id){
        require(__DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."functions".DIRECTORY_SEPARATOR."connexiondb.php");
        $req = $bdd->query("SELECT * FROM messages WHERE id > '$id'");
        $messages = "";
        while ($result = $req->fetch()){
            $id = $result['id'];
            $messages .= <<<HTML
<p>[{$result['date']}] - <b>{$result['author']}</b> : {$result['message']}</p>
HTML;
        }
        echo '{"id":"'.$id.'", "message":"'.$messages.'"}';
        return;
    }

    private static function startsWith ($string, $startString)
    {
        $len = strlen($startString);
        return (substr($string, 0, $len) === $startString);
    }
}