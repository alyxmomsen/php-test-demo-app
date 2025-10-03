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
    <?php
    // $config = $configmanager->getConfig();

    $explodeduri = explode('/', $_SERVER['REQUEST_URI']);

    var_dump($explodeduri);

    if (
        isset($explodeduri[1])
        && ($explodeduri[1] === ''
            || $explodeduri[1] === 'main'
            || $explodeduri[1] === 'home')
    ) {

        echo 'case 1';
        require './views/pages/home.page.php';
    } else {

        if (
            isset($explodeduri[1])
            && ($explodeduri[1] === 'admin'
                || $explodeduri[1] === 'admin'
                || $explodeduri[1] === 'admin')
        ) {

            require './views/pages/admin.page.php';
        } else {

            echo 'case 2';
            require './views/pages/other.page.php';
        }
    }

    ?>
    <div>
        <a href="/bar">go bar</a>
        <a href="/foo">go home</a>
        <a href="/download">download</a>
    </div>
</body>

</html>