<?php

use App\Model\Db;

require __DIR__ . '/includes.php';
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/style-form.css">
    <title>Mini Chat</title>
</head>
<body>

    <h1>Ton super Tchat !</h1>

    <div id="container">
        <!-- First part for write a message -->
        <div id="wrapper-top">

            <div class="full-content">
                <span class="date">13h13 </span>
                <span class="author">Jhon :</span>
                <div class="content">
                    <br>
                    <p class="content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, nesciunt.</p>
                </div>
            </div>

            <!-- End off write a message -->
        </div>

        <!-- Section off display message send and receive -->
        <div id="wrapper-bottom">
            <form action="/handler.php?task=write" method="POST">
                <input type="text" name="author" id="author-id" placeholder="username">
                <textarea name="content" id="id-form-message" cols="100" rows="15" placeholder="Enter your message !"></textarea>
                <input type="submit" value="Send" name="btn-form-validate" id="send">
            </form>
        </div>
        <!-- End off my #container -->
    </div>

    <script src="/assets/js/app.js"></script>
</body>
</html>
