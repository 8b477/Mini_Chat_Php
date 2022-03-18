<?php

namespace App\Model\Manager;

class Chat_messageManager
{
    public static function checkValideForm()
    {
            if (!empty($_POST['btn-form-validate']) || !empty($_POST['content']))
            {
                $username = trim(addslashes(strip_tags($_POST['author'])));
                $content = trim(addslashes(strip_tags($_POST['content'])));
                if (empty($username)){
                    $username = $_POST['anonyme'];
                }
            }

    }
}