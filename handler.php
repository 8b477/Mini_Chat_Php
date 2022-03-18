<?php

namespace App;

use App\Model\Db;

require_once __DIR__ . '/includes.php';



$task = 'list';

if (array_key_exists('task', $_GET)){
   $task = $_GET['task'];
}


if ($task == 'write'){
    postMessage();
}else{
    getMessage();
}

//function a déplacé après dans un dossier pour etre propre
function getMessage()
{
    $resultats = Db::getPDO()->query("SELECT * FROM chat_message ORDER BY created_at DESC LIMIT 20");
    $message = $resultats->fetchAll();
    echo json_encode($message);
}

function postMessage()
{
    if (!array_key_exists('author', $_POST) || !array_key_exists('content', $_POST)){
        echo json_encode([
            "status" => "error",
            "message" => "Pas de message a envoyé",
        ]);
        return;
    }

    $author = $_POST['author'];
    $content = $_POST['content'];

    $query = Db::getPDO()->prepare('INSERT INTO chat_message SET author = :author, content = :content, created_at = NOW()');

    $query->execute([
        "author" => $author,
        "content" => $content,
    ]);

    echo json_encode(["status" => "success"]);
}