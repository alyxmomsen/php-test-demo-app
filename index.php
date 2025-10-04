<?php


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/styles/main.css?v=<?= time() ?>">
    <title>Document</title>
</head>

<body>
    <div class="main-wrapper">
        <?php

        require "./views/parts/upload.javascript.php";
        // require "./views/download-video-view/upload-form.php";
        ?>
    </div>
    <div>
        <a href="/bar">go bar</a>
        <a href="/foo">go home</a>
        <a href="/download">download</a>
    </div>
</body>

</html>